<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Order;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Auth;

class PaymentController extends Controller
{
    public function show($id)
    {
        $article = Article::find($id);
        return view('payment.index', compact('article'));
    }

    public function store(Request $request)
    {   
        try {
            $charge = Stripe::charges()->create([
                'amount' => $request->price,
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
            ]);

            $request->validate([
                'address'=>'required',
                'phone'=>'required',
            ]);
            $order = new Order([
                'status' => 'new',
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'user_id' => Auth::user()->id,
                'article_id' => $request->get('articleId'),
            ]);
            $order->save();
            
            $article = Article::find($request->get('articleId'));
            $article->inStock -= 1;
            $article->update();

            return redirect()->route('shop.index')->with('success_message', 'Thank you!');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
