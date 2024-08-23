
<x-layout title="Episodios">

    <form method="post">
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
        @auth
        <button id="salvar" class="btn btn-primary">Salvar</button>
        @endauth
    </form>
</x-layout>