@extends('layouts.master')
@section('title','Home')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 362px;
            position: relative;
            left: 466px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container .remember-me {
            display: flex;
            align-items: center;
            position: relative;
            left: -115px;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        /*.login-container .remember-me .labelme {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }*/

        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        @if (session()->has('message'))
        <h6>{{ session()->get('message')  }}</h6>
        @endif
        <form action="{{ route('do.login') }}" method="post">
            @csrf
            <label for="floatingInput">Email Address</label>
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
            
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            
            <div class="remember-me">
                <!--<div class="labelme">-->
                <input type="checkbox" id="rememberPasswordCheck" name="remember">
                <label for="rememberPasswordCheck">Remember Me</label>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

@endsection