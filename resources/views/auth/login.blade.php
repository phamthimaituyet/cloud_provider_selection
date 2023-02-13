@extends('auth.index')

@section('title', 'Login')

@section('content')
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('login.form') }}" method="post">
        @csrf
        <h2>Log In</h2>
        <p>
            <label for="email" class="floatLabel">Email</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" type="text" value="{{ old('email') }}">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @endif
        </p>
        <p>
            <label for="password" class="floatLabel">Password</label>
            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" type="password" value="{{ old('password') }}">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @endif
        </p>
        <div>
            <button type="submit" class="btn btn-primary btn-block button_acc">Sign in</button>
        </div>
    </form>
    <div class="form_sign_up">
        <h2 style="text-align: center;">Don't have an Account?</h2>
        <button type="button" class="btn btn-outline-secondary mt-3" style="width: 420px;">
            <a href="{{ route('register.form') }}" style="text-decoration: none; color: black; font-size: 1.5rem;">Create
                account</a>
        </button>
    </div>
@endsection
