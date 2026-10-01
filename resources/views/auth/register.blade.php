<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MovieHub - Register</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #050505;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
            padding: 30px 0;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                linear-gradient(rgba(0,0,0,.72), rgba(0,0,0,.88)),
                url("https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&w=2000&q=80")
                center / cover;
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle, transparent 15%, #000 90%);
            z-index: -1;
        }

        .register-container {
            width: 450px;
            max-width: 92%;
            padding: 38px 40px;
            background: rgba(12,12,12,.9);
            border: 1px solid rgba(255,255,255,.12);
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
            font-size: 31px;
            font-weight: 900;
            letter-spacing: 3px;
            margin-bottom: 7px;
        }

        .logo span {
            color: #e50914;
        }

        .subtitle {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            color: #bbb;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
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

        .register-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #e50914;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 7px;
            transition: .25s;
        }

        .register-btn:hover {
            background: #b20710;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(229,9,20,.2);
        }

        .login-text {
            text-align: center;
            margin-top: 25px;
            padding-top: 21px;
            border-top: 1px solid #252525;
            color: #888;
            font-size: 14px;
        }

        .login-text a {
            color: #e50914;
            text-decoration: none;
            font-weight: bold;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        .errors {
            background: rgba(229,9,20,.1);
            border: 1px solid rgba(229,9,20,.35);
            color: #ff7373;
            border-radius: 7px;
            padding: 12px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        @media (max-width: 500px) {
            .register-container {
                padding: 30px 23px;
            }

            .logo {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<div class="register-container">

    <div class="logo">
        MOVIE<span>HUB</span>
    </div>

    <p class="subtitle">
        Start your cinematic journey
    </p>

    <h1 class="title">
        Create Your Account
    </h1>


    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    <form method="POST" action="{{ route('register') }}">

        @csrf

        <div class="form-group">
            <label for="name">
                Name
            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Enter your name"
            >
        </div>


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
                autocomplete="new-password"
                placeholder="Create a password"
            >
        </div>


        <div class="form-group">
            <label for="password_confirmation">
                Confirm Password
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirm your password"
            >
        </div>


        <button type="submit" class="register-btn">
            CREATE MOVIEHUB ACCOUNT
        </button>

    </form>


    <div class="login-text">
        Already have an account?
        <a href="{{ route('login') }}">
            Login
        </a>
    </div>

</div>

</body>
</html>