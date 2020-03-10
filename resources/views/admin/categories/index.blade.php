@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <a class="nav-link btn btn-success" href="{{ route('categories.create', ['id' => Auth::id()]) }}">
                Category maken
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
                        <th scope="col">Category Id</th>
                        <th scope="col">Category name</th>
                        <th scope="col">Category action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)

                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>

                        {{-- --}}
                        <td><a href="{{ route('categories.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $cat->id)}}" method="post">
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