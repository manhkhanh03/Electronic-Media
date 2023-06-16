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
        
        $article = json_decode($article);

        $listArrArticles = [];
        array_push($listArrArticles, json_decode($article->JSON));

        $new = [];
        foreach($listArrArticles as $index => $postss) {
            $obj = [];
            $obj['id'] = $article->id;
            if ($postss[$index]->type === 'header') {
                if ($postss[$index]->data->level === 1) {
                    $obj['title'] = $postss[$index]->data->text;
                } else if ($postss[$index]->data->level === 2) {
                    $obj['subheadline'] = $postss[$index]->data->text;
                }
            } else if ($postss[$index]->type === 'image') {
                $obj['image'] = $postss[$index]->data->url;
            }

            array_push($new, $obj);
        }
        return response()->json($new, 200, ['OK']);
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

    public function showArticleById(Request $request) {
        $posts = Article::where('id', $request->article_id)
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

    public function showCategories(Request $request) {
        $posts = Article::where('categorie_id', $request->categorie_id)
                // ->where('status_id', 3)
                ->select()
                ->get();
        $posts = json_decode($posts);
        return $this->handleData($posts);
    }

    public function show_user(string $id) {
        $data = User::join('image_users', 'user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select()
            ->get();
            return $data;
    }

    public function showPostHot(Request $request) {
        $articles = [];
        foreach($this->showByPostOrByStatus(5, 3) as $index => $article) {
            if ($index <= $request->quantity) {
                array_push($articles, $article);
            }else break;
        }
        return response()->json($articles, 200, ['OK']);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json($article, 200, ['OK']);
    }

    function binarySearch($arr, $target) {
        $left = 0;
        $right = count($arr) - 1;

        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);

            if ($arr[$mid] === $target) {
                return $mid;
            }

            if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return -1;
    }

    public function handleSearchArticles(Request $request) {
        $articles = Article::where('status_id', $request->status_id)
                        ->get();
        $articles = json_decode($articles);

        $listArrArticles = [];
        foreach ($articles as $article) {
            array_push($listArrArticles, json_decode($article->JSON));
        }

        $new = [];
        foreach($listArrArticles as $index => $postss) {
            $obj = [];
            $obj['id'] = $articles[$index]->id;
            foreach ($postss as $key => $post) {
                $obj['id'] = $articles[$index]->id;
                $obj['author_id'] = $articles[$index]->author_id;
                $obj['categorie_id'] = $articles[$index]->categorie_id;
                $obj['author'] = $this->show_user($articles[$index]->author_id);
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

            array_push($new, $obj);
        }

        $arrIndex = [];
        foreach ($new as $index => $article) { 
            if(stripos($article['title'], $request->title) !== false) {
                array_push($arrIndex, $index);
            }
        }
        
        $newArrArticles = [];
        foreach($arrIndex as $i) {
                array_push($newArrArticles, $new[$i]);
        }

        return response()->json($newArrArticles, 200, ['OK']);
    }

    public function showRelatedNews(Request $request) {
        $posts = Article::where('categorie_id', $request->categorie_id)
                ->whereRaw('id != '. $request->article_id)
                ->select()
                ->get();
        $posts = json_decode($posts);
        $newArr = [];
        foreach($posts as $index => $article) {
            if($index <= 1) {
                array_push($newArr, $article);
            }
        }
        return $this->handleData($newArr);
    }
}
