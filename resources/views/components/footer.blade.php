<footer id ="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 ">
                <div class="d-flex">
                    <img class="footLogo" src="{{ asset('storage/img/logo5.png') }}" alt="Logo Aulab Post" role="presentation">
                    <h3 class="mt-3"> The Aulab Post</h3>
                </div>
                <div class="prova mt-2 mx-5">
                    <p>© 2024 The Aulab Post.<br>Tutti i diritti riservati.</p>
                </div>
            </div>     
            
            <div class="col-lg-6 col-md-12 col-sm-12 footerACaso">
                <h4 class="mt-3 mx-5">Seguici sui social</h4>
                <div class="mx-5 justify-content-center">
                    <a href="https://www.facebook.com/" target="_blank" aria-label="vai al profilo facebook - link esterno apre una nuova scheda" class="item">
                        <i class="bi bi-facebook fs-4" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" aria-label="vai al profilo instagram - link esterno apre una nuova scheda" class="item">
                        <i class="bi bi-instagram fs-4" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" aria-label="vai al profilo twitter - link esterno apre una nuova scheda" class="item">
                        <i class="bi bi-twitter-x fs-4" aria-hidden="true"></i>
                    </a>
                </div>
            </div>              
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="body">
                    <ul class="list-unstyled">
                        <li>
                                <a href="" target="_blank" class="nav-link">Team</a>
                        </li>                            
                        <li>
                            <a href="" class="nav-link">Privacy</a>
                        </li>
                        <li>
                            <a href="{{route('careers')}}" class="nav-link">Lavora con noi</a>
                        </li>
                        <li>
                            <a href="" target="_blank" class="nav-link" title="Modello di Organizzazione ad minchiam">MOG D. Lgs. 231/2001</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form class="ms-5">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><h5>Iscriviti alla nostra newsletter:</h5></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci la tua email">
                        <button type="submit" class="btn btn-light my-1">Iscriviti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>
