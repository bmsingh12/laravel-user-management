@extends('templates.main')

@section('content')
    <h1>Password Reset</h1>
    <form method="POST" action="{{ url('reset-password') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->token }}">
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                   aria-describedby="email"
                   placeholder="Enter email" value="{{ $request->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirm</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"
                   placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
