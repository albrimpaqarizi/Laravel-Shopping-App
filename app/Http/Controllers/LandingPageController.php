<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Article::all();

        return view('welcome')->with('products', $products);
    }
}
