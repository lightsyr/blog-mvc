<x-layout>
    <div class="container mt-3">
        <h1>Cadastre sua publicação</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Título">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Imagem de capa</label>
                <input type="file" name="cover" id="cover" class="form-control">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="content" id="content">Conteúdo</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</x-layout>