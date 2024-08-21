<?php

namespace App\Http\Controllers;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController {

    public function index(Season $season)
    {
       return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        if($watchedEpisodes !== null) 
            {$season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
                $episode->watched = in_array($episode->id, $watchedEpisodes);
            });
        } else {
            $season->episodes->each(function (Episode $episode) {
            $episode->watched = 0;
        });
        }

        $season->push();

        return redirect()->route('episodes.index', $season->id);
    }

}