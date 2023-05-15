<?php

namespace App\Http\Controllers\Api\Activities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activities\ActivitiesRequest;
use App\Models\Activity;
use Illuminate\Http\JsonResponse;

class RegisterActivitiesController extends Controller
{
    /** Handle the incoming request. */
    public function __invoke(ActivitiesRequest $request): JsonResponse
    {
        $activity = Activity::create($request->only([
            'name',
            'slug',
            'description',
            'price',
        ]));

        return response()->json('ok');
    }
}
