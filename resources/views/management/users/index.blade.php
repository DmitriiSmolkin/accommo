@extends('layouts.management')

@section('title')
    Users
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mx-2 mb-0" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible fade show mt-2 mx-2 mb-0" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col p-0 d-flex align-self-center">
                <h3 class="m-3">
                    Users
                    <small class="text-muted">Пользователи</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $users->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-center">Verified At</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Updated At</th>
                <th scope="col" class="text-center"><a href="{{ action('Management\UserController@create') }}" class="btn btn-sm btn-outline-secondary">Create a new user</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row" class="align-middle">{{ $user->id }}</th>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle"><a href="mailto:{{ $user->email }}" target="_blank">{{ $user->email }}</a></td>
                    <td class="text-center align-middle">@if(empty($user->email_verified_at)) Not verified yet @else {{ $user->email_verified_at->format('d.m.Y H:d:i') }} @endif</td>
                    <td class="text-center align-middle">{{ $user->created_at->format('d.m.Y H:d:i') }}</td>
                    <td class="text-center align-middle">{{ $user->updated_at->format('d.m.Y H:d:i') }}</td>
                    <td class="text-center align-middle">
                        <form action="{{ action('Management\UserController@destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\UserController@show', $user->id) }}" class="btn btn-secondary"><i class="fas fa-book-open"></i></a>
                                <a href="{{ action('Management\UserController@edit', $user->id) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-secondary"><i class="fas fa-times"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection