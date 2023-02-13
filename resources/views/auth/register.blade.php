@extends('auth.index')

@section('title', 'Register')

@section('content')
    @if (session('alerts'))
        <div class="alert alert-danger">
            {{ session('alerts') }}
        </div>
    @endif
    <form action="{{ route('register.form') }}" method="post">
        @csrf
        <h2>Create Your Account</h2>
        <p>
            <label for="name" class="floatLabel">Name</label>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" type="text">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @endif
        </p>
        <p>
            <label for="email" class="floatLabel">Email</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" type="text">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @endif
        </p>
        <p>
            <label for="password" class="floatLabel">Password</label>
            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" type="password">
            <span>Enter a password longer than 8 characters</span>
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @endif
        </p>
        <p>
            <label for="confirm_password" class="floatLabel">Confirm Password</label>
            <input id="confirm_password" name="confirm_password" type="password">
            <span>Your passwords do not match</span>
        </p>
        <div>
            <button type="submit" class="btn btn-primary btn-block button_acc">Create My Account</button>
        </div>
        <div class="acc_ed">
            <a href="{{ route('login.form') }}" style="text-decoration: none; color: #ce2525e8;">Sign in</a>
        </div>
    </form>
@endsection
