<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MovieHub - Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 50% 35%, rgba(130, 0, 0, .22), transparent 35%),
                linear-gradient(135deg, #050505, #100000, #050505);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.85)),
                url("https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&w=2000&q=80")
                center / cover;
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle, transparent 20%, #000 90%);
            z-index: -1;
        }

        .login-container {
            width: 420px;
            max-width: 92%;
            padding: 40px;
            background: rgba(12, 12, 12, .88);
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 16px;
            box-shadow:
                0 25px 80px rgba(0,0,0,.8),
                0 0 35px rgba(229,9,20,.12);
            backdrop-filter: blur(12px);
            animation: appear .7s ease;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(25px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .logo {
            text-align: center;
            font-size: 32px;
            font-weight: 900;
            letter-spacing: 3px;
            margin-bottom: 8px;
        }

        .logo span {
            color: #e50914;
        }

        .subtitle {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .title {
            font-size: 25px;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #bbb;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            background: #181818;
            color: white;
            border: 1px solid #333;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
            transition: .25s;
        }

        .form-group input:focus {
            border-color: #e50914;
            box-shadow: 0 0 0 3px rgba(229,9,20,.08);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #999;
            font-size: 13px;
            margin: 15px 0 22px;
        }

        .remember input {
            accent-color: #e50914;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #e50914;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: .25s;
        }

        .login-btn:hover {
            background: #b20710;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(229,9,20,.2);
        }

        .forgot {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #999;
            text-decoration: none;
            font-size: 13px;
        }

        .forgot:hover {
            color: #e50914;
        }

        .register-text {
            text-align: center;
            margin-top: 27px;
            padding-top: 22px;
            border-top: 1px solid #252525;
            color: #888;
            font-size: 14px;
        }

        .register-text a {
            color: #e50914;
            text-decoration: none;
            font-weight: bold;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .errors {
            background: rgba(229, 9, 20, .1);
            border: 1px solid rgba(229, 9, 20, .35);
            color: #ff7373;
            border-radius: 7px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 30px 23px;
            }

            .logo {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="logo">
        MOVIE<span>HUB</span>
    </div>

    <p class="subtitle">
        Your cinematic world awaits
    </p>

    <h1 class="title">
        Welcome Back
    </h1>


    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="form-group">
            <label for="email">
                Email Address
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email"
            >
        </div>


        <div class="form-group">
            <label for="password">
                Password
            </label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
            >
        </div>


        <label class="remember">
            <input
                type="checkbox"
                name="remember"
            >

            Remember me
        </label>


        <button type="submit" class="login-btn">
            LOGIN TO MOVIEHUB
        </button>


        @if (Route::has('password.request'))
            <a
                href="{{ route('password.request') }}"
                class="forgot"
            >
                Forgot your password?
            </a>
        @endif

    </form>


    @if (Route::has('register'))

        <div class="register-text">
            Don't have an account?
            <a href="{{ route('register') }}">
                Create Account
            </a>
        </div>

    @endif

</div>

</body>
</html>