<form action="{{$action}}" method="post">
        @csrf

        @if($update)
        @method('PUT')
        @endisset

        <div class="mb-3">
            <label class="teste" for="name">Nome:</label>
            <input class="teste2" type="text" 
                                    id="name"  
                                    name="name" 
                                    @isset($nome) value="{{ $nome ?? '' }}" @endisset>
            <br>

            <label class="teste" for="temp">Temporadas:</label>
            <input class="teste2" type="text" id="temp" name="temp">
            <br>

            <label class="teste" for="ep">Episodios:</label>
            <input class="teste2" type="text" id="ep" name="ep">
        </div>

        <?php if(isset($nome)) {?> <button type="submit" class="botao">Salvar</button> <?php
        } else {?>
        <button type="submit" class="botao">Adicionar</button>
        <?php } ?>
    </form>