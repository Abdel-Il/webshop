@extends('layouts.admin')

@section('content')

<form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Category name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="name">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">
                    Create
                </button>
            </div>
        </div>
    </div>
</form>

@endsection