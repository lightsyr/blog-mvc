<x-layout>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="{{Route('loginPost')}}">
            @csrf
            @if($mensagem = Session::get("erro"))
                <div class="alert alert-danger mb-3">
                    {{$mensagem}}
                </div>
            @endif
            <div class="form-group mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="Logar" class="btn btn-primary">
        </form>
    </div>
</x-layout>