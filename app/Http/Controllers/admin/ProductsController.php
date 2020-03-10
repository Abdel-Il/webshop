<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $product = Product::get();

        return view('admin.products.index', compact('product', 'category'));
    }
    public function show($id)
    {
        $category = Category::find($id);
        $product = Product::find($id);

        return view('admin.products.index', compact('product', 'category'));

        // return view('admin.index', compact('product'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.products.create')->with('category', $category);
    }

    public function store(Request $request)
    {
        $request->validate([
        'title'=>'required',
        'description'=> 'required',
        // 'category'=> 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9999',
        'price'=> 'required',
    ]);

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->image = $request->image->getClientOriginalName();
        $product->price = $request->price;
        $product->save();
        $request->image->storeAs('public/uploads', $request->image->getClientOriginalName());
        return redirect(route('products.index'))->with('success', 'Products has been added');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit')->with('products', $product);
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
            'description'=> 'required',
            'price'=> 'required',
        ]);

        $product = Product::find($id);
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();

        return redirect(route('products.index'))->with('success', 'Price has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect(route('products.index'))->with('success', 'Product has been deleted Successfully');
    }
}
