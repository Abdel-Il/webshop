@extends('layouts.admin')

@section('content')

<form method="post" action="{{ route('categories.update', $categories->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Category:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="name" value={{ $categories->name }} />
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">Edit</button>
            </div>
        </div>
    </div>
</form>

@endsection