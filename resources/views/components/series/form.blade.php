<form action="{{$action}}" method="post">
        @csrf

        @if($update)
        @method('PUT')
        @endisset

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome</label>
                <br>
                <input class="teste3" type="text"
                       autofocus
                       id="name"
                       name="name"
                       class="form-control"
                       value="{{ $nome }}">
            </div>

            <div class="col-2">
                <label for="seasons" class="teste">Temps</label>
                <br>
                <input class="teste2" type="text"
                       id="seasons"
                       name="seasons"
                       class="form-control"
                       value="X">
            </div>

            <div class="col-2">
                <label for="episodes" class="teste">Episodios</label>
                <br>
                <input class="teste2" type="text"
                       id="episodes"
                       name="episodes"
                       class="form-control"
                       value="X">
            </div>
        </div>
        <button id="botao2" type="submit" class="botao">Salvar</button>
    </form>