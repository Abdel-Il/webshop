<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

     public function __construct()
     {
       $this->middleware('auth');
     }

    public function index()
    {
      $category = Category::get();
      $product = Product::get();
      $user = User::get();

      return view('admin.index', compact('product', 'category', 'user'));
    }

    public function show($id)
    {
      $category = Category::find($id);
      $product = Product::find($id);
      $user = User::find($id);

      return view('admin.index', compact('product', 'category', 'user'));
    }
  }
