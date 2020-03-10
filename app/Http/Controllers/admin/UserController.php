<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Order;
use App\Product;
use App\Cart;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();

        return view('admin.users.index')
            ->with('users', $user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        	'first_name' => ['required', 'string', 'max:255'],
          'last_name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:6', 'confirmed'],
	    ]);

	    $user = new user([
	        'first_name' => $request->get('first_name'),
    	    'last_name' => $request->get('last_name'),
	        'email'=> $request->get('email'),
	        'password'=> bcrypt($request->get('password')),
	    ]);

        $user->save();

	    return redirect(route('users.index'))->with('success', 'user has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show')
        	->with('users', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit')
        		->with('user', $user);
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
        'first_name' => ['required', 'string', 'max:255'],
          'last_name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255'],
	    ]);

	    $user = User::find($id);
	    $user->first_name = $request->get('first_name');
	    $user->last_name = $request->get('last_name');
	    $user->email = $request->get('email');
	    $user->save();

	    return redirect(route('users.index'))->with('success', 'Status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
     	$user->delete();

     	return redirect(route('users.index'))->with('success', 'user has been deleted Successfully');
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
