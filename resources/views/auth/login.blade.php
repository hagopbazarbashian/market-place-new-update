@extends('layouts.app')
@section('content')
<style>
@media only screen and (min-width: 320px) and (max-width: 767px){
  .show-password i{
       display:block !important;
    position: relative;
    top: -36px;
    left: 240px;
  }
  
}

.show-password i{
      display:none;
  }

</style>
<link rel="stylesheet" href="{{asset('/css/login.css')}}">
<div class="flex-div">
    <div class="name-content">
      <h1 class="logo"><img src="{{asset('/img/jack-pops-low-resolution-logo-color-on-transparent-background.png')}}" style="width: 40%;"></h1>
      <p style="font-weight: 700;">products from local and global merchants at Jack pops. Shop now for a hassle-free shopping experience.</p>
    </div>
      <form action="{{ route('login') }}" method="post">@csrf
        <input type="text" name="email" placeholder="Email"  class="@error('email') is-invalid @enderror"/>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <p style="font-size: 11px;">
                {{ $message }}
            </p>
        </span>
        @enderror
        <input type="password" name="password" placeholder="Password"  class="password" class="@error('password') is-invalid @enderror"/>
        <span class="show-password"><i id="s_show_hide" onclick="show();"class="far fa-eye"></i></span>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <p style="font-size: 11px;">
                {{ $message }}
            </p>
        </span>
        @enderror
        <button class="login">Log In</button>
        <a href="{{ route('password.request') }}">Forgot Password ?</a>
        <hr>
        <a href="/register" class="create-account nav-link">Create New Account</a>
        <br>
        <div class="social-menu">
            <ul>
                <li><a href="{{ url('login/google') }}" target="blank"><i class="fab fa-google"></i></i></a></li>
                <li><a href="{{ url('auth/facebook') }}"><i class="fab fa-facebook"></i></a></li>
            </ul>
        </div>
      </form>
  </div>
<script>
     function show()
                {
                 if ($(".password").attr("type")=="password") {
                 $(".password").attr("type", "text");
                 document.getElementById('s_show_hide');
                 }
                 else{
                 $(".password").attr("type", "password");
                 document.getElementById('s_show_hide');
                 }
}
</script>
@endsection
