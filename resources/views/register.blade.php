<x-layout>
    <div class="container">
        <form method="post" action="{{Route('registerPost')}}">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nome</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Senha</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="form-group mb-3">
                <label for="password-confirmation" class="form-label">Confirme sua senha</label>
                <input class="form-control" type="password" name="password_confirmation" id="password">
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>
    </div>
</x-layout>