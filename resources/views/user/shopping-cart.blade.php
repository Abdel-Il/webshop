@extends('layouts.app')

@section('content')
@if(Session::has('cart'))
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product actions</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            <div class="card" style="width: 18rem;">
                                <img class="img-thumbnail border-0 p-0 rounded-0" src="{{asset('storage/uploads/' .$product['item']['image']) }}">
                            </div>
                        </td>
                        <td>{{ $product['qty'] }}</td>
                        <td>{{ $product['item']['title'] }}</td>

                        <td class="label label-success">€ {{ $product['price'] }}</td>
                        <td><a class="btn btn-primary" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></td>
                        <td><a class="btn btn-primary" href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Remove</a></td>
                    <tr>

                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: € {{ $totalPrice }}</strong>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <a href="{{ url('checkout') }}" type="button" class="btn btn-success">Checkout</a>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
</div>
@endif
@endsection