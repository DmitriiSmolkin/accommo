@extends('layouts.management')

@section('title')
    Edit user
@endsection

@section('content')

    <h3 class="m-3">
        Edit user
        <small class="text-muted">Редактировать пользователя</small>
    </h3>

    @foreach($users as $user)
        <form action="{{ action('Management\UserController@update', $user->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ $user->name }}" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ $user->email }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="••••••••">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <a href="{{ action('Management\UserController@index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection
