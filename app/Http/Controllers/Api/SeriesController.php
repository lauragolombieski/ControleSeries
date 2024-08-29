<?php

namespace App\Http\Controllers\Api;
use App\Events\SeriesCreatedEvent;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Http\Request;

class SeriesController {

    private EloquentSeriesRepository $repository;

    public function __construct(EloquentSeriesRepository $repository) {
        $this->repository = $repository;
    }
    
    public function index(Request $request)
    {
        $query = Series::query();
        if ($request->has('name')) {
            return $query->where('name', $request->name)->paginate();
        } else {
            return $query->paginate(5);
        }

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
            $request->episodes,
        );

        return response()->json($serie, 201);
    }

    public function show(int $series)
    {
        $seriesModel = Series::with('seasons.episodes')->find($series);
        if ($seriesModel == null) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }
        return $seriesModel;
    }

public function update(Series $series, SeriesFormRequest $request)
{
    $series->fill($request->all());
    $series->save();

    return $series;
}

    public function destroy(int $series)
    {
        Series::destroy($series);

        return response()->noContent();
    }
}
