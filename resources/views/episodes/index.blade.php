
<x-layout title="Episodios">

    <form id="formularioep" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Episodio {{$episode->number}}</a>

                    <input type="checkbox" 
                        name="episodes[]" 
                        value="{{$episode->id}}"
                        @if ($episode->watched) checked @endif>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-3">Salvar</button>
    </form>
</x-layout>