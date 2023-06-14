<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $data = Login::all();
        return response()->json($data, 200, ['OK']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = Login::where('username', $request->input('username'))->first();
        if($name) {
            return response()->json(['status' => 'false'], 401);
        }
        $data = Login::create($request -> all());
        return response()->json($data, 200, ['Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Login::find($id);
        return response()->json($data, 200, ['OK']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if ($this->authenticate($credentials)) {
            $infoLogin = $this->getUserByUsername($credentials['username']);
            return response()->json($infoLogin, 200, ['OK'])->withCookie(Cookie::make('jKmLpNqRsTuVwXyZaBcD', $infoLogin->id));
        } else {
            return response()->json(['status' => 'failed'], 401);
        }
    }

    public function idUser(Request $request) {
        $user = $request->cookie('jKmLpNqRsTuVwXyZaBcD');
        if($user)
            return response()->json(['id' => $user], 200);
        return response()->json(['status' => 'failed'], 200);        
    }

    private function authenticate($credentials)
    {
        return Login::where('username', $credentials['username'])
                    ->where('password', $credentials['password'])
                    ->exists();
    }

    private function getUserByUsername($username)
    {
        return Login::where('username', $username)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $login = Login::where('id', $id)->first();
        $login->update($request->all());
        return response()->json($login, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkPassword(Request $request, $id) {
        $user = Login::where('id', $id)
                    ->where('password', $request->password)
                    ->get();
        if($user->isEmpty()) 
            return response()->json(['status' => 'false'], 200);
        return response()->json(['status' => 'true'], 200);
    }

    public function handleLogout()  {
        $response = new Response(view('login'));
        $response->withCookie(Cookie::make('jKmLpNqRsTuVwXyZaBcD', null, 0));
        $response->withCookie(Cookie::make('role', null, 0));

        return $response;
    }
}
