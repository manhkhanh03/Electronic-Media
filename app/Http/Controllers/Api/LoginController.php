<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;

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
        $data = Login::create($request -> all());
        return response()->json($data, 200, ['Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (class_exists('App\File')) {
            return 1;
        } else {
            // Lớp App\File không tồn tại
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
