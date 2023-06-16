<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\Api\ArticleController;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cm = Comment::all();
        return response()->json($cm, 200, ['OK']);
    }

    public function  getuser($cm) {
        $articles = new ArticleController();
        foreach ($cm as $comment) {
            $comment['user'] = $articles->show_user($comment['user_id']);
            array_push($cm, $comment);   
        }
        return $cm;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cm = Comment::create($request->all());
        $cm = $cm->toArray();
        
        $articles = new ArticleController();
        $cm['user'] = $articles->show_user($cm['user_id']);
        
        return response()->json($cm, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $cm = Comment::where('article_id', $request->article_id)
                    ->whereRaw('parent_comment_id is null' )
                    ->orderByRaw('created_at desc')
                    ->get();
                 
        $cm = $cm->toArray();
        return response()->json($this->getuser($cm), 200, ['OK']);
    }

    public function showParentComment(Request $request)
    {
        $cm = Comment::where('article_id', $request->article_id)
                    ->whereRaw('parent_comment_id is not null' )
                    ->orderByRaw('created_at desc')
                    ->get();
                 
        $cm = $cm->toArray();
        return response()->json($this->getuser($cm), 200, ['OK']);
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
