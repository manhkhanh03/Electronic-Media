<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // session_start();
        $user = Login::where('username', $request->input('name'))
            // ->orWhere('email', $request->input('name'))
            ->where('password', $request->input('password'))
            ->first();

        // if ($user && Hash::check($request->input('password'), $user->password)) {
        if($user) {
            // session()->put('user_id', $user->id);
            session(['user_id', $user->id]);
            session()->save();
            return response()->json( $user, 200);
        }
        else 
            return response()->json(['status' => 'failed'], 401);
    }

    public function idUser () {
        $user = auth()->user(); 
        if($user)
            return response()->json(['id' => $user->id], 200);
        else
            return response()->json(['status' => 'failed'], 401);
            
            
        // $user_id = session()->get('user_id');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
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
