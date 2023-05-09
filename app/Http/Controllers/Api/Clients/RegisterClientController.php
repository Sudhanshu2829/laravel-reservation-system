<?php

namespace App\Http\Controllers\Api\Clients;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientsFormRequest;

class RegisterClientController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ClientsFormRequest $request)
    {
        return User::create($request->only([
            'name',
            'email'
        ]));
    }
}
