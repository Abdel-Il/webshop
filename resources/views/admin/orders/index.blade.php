@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <h1>Orders</h1>
            <hr>
            @foreach($order as $ord)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach($ord->cart->items as $item)
                            <li class="list-group-item">
                                <img class="img-thumbnail border-0 p-0 rounded-0" style="width: 100px;" src="{{asset('storage/uploads/' .$item['item']['image']) }}">
                                <span class="badge">€ {{ $item['price'] }}</span>
                                {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                            </li>
                        @endforeach
                            <li class="list-group-item">
                                <td>Order Id: {{ $ord->id }}</td>
                            </li>
                            <li class="list-group-item">
                                <td>City: {{ $ord->city }}</td>
                                <td>Address: {{ $ord->address }}</td>
                            </li>
                            <li class="list-group-item">
                                <td>First name: {{ $ord->first_name }}</td>
                                    <td>Last name: {{ $ord->last_name }}</td>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: € {{ $ord->cart->totalPrice }}</strong>
                    </div>
                </div>                
                <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection