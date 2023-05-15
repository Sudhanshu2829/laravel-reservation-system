<?php

namespace App\Http\Controllers\Api\Activities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activities\ActivitiesRequest;
use App\Http\Resources\Activity\ShowActivityResource;
use App\Models\Activity;

class RegisterActivitiesController extends Controller
{
    /** Handle the incoming request. */
    public function __invoke(ActivitiesRequest $request): ShowActivityResource
    {
        $activity = Activity::create($request->only([
            'name',
            'slug',
            'description',
            'price',
        ]));

        return new ShowActivityResource($activity);
    }
}
