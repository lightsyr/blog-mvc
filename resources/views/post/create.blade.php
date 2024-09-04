<x-layout>
    <form class="container" action="{{Route('post.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="form-group mb-3">
            <label class="form-label" for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="cover">Arquivo de capa</label>
            <input type="file" name="cover" id="cover" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="content">Conteudo</label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
        
        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
</x-layout>
