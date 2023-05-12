<?php

namespace App\Http\Controllers\Api\Activities;

use App\Models\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Activities\ActivitiesRequest;
use App\Http\Resources\Activities\ActivitiesShowResorce;

class RegisterActivitiesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivitiesRequest $request)
    {
        $activity = Activity::create($request->only([
            'name',
            'slug',
            'description',
            'price',
        ]));

        return new ActivitiesShowResorce($activity);
    }
}
