<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="3;url=/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            background: #000;
            color: white;
            font-family: Arial, sans-serif;
        }

        .intro {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background:
                radial-gradient(circle at center,
                #350000 0%,
                #090000 40%,
                #000 80%);
        }

        .glow {
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: rgba(220, 0, 0, .18);
            filter: blur(100px);
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from {
                transform: scale(.7);
                opacity: .3;
            }

            to {
                transform: scale(1.2);
                opacity: .8;
            }
        }

        .content {
            position: relative;
            z-index: 5;
            text-align: center;
            animation: appear 1.2s ease;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: scale(.7);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .access {
            color: #e50914;
            font-size: 13px;
            letter-spacing: 6px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        h1 {
            font-size: clamp(55px, 10vw, 110px);
            letter-spacing: 5px;
            text-shadow:
                0 0 10px red,
                0 0 35px rgba(255,0,0,.7);
        }

        h1 span {
            color: #e50914;
        }

        .welcome {
            color: #aaa;
            margin-top: 25px;
            letter-spacing: 3px;
            font-size: 14px;
        }

        .loader {
            width: 230px;
            height: 2px;
            background: #222;
            margin: 35px auto;
            overflow: hidden;
        }

        .loader::after {
            content: "";
            display: block;
            width: 40%;
            height: 100%;
            background: #e50914;
            box-shadow: 0 0 15px red;
            animation: load 2.5s linear forwards;
        }

        @keyframes load {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(350%);
            }
        }

        .vignette {
            position: absolute;
            inset: 0;
            background: radial-gradient(
                circle,
                transparent 30%,
                rgba(0,0,0,.7) 80%,
                #000
            );
            pointer-events: none;
        }
    </style>
</head>

<body>

<div class="intro">

    <div class="glow"></div>

    <div class="content">

        <div class="access">
            ACCESS GRANTED
        </div>

        <h1>
            MOVIE<span>HUB</span>
        </h1>

        <div class="welcome">
            Welcome back. Your movie world awaits.
        </div>

        <div class="loader"></div>

    </div>

    <div class="vignette"></div>

</div>



</body>
</html>