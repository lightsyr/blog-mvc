<x-layout>
    <form class="container" action="{{Route('post.update', $post)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method("PUT")

        <div class="form-group mb-3">
            <label class="form-label" for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="cover">Arquivo de capa</label>
            <input type="file" name="cover" id="cover" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="content">Conteudo</label>
            <textarea class="form-control" name="content" id="content">{{$post->content}}</textarea>
        </div>
        
        <input type="submit" value="Atualizar" class="btn btn-primary">
    </form>
</x-layout>
