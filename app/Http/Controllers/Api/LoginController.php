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
            // Cookie::make('id', $infoLogin->id);
            // $request->session()->put('user', $infoLogin);
            $response = response()->json($infoLogin, 200, ['OK']);
            $response->withCookie(Cookie::make('id', $infoLogin->id));
            return $response;
            // return response()->json($request->session()->get('user'), 200, ['OK']);
            // return redirect()->to('/index/index');
        } else {
            return response()->json(['status' => 'failed'], 401);
        }
    }

    public function idUser(Request $request) {
        $user = $request->cookie('id');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
