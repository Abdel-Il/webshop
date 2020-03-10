@extends('layouts.admin')

@section('content')

<form class="container form-horizontal" method="post" action="{{ route('users.update', $user->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group row">
        <label for="first_name" class="col-md-2 col-form-label text-md-right">First name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="first_name" value={{ $user->first_name }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-md-2 col-form-label text-md-right">Last name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} />
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="email" value={{ $user->email }} />
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">Update</button>
            </div>
        </div>
    </div>
</form>

@endsection