<x-layout title="{!!$series->name!!}">

    <div class="d-flex justify-center">
        <img src="{{ asset('storage/' . $series->cover)}}"
        style="height: 200px" 
        alt="Capa da Série" 
        class="image-fluid">
    </div>

        <form action="{{ route('seasons.destroy', ['serie' => $series->id]) }}" method="POST">
            @csrf
            <button type="submit" id="deleteimage">
                Remover Capa
            </button>
        </form>
    </ul>

    <br>

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
               <a class="descricao" href="{{ route('episodes.index', $season->id)}}">Temporada {{$season->number}}</a>
            
                <span class="badge bg-secondary">
                    {{ $season->watched() }} / {{ $season->episodes->count()}}
                </span>
            </li>
            @endforeach
    </ul>
</x-layout>