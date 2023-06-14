<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class RoleController extends Controller
{
    public function role(Request $request)
    {
        if($this->user($request)) {
            if ($this->user($request)->hasPermission('write articles')) {
                return response()->json(['role' => 'editer'])->withCookie(Cookie::make('role', 'editor'));
            }
            else if ( $this->user($request)->hasPermission('manage users')) {
                return response()->json(['role' => 'admin'])->withCookie(Cookie::make('role', 'admin'));
            }
        }
        return response()->json(['role' => 'reader'])->withCookie(Cookie::make('role', null));
    }

    public function user(Request $request) {
        $user = $request->cookie('jKmLpNqRsTuVwXyZaBcD');
        if($user)
            return  User::find($user);
        return null;
    }

    public function getRole(Request $request) {
        $role = $request->cookie('role');
        if($role === "editor")
            return response()->json(['role' =>  'editor'], 200);
        else if($role === "admin")
            return response()->json(['role' => 'admin'], 200);
        else return response()->json(['role' =>  'reader'], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
