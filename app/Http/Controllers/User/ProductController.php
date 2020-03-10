<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Order;
use App\Product;
use App\Category;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $product = Product::with('category')->get();

        return view('user.home', compact('product', 'category'));
    }


    public function searchTag($id)
    {
        $category = Category::get();
        $product = Product::with('category')
        ->join('categories', 'categories.id', 'products.category_id')
        ->where('categories.id', $id)
        ->get();

        return view('user.home', compact('product', 'category'));
    }

    public function AddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function reduceByOne(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $oldCart->reduceByOne($id);
        if (count($oldCart->items) > 0) {
            Session::put('cart', $oldCart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function RemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }


    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('user.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('user.shopping-cart', ['products' => $oldCart->items, 'totalPrice' => $oldCart->totalPrice]);
    }


    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('user.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $total = $oldCart->totalPrice;
        return view('user.checkout', ['total' => $total]);

        dd($oldCart);
    }
    public function postCheckout(Request $request)
    {
        $oldCart = Session::get('cart');
        $total = $oldCart->totalPrice;
        if (!Session::has('cart')) {
            return redirect()->route('user.shoppingCart');
        }
        $oldCart = Session::get('cart');
        // try {
        $order = new Order();
        $order->city = $request->get('city');
        $order->address = $request->get('address');
        $order->cart = serialize($oldCart);
        $order->first_name = $request->get('first_name');
        $order->last_name = $request->get('last_name');
        $order->user_id = $request->get('user_id');
        $order->price = $request->get('price');

        Auth::user()->order()->save($order);

        $order->save();

        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully purchased products!');
    }
}
