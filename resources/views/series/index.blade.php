
<x-layout title="Séries"> 

    <div>
        <form class="search" action="{{route('series.search')}}" method="get">
            <input id="pesquisar" type="text" name="query" value="{{ request()->input('query') }}" placeholder="Pesquisar...">
            <button>Pesquisar</button>
        </form>
    </div>

    <br>

    @isset($mensagemSucesso)
        <div class="alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    @if ($series->count() > 0)
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
                    <br>
                </form>
                </span>
                @endauth
            </li>
            @endforeach
            <br>
            {{ $series->links()}}
    </ul>
    @else
    <p>Nenhum item encontrado.</p>
    @endif

    <br>
    @auth
    <a class="botao" href="{{route('series.create')}}">Adicionar serie</a>
    @endauth
</x-layout>