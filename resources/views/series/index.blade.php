
<x-layout title="Séries">

    @isset($mensagemSucesso)
        <div class="alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                <img src="{{ asset('storage/' . $serie->cover)}}" width="100px" class="img-thumbnail">
                <a class="descricao" href="{{ route('seasons.index', $serie->id) }}"> 
                    {{$serie->name}}
                </a>
            </div>
            
            <span class="d-flex">
            
                @auth
                    <a class="update" href="{{route('series.edit', $serie->id)}}">E</a>
            
            <form class="X" action="{{route('series.destroy', $serie->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
                </span>
                @endauth
            </li>
            @endforeach
    </ul>
    <br>
    @auth
    <a class="botao" href="{{route('series.create')}}">Adicionar serie</a>
    @endauth
</x-layout>