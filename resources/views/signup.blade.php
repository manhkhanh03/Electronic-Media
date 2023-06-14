@extends('pattern')

@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="/css/style.css">
@endpush

@push('login')
    <div class="container">
        <div class="box-info">
            <h1>SIGN UP</h1>
            <div class="name-pass">
                <div class="box-inp">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="name">
                </div>
                <div class="box-inp">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" id="email">
                </div>
                <div class="box-inp">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="box-inp">
                    <i class="fa-solid fa-rotate-left"></i>
                    <input type="password" placeholder="Confirm password" name="password" id="repeat">
                </div>
            </div>
            <div class="box-remem">
                <input type="checkbox">
                <p>Remember me</p>
            </div>
            <div class="noti-fail"></div>
            <button class="login" id="sign-up">Sign up</button>
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
            <p class="signup">Already have an account? <u><a href="{{ url('http://127.0.0.1:8000/index/login') }}">Login now</a></u></p>
        </div> 
    </div>
@endpush

@section('menu-nav-body')
@endsection

@section('footer')
@endsection

@section('codejs')
@endsection

@push('js')
    <script src="/js/signup.js"></script>
@endpush