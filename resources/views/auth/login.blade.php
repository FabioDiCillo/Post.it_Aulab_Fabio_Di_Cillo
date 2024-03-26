<x-layout>
  {{-- <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="{{route('register')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label  class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" >
          </div>
          <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
          </div>
          <div class="mb-3">
            <label class="form-label">Conferma Password</label>
            <input type="password" class="form-control" name="password_confirmation" >
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
          </div>
          <button type="submit" class="btn btn-primary">Registrati</button>
        </form>
      </div>
    </div>
  </div> --}}
  <form action="{{route('login')}}" method="POST">
    @csrf
    <div class="login-wrap">
      <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Accedi</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrati</label>
        <div class="login-form">
          <div class="sign-in-htm">
            <div class="group">
              <label for="user" class="label">Email</label>
              <input id="user" type="text" class="input" name="email" >
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" type="password" class="input" data-type="password" name="password">
            </div>
            {{-- <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div> --}}
            <div class="group">
              <input type="submit" class="button" value="Accedi">
            </div>
            <div class="hr"></div>
            
            {{-- <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div> --}}
          </div>
  </form>
  <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="sign-up-htm">
          <div class="group">
            <label for="user" class="label">Nome e Cognome</label>
            <input id="user" type="text" class="input" name="name">
          </div>
          <div class="group">
            <label for="pass" class="label">Indirizzo Email</label>
            <input id="pass" type="text" class="input" name="email">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="password">
          </div>
          <div class="group">
            <label for="pass" class="label">Conferma Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="password_confirmation">
          </div>
          
          <div class="group">
            <input type="submit" class="button" value="Registrati">
          </div>
          <div class="hr"></div>
          {{-- <div class="foot-lnk">
            <label for="tab-1">Already Member?</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </form>
</x-layout>