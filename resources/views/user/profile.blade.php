@extends('templates.main')

@section('content')
    <h1>Update Profile</h1>
    <form method="POST" action="{{ route('user-profile-information.update') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   aria-describedby="name"
                   placeholder="Enter name" value="{{ auth()->user()->name }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                   aria-describedby="email"
                   placeholder="Enter email" value="{{ auth()->user()->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
