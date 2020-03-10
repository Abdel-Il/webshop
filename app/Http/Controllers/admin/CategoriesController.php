<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
  public function index()
  {
      $category = Category::get();

      return view('admin.categories.index', compact('category'));
  }

  public function show($id)
  {
     $category = Category::find($id);

     return view('admin.categories.show', compact('category'));
  }

  public function create()
  {
     return view('admin.categories.create');
  }

  public function store(Request $request)
  {
     $request->validate([
       'name'=>'required',
     ]);

     $category = new Category([
       'name' => $request->get('name'),
     ]);

     $category->save();

      return redirect(route('categories.index'))->with('success', 'Category has been added');
  }

  public function edit($id)
  {
      $category = Category::find($id);
      return view('admin.categories.edit')->with('categories', $category);
  }

  public function update(Request $request, $id)
  {
      $request->validate([
        'name' => 'required',
    ]);

    $category = Category::find($id);
    $category->name = $request->get('name');
    $category->save();

    return redirect(route('categories.index'))->with('success', 'Category has been updated');
  }

  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();

    return redirect(route('categories.index'))->with('success', 'Category has been deleted Successfully');
  }
}
