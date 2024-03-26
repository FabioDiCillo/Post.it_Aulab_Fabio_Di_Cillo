<x-layout>
    <div class="container">
        <div class="row">
            <h1>Bentornato Amministratore</h1>
        </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Richieste per ruolo amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Richieste per ruolo revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Richieste per ruolo redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2>Le categorie della piattaforma</h2>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
                <form action="{{route('admin.storeCategory')}}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="name" placeholder="Nome nuova categoria" class="form-control me-2">
                    <button type="submit" class="btn btn-success text-white">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>
    

</x-layout>