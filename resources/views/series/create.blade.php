<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome</label>
                <br>
                <input class="teste3" type="text"
                       autofocus
                       id="name"
                       name="name"
                       class="form-control"
                       value="{{ old('nome') }}">
            </div>

            <div class="col-2">
                <label for="seasons" class="teste">Temps</label>
                <br>
                <input class="teste2" type="text"
                       id="seasons"
                       name="seasons"
                       class="form-control"
                       value="{{ old('seasons') }}">
            </div>

            <div class="col-2">
                <label for="episodes" class="teste">Episodios</label>
                <br>
                <input class="teste2" type="text"
                       id="episodes"
                       name="episodes"
                       class="form-control"
                       value="{{ old('episodes') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" name="cover" class="form-control" accept="image/gif, image/jpeg, image/png">
            </div>
        </div>

        <button id="botao2" type="submit" class="botao">Adicionar</button>
    </form>
</x-layout>
