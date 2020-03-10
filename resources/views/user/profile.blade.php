@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders</h2>
            @foreach($order as $ord)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($ord->cart->items as $item)
                                <li class="list-group-item">
                                    <img class="img-thumbnail border-0 p-0 rounded-0" style="width: 150px;" src="{{asset('storage/uploads/' .$item['item']['image']) }}">
                                    <span class="badge">${{ $item['price'] }}</span>
                                    {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: ${{ $ord->cart->totalPrice }}</strong>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
