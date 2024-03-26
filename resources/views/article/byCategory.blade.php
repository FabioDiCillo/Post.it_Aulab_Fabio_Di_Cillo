<x-layout> 
    <div class="container">
        <div class="row">
            <h1 class="text-center display-3 my-5">Categoria: {{$category->name}}</h1>
        </div>
    </div>
    <div class="container">
                <div class="row justify-content-center">
                    @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 mb-5 my-5">
                        <div class="card my-5" style="width: 20rem;">
                            <img src="{{Storage::url($article->image)}}" alt="immagine articolo" class="card-img-top cardDimension">
                            <div class="d-flex justify-content-evenly my-2 border-bottom border-2 border-black">
                                <div>
                                    <i class="bi bi-globe2 fs-4"></i>
                                    <a href="{{route('article.byCategory',['category'=>$article->category->id])}}" class="small text-muted">{{$article->category->name}}</a>
                                </div>
                                <div>
                                    <i class="bi bi-vector-pen fs-4"></i>
                                    <a href="{{ route('article.byUser' , ['user' => $article->user->id]) }}" class="small text-muted"> {{ $article->user->name }}</a>     
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <a href="{{route('article.show', compact('article'))}}"><h3 class="card-title">{{Str::limit($article->title, 20)}}</h3></a>
                                </div>
                                <h5 class="card-text my-2">{{Str::limit($article->subtitle, 30)}}</h5>
                                <p class="card-text my-3">{{Str::limit($article->body, 80)}}</p>
                                <div class="d-flex align-item-center justify-content-between">
                                        <p class="small text-capitalize">
                                            @foreach ($article->tags as $tag)
                                            <i class="bi bi-tag-fill"></i>{{$tag->name}}
                                            @endforeach
                                        </p>
                                        <p class="small text-capitalize">
                                            <i class="bi bi-calendar3"></i>
                                            {{ date_format($article->created_at, 'd/m/Y') }}
                                        </p>
                                </div>
                                <div class="text-muted small text-center">Tempo di lettura: {{ $article->readDuration()}} min</div>
                            </div>
                        </div> 
                    </div>
                    @empty
                    <div class="col-12 text-center my-5">
                        <h5 class="display-5">Attualmente non ci sono articoli</h5>
                    </div>
                @endforelse
                </div>
    </div> 
</x-layout>