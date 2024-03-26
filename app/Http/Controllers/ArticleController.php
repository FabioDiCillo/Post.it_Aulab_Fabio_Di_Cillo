<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index' , 'show' , 'category' , 'articleSearch', 'byUser');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages =
        [
                'title.required' => "Il titolo è obbligatorio",
                'title.unique' => "Il titolo è già presente",
                'title.min' => "Inserire almeno 5 caratteri",
                'body.required' => "Bisonga inserire l'articolo",
                'body.min' => "Inserire almeno 10 caratteri",
                'subtitle.required' => "Bisonga inserire il sottotitolo",
                'subtitle.min' => "Inserire almeno 5 caratteri",
                'image.required' => "Inserire immagine",
                'image.image' => "Il file deve essere un'immagine",
                'category.required' => "Inserire almeno 5 caratteri",
                'tags.required' => "Inserire almeno 1 tag",
            ];

        $request->validate([
            'title'=>'required|unique:articles|min:5',
            'subtitle'=>'required|min:5',
            'body'=>'required|min:10',
            'image'=>'image|required',
            'category'=>'required',
            'tags'=>'required',
        ], $messages );

        $article = Article::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'body'=>$request->body,
            'image'=>$request->file('image')->store('public/image'),
            'category_id'=>$request->category,
            'user_id' => Auth::user()->id,
            'slug'=> Str::slug($request->title)
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => $tag],
                ['name' => strtolower($tag)] 
            );
            $article->tags()->attach($newTag);
        }


        return redirect(route('welcome'))->with('message', 'Articolo creato con successo');    
        
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([

            'title' => 'required|min:3|unique:articles,title,'.$article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);
        if ($article->is_accepted){
        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'is_accepted' => null,
            'slug' => Str::slug($request->title),
        ]);
        }
        if ($request->hasfile('image')) {
            $newImage = $request->file('image')->store('public/image');
            if ($newImage !== $article->image){
            Storage::delete($article->image);
            $article->update([
                'image' => $newImage,
            ]);
        }
        }
        $tags = explode(',' , $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        $newTags = [];

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
            ['name' => $tag],
            ['name' => strtolower($tag)],
            );
            $newTags[] = $newTag->id;
            
        }

        $article->tags()->sync($newTag);

        return redirect(route('writer.dashboard'))->with('message' , 'Hai correttamente aggiornato l\'articolo scelto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }
        $article->delete();
        return redirect(route('writer.dashboard'))->with('message', 'Hai cancellato l\'articolo con successo');
    }

    public function category(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.byCategory', compact('articles', 'category'));
    }

    public function byUser(User $user)
    {
        return view('article.byUser', compact('user'));
    }

    public function byWriter(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.byUser', compact('articles', 'user'));
    }

    public function articleSearch(Request $request)
    {
        $query=$request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }

 
}
