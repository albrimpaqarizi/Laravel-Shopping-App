<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Article::all();
        $categories = ArticleCategory::all();

        return view('pages.shop')->with([
            'products' => $products,
            'categorires' => $categories
        ]);
    }
}
