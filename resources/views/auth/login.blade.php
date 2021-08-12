@extends('layouts.master')

@section('content')

    <div class="container">
        <form action="/login" method="post">
            @csrf

            <div class="form-group">
                Email
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                Password
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>

            <button class="btn btn-primary">Login</button>
        </form>
    </div>

@endsection
