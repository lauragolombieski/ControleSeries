<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

class SeriesController {
    
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {
        return response()
        ->json(Series::create($request->all()), 201);
    }
}
