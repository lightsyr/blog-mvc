<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>{{ $title ?? 'Blog MVC - Laravel'}}</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Blog MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('post.index')}}">Posts</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('login')}}">Login</a>
                    </li>
                    @endguest
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('register')}}">Cadastrar-se</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('post.create')}}">Cadastrar publicações</a>
                        </li>
                    @endauth
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('auth.logout')}}">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
            @auth
                <p>Seja bem vindo {{auth()->user()->name}}</p>
            @endauth
        </div>
    </nav>
    {{$slot}}
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


</html>