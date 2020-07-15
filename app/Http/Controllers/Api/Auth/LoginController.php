<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $request->request->add([
            'grant_type' => env('PASSPORT_GRANT_TYPE'),
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $tokenRequest = Request::create(env('APP_URL') . '/oauth/token', 'post');

        $response = Route::dispatch($tokenRequest);

        return $response;
    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
 
        return response()->noContent();
    }
}
