<x-layout>
    <div class="container-fluid bg-one text-center text-white margin-careers">
        <div class="row justify-content-center">
            <h2 class="font-title my-3">
                BENTORNATO REVISORE
            </h2>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="container my-5">
        <div class="row justify-content-center align-item-center">
            <div class="col-12">
                <h2 class="font-title">Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles" role="amministratore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="font-title">Articoli pubblicati</h2>
                <x-articles-table :articles="$acceptedArticles" role="revisore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="font-title">Articoli respinti</h2>
                <x-articles-table :articles="$rejectedArticles" role="redattore"/>
            </div>
        </div>
    </div>
                


</x-layout>