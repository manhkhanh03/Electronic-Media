<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Hot;

class ArticleController extends Controller
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
        $article = Article::create($request->all());
        return response()->json($article, 200, ['OK']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function handleData($posts) {
        $newPosts = [];
        foreach ($posts as $post) {
            array_push($newPosts, json_decode($post->JSON));
        }
        $new = [];
        foreach($newPosts as $index => $postss) {
            $obj = [];
            $obj['id'] = $posts[$index]->id;
            $obj['author_id'] = $posts[$index]->author_id;
            $obj['categorie_id'] = $posts[$index]->categorie_id;
            $obj['author'] = $this->show_user($posts[$index]->author_id);
            foreach ($postss as $key => $post) {
                if ($post->type === 'header') {
                    if ($post->data->level === 1) {
                        $obj['title'] = $post->data->text;
                    } else if ($post->data->level === 2) {
                        $obj['subheadline'] = $post->data->text;
                    }
                } else if ($post->type === 'image') {
                    $obj['image'] = $post->data->url;
                }
            }
            $obj['created_at'] = $posts[$index]->created_at;

            array_push($new, $obj);
        }
        return $new;
    }

    public function showByPostOrByStatus($hot, $status) {
        $posts = Article::join('hots', 'article_id', 'articles.id')
                ->where('status_id', $status)
                ->groupBy('articles.id', 'author_id', 'categorie_id')
                ->havingRaw('count(*) >= '. $hot)
                ->orderByRaw('COUNT(*) DESC')
                ->select('articles.id', 'author_id', 'categorie_id', 'created_at', 'JSON', 'status_id')
                ->get();
        $posts = json_decode($posts);
        return $this->handleData($posts);
    }

    public function showArticleById($id) {
        $posts = Article::where('id', $id)
                // ->where('status_id', 3)
                ->select()
                ->get();
        $posts = json_decode($posts);
        $newPosts = [];
        foreach ($posts as $index => $post) {
            $newPosts['id'] = $posts[$index]->id;
            $newPosts['status_article'] = $posts[$index]->status_id;
            $newPosts['categorie_id'] = $posts[$index]->categorie_id;
            $newPosts['author_id'] = $posts[$index]->author_id;
            $newPosts['created_at'] = $posts[$index]->created_at;
            $newPosts['data_article'] = json_decode($post->JSON);
            $newPosts['data_user'] = $this->show_user($posts[$index]->author_id);
        }

        return $newPosts;
    }

    public function showCategories($categorie_id) {
        $posts = Article::where('categorie_id', $categorie_id)
                // ->where('status_id', 3)
                ->select()
                ->get();
        $posts = json_decode($posts);
        return $this->handleData($posts);
    }

    public function show_user($id) {
        $data = User::join('image_users', 'user_id', '=', 'users.id')
            ->where('user_id', $id)
            ->select()
            ->get();
            return $data;
    }

    public function showPostHot() {
        return response()->json($this->showByPostOrByStatus(15, 3), 200, ['OK']);
    }

    public function showPostHot_0() {
        return response()->json($this->showByPostOrByStatus(0, 3), 200, ['OK']);
    }

    public function showPostByStatus() {
        return response()->json($this->showByPostOrByStatus(0, 2), 200, ['OK']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);
        $article->update($request->all());
        return response()->json($article, 200, ['OK']);
    }

    // public function updateStatusArticle(Request $request, string $id) {
    //     $article = Article::find($id);
    //     $article->update($request->all());
    //     return response()->json($article, 200, ['OK']);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json($article, 200, ['OK']);
    }
}
