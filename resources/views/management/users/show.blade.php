@extends('layouts.management')

@section('title')
    User - @foreach($users as $user) {{ $user->name }} @endforeach
@endsection

@section('content')

    <h3 class="m-3">
        @foreach($users as $user) {{ $user->name }} @endforeach
        <small class="text-muted">User</small>
    </h3>

    <div class="mx-3">
        @foreach($users as $user)
        <table class="table">
            <tbody>
            <tr>
                <th scope="row">Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th scope="row">Verified at</th>
                <td>{{ $user->email_verified_at }}</td>
            </tr>
            <tr>
                <th scope="row">Created at</th>
                <td>{{ $user->created_at }}</td>
            </tr>
            <tr>
                <th scope="row">Updated at</th>
                <td>{{ $user->updated_at }}</td>
            </tr>
            </tbody>
        </table>
        @endforeach

        <a href="{{ action('Management\UserController@index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <br>

@endsection