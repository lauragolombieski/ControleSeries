<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Support\Facades\DB;

class SeasonsController extends Controller
{
    private EloquentSeriesRepository $repository;

    public function __construct(EloquentSeriesRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Series $series)
    {
        $seasons = $series->seasons()->with('episodes')->get();

        return view('seasons.index')->with('seasons', $seasons)->with('series', $series);
    }

    public function destroy(Series $serie) {

        $data = __DIR__ . "/../../../public/storage/$serie->cover";
        if ($serie->cover !== "series_cover/netflix-symbol-black.png"){
            unlink($data);
            $data = $serie->cover = 'series_cover/netflix-symbol-black.png';
            $serie->save();
        }

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Capa removida com sucesso");
    }

    public function update(Series $serie, SeriesFormRequest $request)
    {
        SeasonsController::changeCover($serie, $request);
        SeasonsController::changeEpisodes($serie, $request);

        $serie->fill($request->except('cover'));
        $serie->save();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Salvo com sucesso");
    }

    public static function changeCover(Series $serie, SeriesFormRequest $request)
    {
        if($request->hasFile('cover')) {
            if ($serie->cover !== "series_cover/netflix-symbol-black.png"){
                $data = __DIR__ . "/../../../public/storage/$serie->cover";
                unlink($data);
            } 

            $data = $request->file('cover');

            $coverPath = $data->store('series_cover', 'public');
            $serie->cover = $coverPath;
            
            return $request->coverPath = $coverPath;

        } else {
            return null;
        }

    }

public static function changeEpisodes(Series $serie, SeriesFormRequest $request) 
    {
        if($request->episodes != ($serie->episodes->count())/$serie->seasons->count() || $request->seasons != ($serie->seasons->count())) {
            $serie->seasons()->delete();

            SeasonsController::eloquent($serie, $request);
        }
    }

    public static function eloquent(Series $serie, SeriesFormRequest $request) 
    {
    return DB::transaction(function() use ($request, $serie) {
        // Coleta o número de temporadas solicitado
        $requestedSeasons = $request->seasons;
        // Coleta o número de episódios solicitado por temporada
        $requestedEpisodesPerSeason = $request->episodes;

        // Inserir as temporadas
        $seasons = [];
        for ($i = 1; $i <= $requestedSeasons; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }

        Season::insert($seasons);

        $seasonIds = Season::where('series_id', $serie->id)
                        ->whereIn('number', range(1, $requestedSeasons))
                        ->pluck('id', 'number')
                        ->toArray();

        // Inserir episódios associados às temporadas
        $episodes = [];
        foreach ($seasonIds as $seasonId) {
            for ($j = 1; $j <= $requestedEpisodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $seasonId,
                    'number' => $j,
                ];
            }
        }

        // Inserir episódios
        Episode::insert($episodes);

        // Retornar a série atualizada
        return $serie;

            });
    }
}
