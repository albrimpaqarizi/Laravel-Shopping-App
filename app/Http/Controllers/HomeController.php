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

    public function show($id)
    {
        $article = Article::find($id);
        return view('pages.show', compact('article')); 
    }

    public function search(Request $request)
    {   
        $products = Article::where('title','LIKE','%'.$request->search."%")->get();
        return view('pages.search')->with([
            'products' => $products,
            'search' => $request->search,
        ]);
    }
}
