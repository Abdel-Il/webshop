@extends('layouts.admin')

@section('content')

<form method="post" action="{{ route('products.update', $products->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Product:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="title" value={{ $products->title }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Product description:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="description" value={{ $products->description }} />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Product price:</label>
        <div class="col-md-8">
            <input type="number" step="0.01" class="form-control" name="price" value={{ $products->price }} />
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">
                    Edit
                </button>
            </div>
        </div>
    </div>
</form>

@endsection