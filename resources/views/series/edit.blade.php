<x-layout title="Editar Série">
    <x-series.form :action="route('series.update', $series->id)" :nome="$series->name" :update="true" />
</x-layout>