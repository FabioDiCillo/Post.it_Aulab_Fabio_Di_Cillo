<x-layout>
    
    <div class="container formArticolo">
        <div class="row">
            <div class="col-12">
            <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
            @error('title')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo</label>
            <input type="text" class="form-control @error('subtitle') is invalid @enderror" id="subtitle" name="subtitle" value="{{old('subtitle')}}">
            @error('subtitle')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" class="form-control @error('image') is invalid @enderror" id="image">
            @error('image')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select name="category" id="category" class="form-controller text-capitalize @error('category') is invalid @enderror">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Corpo del testo</label>
            <textarea class="form-control @error('body') is invalid @enderror" id="body" cols="30" rows="7" name="body" value="{{old('body')}}">
            </textarea>
            @error('body')
            {{$message}}
            @enderror   
        </div>
        <div class="my-3">
            <label for="tags" class="form-label">Tags:</label>
            <input name="tags" id="tags" class="form-control @error('tags') is invalid @enderror" value="{{old('tags')}}"/>
            <span class="small">Dividi ogni tag con una virgola</span>
            @error('tags')
            {{$message}}
            @enderror 
        </div>
        <div class="mt-2 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Inserisci Articolo</button>
        </div>     
    </form>
            </div>
        </div>
    </div>
</x-layout>

