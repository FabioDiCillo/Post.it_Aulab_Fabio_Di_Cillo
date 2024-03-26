<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand transition border-bottom border-2"data-bs-theme="dark">
  <div class="container-fluid">
    <div class="position-absolute top-50 start-50 translate-middle z-3"> 
      <a class="navbar-brand ms-2 text-dark" href="{{route('welcome')}}"><img class="Logo" src="{{ asset('storage/img/logo4.png') }}" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar">
        <div class="container1 nav-container z-2">
          <input class="checkbox" type="checkbox" name="" id="" />
          <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
          </div>  
          <div class="menu-items align-items-start">
          <div class="barraRicerca mb-4 ms-2">
            <form action="{{route('article.search')}}" method="GET" class="d-flex"  >
              <input type="search" name="query" placeholder="Cerca articolo" class="form-controller me-2 bg-white text-dark" aria-label="Search">
              <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
            </form>
          </div>  
            <li><a href="{{route('welcome')}}" class="text-white">Home</a></li>
            <li><a href="{{route('article.create')}}" class="text-white">Inserisci Articolo</a></li>
            <li><a href="{{route('article.index')}}" class="text-white">Tutti gli articoli</a></li>
            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorie
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                <li><a class="dropdown-item dropCategoria" href="{{ route('article.byCategory', ['category' => $category->id])}}">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </li>
          @auth
          @if (Auth::user()->is_admin)
          <li><a href="{{route('admin.dashboard')}}" class="text-white">Dashboard Admin</a></li>
          @endif  
          @if (Auth::user()->is_revisor)
          <li><a href="{{route('revisor.dashboard')}}" class="text-white">Dashboard Revisore</a></li>
          @endif
          @if (Auth::user()->is_writer)
          <li><a href="{{route('writer.dashboard')}}" class="text-white">Dashboard Redattore</a></li>
          @endif
          @endauth
          </div>
        </div>
        
      </div>
      <div class="d-flex align-items-center ">
        @guest
        <ul class="navbar-nav position-absolute end-0">
          <li class="nav-item mx-2">
            <a class="nav-link active p-0" href="{{route('register')}}"><i class="bi bi-person-fill fs-4 text-dark"></i></a>
          </li>
        </ul>
          @endguest
          @auth
          <div class="navbar-nav position-absolute me-2 end-0">
            <p class="my-2 mx-2">Benvenuto: {{Auth::user()->name}}</p>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="btn  nav-link mx-2 p-0 mt-1  ">
                <i class="bi bi-box-arrow-right text-dark fs-4 "></i>
              </button>
            </form>
          </div>
        @endauth
     
      </div>
    </div>
  </div>
</nav>
