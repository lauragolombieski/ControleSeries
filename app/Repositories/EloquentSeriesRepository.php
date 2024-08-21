<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use DB;

class EloquentSeriesRepository
{
    public function add(SeriesFormRequest $request)
    {
        return DB::transaction(function() use ($request) {
            $serie = Series::create($request->all());
            $seasons = [];

                for ($i = 1; $i <= $request->seasons; $i++) {
                    $seasons[] = [
                        'series_id' => $serie->id,
                        'number' => $i,
                    ];
                }
            Season::insert($seasons);

            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($j = 1; $j <= $request->episodes; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j,
                    ];
                }
            }
            Episode::insert($episodes);

            return $serie;
        });
    }
}