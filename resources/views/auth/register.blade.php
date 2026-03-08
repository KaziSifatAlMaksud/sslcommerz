<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div style="width:400px;margin:80px auto;font-family:Arial;">

    <h2 style="text-align:center;">Register</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div style="color:red;margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div style="margin-bottom:15px;">
            <label>Name</label><br>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                autofocus
                style="width:100%;padding:8px;">
        </div>

        <!-- Email -->
        <div style="margin-bottom:15px;">
            <label>Email</label><br>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required
                style="width:100%;padding:8px;">
        </div>

        <!-- Password -->
        <div style="margin-bottom:15px;">
            <label>Password</label><br>
            <input 
                type="password" 
                name="password" 
                required
                style="width:100%;padding:8px;">
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom:15px;">
            <label>Confirm Password</label><br>
            <input 
                type="password" 
                name="password_confirmation" 
                required
                style="width:100%;padding:8px;">
        </div>

        <div style="margin-bottom:15px;">
            <a href="{{ route('login') }}">Already registered?</a>
        </div>

        <button type="submit" style="padding:10px 20px;">
            Register
        </button>

    </form>

</div>

</body>
</html>