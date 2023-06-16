<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
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
        $like = Like::create($request->all());
        return response()->json($like, 200, ['OK']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $article_id, string $user_id)
    {
        $total_like = Like::selectRaw('count(*) as total')
                    ->where('article_id', $article_id)
                    ->groupBy()
                    ->get();

        $user_like = Like::selectRaw('user_id')
                    ->where('article_id', $article_id)
                    ->where('user_id', $user_id)
                    ->get();

        $total_like_array = [];
        if($user_like->isEmpty()) {
            $total_like_array['total'] = $total_like[0]->total;
            $total_like_array['action'] = 'false';
            
        }else {
            $total_like_array['total'] = $total_like[0]->total;
            $total_like_array['action'] = 'true';
        }

        $total_like = $total_like_array;
        
        return response()->json($total_like, 200);
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
    public function destroy(Request $request)
    {
        $likes = Like::where('user_id', $request->user_id)
                    ->where('article_id', $request->article_id)
                    ->get();
        foreach ($likes as $like)
            $like->delete();   
        return response()->json($likes, 200);
    }
}
