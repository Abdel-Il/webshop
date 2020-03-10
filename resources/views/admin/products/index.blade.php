@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <a class="nav-link btn btn-success" href="{{ route('products.create', ['id' => Auth::id()]) }}">
                Product maken
            </a>
        </div>
    </div>
</div>

@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
       
@endif

<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product description</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $pro)
                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->title }}</td>
                        <td>{{ $pro->description }}</td>
                        <td>€ {{ $pro->price }}</td>
                        {{-- --}}
                        <td><a href="{{ route('products.edit',$pro->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $pro->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection