<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="box-info">
            <h1>LOGIN</h1>
            <div class="name-pass">
                <div class="box-inp">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username or email" name="username" id="username">
                </div>
                <div class="box-inp">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password">
                </div>
            </div>
            <div class="box-remem">
                <input type="checkbox">
                <p>Remember me</p>      
            </div>
            <div class="noti-fail"></div>
            <button class="login">Login</button>
            <p class="or-lgin">Or login with</p>
            <div class="box-more">
                <div class="info">
                    <img src="/img/fb.jpg" alt="">
                    <p>Facebook</p>
                </div>
                <div class="info">
                    <img src="/img/gg.webp" alt="">
                    <p>Google</p>
                </div>
            </div>
            <p class="signup">Not a member? <u><a href="{{ url('http://127.0.0.1:8000/signup') }}">Sign up now</a></u></p>
        </div>
    </div>
    <script type="module" src="/js/login.js"></script>
</body>

</html>