<?php

namespace App\Http\Controllers\admin;

use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  public function index()
  {
    $order = Order::get();

    $order = Auth::user()->order;
      $order->transform(function($order, $key) {
          $order->cart = unserialize($order->cart);
          return $order;
      });

    return view('admin.orders.index')->with('order', $order);
  }
  
  public function destroy($id)
  {
    $order = Order::find($id);
    $order->delete();

    return redirect(route('orders.index'))->with('success', 'Product has been deleted Successfully');
  }

  public function getProfile()
    {
      $order = Auth::user()->order;
      $order->transform(function($order, $key) {
          $order->cart = unserialize($order->cart);
          return $order;
      });
      
      return view('user.profile')->with('order', $order);
      
      // return view('admin.users.edit')
      //     ->with('user', $user);
    }
}
