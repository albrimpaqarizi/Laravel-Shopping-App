<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleCategory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'inStock'=>'required',
            'image' => 'required|file|image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalName();           
            $filePath = $file->store('images');
        }
        
        // if($request->hasFile('image')) {
        //     $image       = $request->file('image');
        //     $filename    = $image->getClientOriginalName();
        //     $image_resize = Image::make($image->getRealPath());              
        //     $image_resize->resize(300, 200);
        //     $image_resize->save(public_path('storage/images/' .$filename));
        // }

        $article = new Article([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'inStock' => $request->get('inStock'),
            'image' => $filePath,
        ]);
        $article->save();
        return redirect('/articles')->with('success', 'Article saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = ArticleCategory::all();
        return view('articles.edit', compact('article','categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'inStock'=>'required',
            'image' => 'file|image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->category_id = $request->get('category_id');
        $article->description = $request->get('description');
        $article->price = $request->get('price');
        $article->inStock = $request->get('inStock');
       
        if($request->hasFile('image')){
            Storage::delete($article->image);
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalName();
            $filePath = $file->store('images');
            $article->image = $filePath;
        } else {
            $article->image;
        }

        $article->save();
        return redirect('/articles')->with('success', 'Article update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $image_path = $article->image;
        Storage::delete($image_path);

        $article -> delete();

        return redirect('/articles') ->with('success','Article deleted!');
    }
}
