<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::all();
        return response()->json($data, 200, ['OK']);
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
    public function show()
    {
        $data = Post::join('images', 'mode_id', '=', 'posts.id')
            // ->where('mode_id', $id)
            ->where('type', 1)
            ->where('status_id', 2)
            ->whereIn('hot', [1, 2])
            ->select('posts.*')
            ->selectRaw('images.mode_id AS mode_post, images.url, images.content AS contentImg', [] )
            ->orderBy('hot', 'asc')
            ->get();
        foreach ($data as $post) {
            $user_data = $this->show_user($post->user_id);
            $post->user_data = $user_data;
        }
        return response()->json($data, 200, ['OK']);
    }

    public function showPostHot_0()
    {
        $data = Post::join('images', 'mode_id', '=', 'posts.id')
            // ->where('mode_id', $id)
            ->where('type', 1)
            ->where('status_id', 2)
            ->where('hot', 0)
            ->select('posts.*')
            ->selectRaw('images.mode_id AS mode_post, images.url, images.content AS contentImg', [] )
            ->orderBy('hot', 'asc')
            ->get();
        foreach ($data as $post) {
            $user_data = $this->show_user($post->user_id);
            $post->user_data = $user_data;
        }
        return response()->json($data, 200, ['OK']);
    }

    public function showTheme_Type($theme_type) {
        $data = Post::join('images', 'mode_id', '=', 'posts.id')
            // ->where('mode_id', $id)
            ->where('type', 1)
            ->where('status_id', 2)
            ->where('theme_type_id', $theme_type)
            ->select('posts.*')
            ->selectRaw('images.mode_id AS mode_post, images.url, images.content AS contentImg', [] )
            ->orderBy('hot', 'asc')
            ->get();
        foreach ($data as $post) {
            $user_data = $this->show_user($post->user_id);
            $post->user_data = $user_data;
        }
        return response()->json($data, 200, ['OK']);
    }

    public function show_user(string $id) {
        $data = User::join('images', 'mode_id', '=', 'users.id')
            ->where('mode_id', $id)
            ->where('type', 0)
            // ->select('users.*')
            // ->selectRaw('images.url AS url_user')
            ->select('users.*', 'images.mode_id AS mode_user', 'images.url AS url_user')
            ->get();
        return $data;
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
