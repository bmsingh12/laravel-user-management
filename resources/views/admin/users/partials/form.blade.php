@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
           aria-describedby="name"
           placeholder="Enter name" value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset">
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
           placeholder="Enter email" value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset">
    @error('email')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>
@isset($create)
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
    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
           id="password" placeholder="Password">
    @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>
@endisset
<div class="mb-3">
    @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]"
                   type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
                   @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label class="form-check-label" for="{{ $role->name }}">
                {{ $role->name }}
            </label>
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary">Confirm</button>
