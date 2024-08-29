<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreatedEvent;
use App\Http\Middleware\Autenticador;
use App\Repositories\EloquentSeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    private EloquentSeriesRepository $repository;

    public function __construct(EloquentSeriesRepository $repository) {
        $this->repository = $repository;
        $this->middleware(Autenticador::class)->except('index');
    }

    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');

        return view('series.index')-> with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $data = $request->file('cover');

        if ($request->hasFile('cover')){
            $coverPath = $data->store('series_cover', 'public');
        } else {
            $coverPath = Series::$coverPath;
        }
        
        $request->coverPath = $coverPath;
        $serie = $this->repository->add($request);

        SeriesCreatedEvent::dispatch(
            $request->name,
            $serie->id,
            $request->seasons,
            $request->episodes
        );

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série {$serie->name} adicionada com sucesso!");

    }

    public function destroy(Series $series) 
    {   
        $series->delete();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série {$series->name} removida com sucesso!");
    }

    public function edit(Series $series) 
    {
        return view("series.edit")->with("serie", $series);
    }

}