<x-layout title="Editar Série">
    <form action="{{ route('series.store') }}" method="post">
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
                       value="{{ $series->name }}">
            </div>

            <div class="col-2">
                <label for="seasons" class="teste">Temps</label>
                <br>
                <input class="teste2" type="text"
                       id="seasons"
                       name="seasons"
                       class="form-control">
            </div>

            <div class="col-2">
                <label for="episodes" class="teste">Episodios</label>
                <br>
                <input class="teste2" type="text"
                       id="episodes"
                       name="episodes"
                       class="form-control">
            </div>
        </div>


        <button type="submit" class="botao">Adicionar</button>
    </form>
</x-layout>