<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectronicMediaController extends Controller
{
    // public function showHome() {
    //     return view('home');
    // }

    // public function showLogin() {
    //     return view('login');
    // }

    // public function showSignup() {
    //     return view('signup');
    // }

    // public function showIndex() {
    //     return view('index');
    // }

    public function show(string $address) {
        return view($address);
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

    public function showArticle(string $article_id) {
        return view('article')->with(['article_id' => $article_id]);
    }

    // public function showArticle() {
    //     return view('article');
    // }
}
