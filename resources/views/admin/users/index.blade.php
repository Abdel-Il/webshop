@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <a class="nav-link btn btn-success" href="{{ route('users.create', ['id' => Auth::id()]) }}">
                User maken
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
                        <th scope="col">User Id</th>
                        <th scope="col">User First name</th>
                        <th scope="col">User Last name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">User Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        @if(!$user->isAdmin)
                            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection