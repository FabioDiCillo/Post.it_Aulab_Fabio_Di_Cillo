<div class="table-responsive">
    <table class="table table-striped table-hover border tabella">
        <thead class="table-dark tabella">
            <tr>
                <th scope="col">#</th>
                <th class="thchevoglio" scope="col">Titolo</th>
                <th class="thchevoglio" scope="col">Sottotitolo</th>
                <th class="thchevoglio" scope="col">Categoria</th>
                <th class="thchevoglio" scope="col">Tags</th>
                <th class="thchevoglio" scope="col">Creato il</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td class="tabella text-break">{{ $article->title }}</td>
                <td class="tabella text-break">{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Non categorizzato' }}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        {{ $tag->name }}                    
                    @endforeach
                </td>
                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('article.show' , compact('article')) }}" class="btn btn-dark text-white">Leggi</a>
                    <a href="{{ route('article.edit' , compact('article')) }}" class="btn btn-secondary text-white">Modifica</a>
                    <form action="{{ route('article.destroy' , compact('article')) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    </div>