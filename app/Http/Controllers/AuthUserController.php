<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;

class AuthUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show()
    {
        return new UserResource(auth()->user());
    }
}
