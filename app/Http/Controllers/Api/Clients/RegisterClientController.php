<?php

namespace App\Http\Controllers\Api\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientsFormRequest;
use App\Http\Resources\Clients\UserShowResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterClientController extends Controller
{
    /** Handle the incoming request. */
    public function __invoke(ClientsFormRequest $request)
    {
        $client = User::create($request->only([
            'name',
            'email',
        ]));

        return new UserShowResource($client);
    }
}
