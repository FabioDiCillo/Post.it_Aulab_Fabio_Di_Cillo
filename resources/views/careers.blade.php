<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Lacora con noi</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Lavora come amministratore</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure sit animi, debitis nisi laborum eius dicta provident sunt explicabo itaque aliquid nam porro consequatur, dolorem quaerat, vel voluptatibus soluta doloribus?</p>
                <h2>Lavora come revisore</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia necessitatibus molestias dignissimos voluptate illum officiis laudantium accusamus minima, fugiat facilis eligendi tempore amet cum dolorem unde quo sit culpa corrupti?</p>
                <h2>Lavora come redattore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro quis eius nesciunt, dolor velit ex similique neque eum, et ipsum numquam maxime quaerat. Consequuntur at molestias iste vero modi non!</p>
            </div>
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
            </div>
            @endif
            <form action="{{route('careers.submit')}}" method="POST">
                @csrf
                <div>
                    <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Scegli qui</option>
                        <option value="admin">Amministratore</option>
                        <option value="revisor">Revisore</option>
                        <option value="writer">Redattore</option>
                    </select>
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email') ?? Auth::user()->email}}">
                </div>
                <div>
                    <label for="message" class="form-label">Parlaci di te</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{old('message')}}</textarea>
                </div>
                <div>
                    <button class="btn btn-info">invia la candidatura</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>