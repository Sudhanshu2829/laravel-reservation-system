<?php

namespace App\Http\Controllers\Api\Activities;

use App\Http\Controllers\Controller;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Activity\ShowActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListActivitiesController extends Controller
{
    /** Handle the incoming request. */
    public function index(Request $request): AnonymousResourceCollection
    {
        $activities = Activity::query()
            ->latest('created_at')
            ->paginate(3);

        return ShowActivityResource::collection($activities);
    }

    public function show(Activity $activity): ActivityResource
    {
        return new ActivityResource($activity);
    }
}
