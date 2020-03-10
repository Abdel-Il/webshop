<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'title', 'description', 'image', 'category_id', 'price',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }


    public function category()
    {
      return $this->belongsTo('App\Category');

      // $product = Product::where('slug', 'baywatch agenda')->with('category')->first();
      // $product->category->name
    }
}
