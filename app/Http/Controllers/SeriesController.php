<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentSeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    private EloquentSeriesRepository $repository;

    public function __construct(EloquentSeriesRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');

        return view('series.index')-> with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
        //return view('listar-series')->with('series', $series)

    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série {$serie->name} adicionada com sucesso!");
    }

    public function destroy(Series $series) 
    {   
        $series->delete();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série {$series->name} removida com sucesso!");
    }

    public function edit(Series $series) 
    {
        return view("series.edit")->with("series", $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Salvo com sucesso");
    }
}