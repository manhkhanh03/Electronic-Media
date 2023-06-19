<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
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
        $fl = Follow::create($request->all());
        return response()->json($fl, 200, ['OK']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $fl = Follow::where('follower_id', $request->follower_id)
                    ->get();
        return response()->json($fl, 200, ['OK']);
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
        $fl = Follow::find($id);
        $fl->delete();
        return response()->json($fl, 200, ['OK']);
    }

    public function getFollow($user_id, $author_id) {
        $fl = Follow::where('following_id', $author_id)
                    ->where('follower_id', $user_id)
                    ->get();
        
        foreach ($fl as $follow) {
            if($fl->isEmpty()) {
                return null;
            }else 
                return $follow->id;
        }
    }
}
