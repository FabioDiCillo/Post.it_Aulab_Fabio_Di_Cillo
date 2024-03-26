<x-layout> 
<div class="container">
    <div class="row">
        <h1 class="text-center display-3 fw-bold mt-5 ">{{$article->title}}</h1>
    </div>
</div>    

<div class="container my-5">
    <div class="row justify-content-around">
        <div class="col-12 col-md-6">
            <img src="{{Storage::url($article->image)}}" alt="" class="img-fluid my-3 imgShow">
            <div>
                <p class="mt-3 text-muted small text-center">Tempo di lettura: {{ $article->readDuration()}} min</p>
            </div>
            <div class="text-center mb-4">
                <div class="d-flex justify-content-between border-bottom border-2 border-black">
                    <div>
                        <i class="bi bi-globe2 fs-4"></i>
                        <a href="{{route('article.byCategory',['category'=>$article->category->id])}}" class="small text-muted">{{$article->category->name}}</a>
                    </div>
                    <div>
                        <i class="bi bi-vector-pen fs-4"></i>
                        <a href="{{ route('article.byUser' , ['user' => $article->user->id]) }}" class="small text-muted"> {{ $article->user->name }}</a>    
                     </div>
                     <div>
                        <p class="small text-capitalize">
                         <i class="bi bi-calendar3 fs-4"></i>
                        {{ date_format($article->created_at, 'd/m/Y') }}
                        </p> 
                    </div>
                </div>
            </div>
            <h2 class="fw-bold text-center mb-5">{{$article->subtitle}}</h2>
            <div>
                <p class="acapo">{{$article->body}}</p>
            </div>
            <div class="text-center">
                <a href="{{route('article.index')}}" class="btn btn-secondary text-white my-5">Torna indietro</a>
            </div>
            @if (Auth::user() && Auth::user()->is_revisor)
            <div class="d-flex align-item-center justify-content-between">
                <form action="{{route('revisor.rejectArticle', compact('article'))}}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Rifiuta articolo</button>
                </form>                      
                <form action="{{route('revisor.acceptArticle', compact('article'))}}" method="POST">
                    @csrf
                    <button class="btn btn-success">Accetta articolo</button>
                </form>
            </div>
             @endif
             
        </div>
    </div>
</div>

</x-layout>

