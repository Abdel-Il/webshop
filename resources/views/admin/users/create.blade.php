@extends('layouts.admin')

@section('content')

<form class="container form-horizontal" method="POST" action="{{ route('users.store') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">First name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="first_name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Last name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="last_name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 control-label col-form-label text-md-right">Email</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="email">
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-8">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <button type="submit" class="nav-link btn btn-success btn-block">Create</button>
            </div>
        </div>
    </div>
</form>

@endsection