<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Article::all();
        $categories = ArticleCategory::all();

        return view('welcome')->with([
            'products' => $products,
            'categorires' => $categories
        ]);
    }
}
