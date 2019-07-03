@extends('layouts.management')

@section('title')
    Create a new user
@endsection

@section('content')

    <h3 class="m-3">
        Create a new user
        <small class="text-muted">Добавить пользователя</small>
    </h3>

    <form action="{{ action('Management\UserController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ action('Management\UserController@index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection