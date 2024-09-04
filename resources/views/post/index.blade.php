<x-layout>
    <div class="container mt-3">
        <h1>Lista de publicações</h1>
    
        <ul class="row gap-3">
            @foreach ($posts as $post)
                <li class="card col">
                    <img class="card-img-top" src="/img/posts/{{$post->cover_image_path}}" alt="{{$post->title}}">
                    <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="card-text">{{$post->content}}</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a class=" btn btn-primary" href="{{Route("post.edit", $post)}}" class="mb-3 btn btn-primary">Editar</a>
                        </div>
                        <form class="col " action="{{Route('post.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="mb-3 btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        @if(count($posts) == 0)
            <p>Ainda não há publicações cadastradas</p>
        @endif
    </div>
</x-layout>