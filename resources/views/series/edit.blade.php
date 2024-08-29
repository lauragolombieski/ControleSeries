<x-layout title="Editar Série">
    <form method="post" enctype="multipart/form-data">
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
                       value="{{ $serie->name }}">
                </input>
            </div>

            <div class="col-2">
                <label for="seasons" class="teste">Temps</label>
                <br>
                    <input class="teste2" type="text"
                        id="seasons"
                        name="seasons"
                        class="form-control"
                        value="{{$serie->seasons->count()}}">
                    </input>
            </div>

            <div class="col-2">
                <label for="episodes" class="teste">Episodios</label>
                <br>
                    <input class="teste2" type="text"
                       id="episodes"
                       name="episodes"
                       class="form-control"
                       value="{{($serie->episodes->count())/$serie->seasons->count()}}">
                    </input>
            </div>

                <div class="col-12">
                    <label for="cover" class="form-label">Modificar Capa</label>
                    <input type="file" id="cover" name="cover" class="form-control" 
                            accept="image/gif, image/jpeg, image/png">
                            <br>
                </div>

        </div>
        <button id="botao2" type="submit" class="botao">Salvar</button>
    </form>
</x-layout>