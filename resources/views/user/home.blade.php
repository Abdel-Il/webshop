@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome</h1>
    <h4>Get your wallpapers</h4>
    {{-- <select id="select-cat"> --}}
      {{-- <option>All</option> --}}
      <a class="btn btn-dark" href="{{ route('home')}}">All</a>
      @foreach ($category as $cat)
        <a class="btn btn-dark" href="{{ route('home.search.tag', $cat->id) }}">{{ $cat->name }}</a>
      @endforeach
    {{-- </select> --}}
    <div class="row m-0">
      @include('partials.card')
  </div>
</div>

@endsection
