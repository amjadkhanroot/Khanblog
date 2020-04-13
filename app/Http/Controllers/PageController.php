<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $recentArticles = Article::take(4)->orderBy('id','desc')->get();
        $randomArticles =  Article::take(8)->inRandomOrder()->get();
        return view('welcome', compact( 'recentArticles', 'randomArticles'));
    }
}
