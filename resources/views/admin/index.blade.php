@extends('layouts.admin')

@section('content')

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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $pro)
                    <tr>
                        <th scope="row">{{ $pro->id }}</th>
                        <td>{{ $pro->title }}</td>
                        <td>{{ $pro->description }}</td>
                        <td>€ {{ $pro->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User Id</th>
                        <th scope="col">User name</th>
                        <th scope="col">User email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection