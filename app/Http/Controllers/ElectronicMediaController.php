<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Api\ArticleController;

class ElectronicMediaController extends Controller
{
    public function callApiWithMethodPutOrPatch(Request $request, $api) {
        return;
    }

    public function callApiWithMethodDelete($api) {

    }

    public function callApiWithMethodGet($api) {
        // $client = new Client();
        // $response = $client->request('GET', $api);
        // $body = $response->getBody()->getContents();
        // return $body;

        $client = new Client();
        $response = $client->get($api);
        $data = json_decode($response->getBody());
        return $data;
    }

    public function show($address) {
        return view($address);
    }
    
    public function showIndex() {
        return view('index')->with('posts_0', $this->callApiWithMethodGet('http://127.0.0.1:8000/api/articles/hot_0'));
    }

    public function showWriteArticle($id = null) {
        return view('write_articles')->with('id_article', $id);
    }

    public function showCategories(string $categories, $id) {
        return view('categories')->with(['categories' => $categories, 'cate_id' => $id]);
    }

    // public function showWriteArticles() {
    //     return view('write_articles');
    // }

    public function showArticle($title, string $article_id) {
        return view('article', ['title' => $title, 'article_id' => $article_id]);
    }

    // public function showArticle() {
    //     return view('article');
    // }
}
