<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="trustpilot-one-time-domain-verification-id" content="f346e6e6-7c32-41a7-a245-e7d5acb7e809"/>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3219614958849945" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jack Pops</title> 
    <meta name="description" content="jackpops.jack-pops.com.marketplace.marketplacejackpops.jack">
    <meta name="google-site-verification" content="PqcsuwSKL3bHAXlro4HuGkrVhfvFSRDwq8Bi2krfaOM" />
    <meta name="robots" content="index,follow">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('/css/index-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/message.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Favicon -->
    <!--<meta property="og:title" content="Jack Pops" />-->
    <!--<meta property="og:description" content="Buy or sell new and used items easily on Jack pops Marketplace, locally or from businesses. Find great deals on new items shipped from stores to your door." />-->
    <!--<meta property="og:image" content="" />-->
    <meta property="og:title" content="Jack pops">
    <meta property="og:site_name" content="Jack pops">
    <meta property="og:url" content=https://jack-pops.com/>
    <meta property="og:description" content="products from local and global merchants at Jack pops. Shop now for a hassle-free shopping experience.">
    <meta property="og:type" content=website>
    <meta property="og:image" content=/logo/video_image-TJEDHC6qV2.jpeg>
    <link rel="apple-touch-icon" sizes="180x180" href="img/jack-pops-low-resolution-logo-color-on-transparent-background.ico">
    <link rel="icon" type="image/png" href="img/jack-pops-low-resolution-logo-color-on-transparent-background.ico" sizes="512x512">
    <link rel="icon" type="image/png" href="img/jack-pops-low-resolution-logo-color-on-transparent-background.ico" sizes="16x16">
    <link rel="apple-touch-icon" sizes="32x32" href="img/jack-pops-low-resolution-logo-color-on-transparent-background.ico">
    <link rel="apple-touch-icon" sizes="192x192" href="img/jack-pops-low-resolution-logo-color-on-transparent-background.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
     <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
     <link rel="stylesheet" href="/css/categor.css">
    @vite(['resources/js/app.js'])
    <!-- Google tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LDSSCPMP3Q">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-LDSSCPMP3Q');
    </script>
<style>
    .navbar>.container, .navbar>.container-fluid, .navbar>.container-sm, .navbar>.container-md, .navbar>.container-lg, .navbar>.container-xl, .navbar>.container-xxl{
        text-align: center;
    }
.btn--promo {
  color: #dff9fb;
  background-color: #130f40;
  border-radius: 50px;
  margin: 19px 15px 0px 0px;
}

.btn--promo:after {
  content: 'New';
  display: inline-block;
  font-size: 1rem;
  color: #130f40;
  background-color: #f0932b;
  border-radius: 25px;
  padding: 5px;
  position: absolute;
  margin-top: -30px; 
  margin-left: -55px; 
}

.favorite-list i{
    margin: 15px 0 0 0;
    font-size: 26px;
    color: #d9d964;
}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/jack-pops-low-resolution-logo-white-on-transparent-background.png" style="width: 200px;">
                    {{-- Jack pop --}}
                </a>
                            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        <div>
                           <a href="/ads/create" class="btn btn--promo">Post an Ad</a>
                        </div>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif 

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            
                        @else  
                            <li class="nav-item "><a href="{{route('show-favorit-list',auth()->user()->id)}}" class="nav-list favorite-list" title="favorite list"><i class="fa-regular fa-heart"></i></a></li>
                            <!--<script>-->
                            <!--    var tooltip = document.createElement("div");-->
                            <!--    tooltip.innerHTML = "click and show your favorite list";-->
                            <!--    tooltip.style.position = "fixed";-->
                            <!--    tooltip.style.top = "55px";-->
                            <!--    tooltip.style.right = "40px";-->
                            <!--    tooltip.style.backgroundColor = "#ff8585";-->
                            <!--    tooltip.style.padding = "10px";-->
                                
                               
                            <!--    document.body.appendChild(tooltip);-->
                                
                                
                            <!--    tooltip.addEventListener("click", function() {-->
                            <!--      this.style.display = "none";-->
                            <!--    });-->
                            <!--    $(function() {-->
                            <!--    $(window).scroll(function() {-->
                            <!--        tooltip.style.display = "none";-->
                            <!--    });-->
                            <!--});-->
                            <!--    </script>-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- {{ Auth::user()->name }} --}}
                                    @if (auth()->user()->avatar)
                                        <img src="{{Storage::url(auth()->user()->avatar)}}" width="40" height="40" class="rounded-circle">
                                    @else
                                       <img src="{{asset('/img/man.jpg')}}" width="40" height="40" class="rounded-circle">
                                    @endif
                                    
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->isadmin==1)
                                    <a class="dropdown-item" href="{{ url('auth') }}">
                                        Dashboard
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ url('/ads') }}">
                                        Ads
                                    </a>
                                    <a class="dropdown-item" href="/chatify">
                                       Messages
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> 

        {{-- Second Nav bar --}}

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  navbar-hover" id="showhideprevnext1">
            <a class="navbar-brand" href="#"></a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
                aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <a href="/ads/create" class="navbar-toggler animated-button1" class="navbar-toggler" 
            aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                 Post an Ad
              </a>
              
            <div class="collapse navbar-collapse" id="navbarHover">

                <ul class="container-fluid navbar-nav my-nav forscroll"  id="slider-i" >

                    @foreach($menus as $menuItem)  
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark scrollmenu sp" href="{{route('category.show',$menuItem->id)}}"
                                data-toggle="dropdown_remove_dropdown_class_for_clickable_link" arial-haspopup="true"
                                arial-expanded="false" >
                               {{$menuItem->name}}
                        </a>
                            <ul class="dropdown-menu">
                              @foreach ($menuItem->subcategories as $subMenuItem)
                                <li>
                                <a class="dropdown-item dropdown-toggle" href="{{route('subcategory.show',$subMenuItem->slug)}}">
                                    {{ $subMenuItem->name }}
                                </a>
                                    <ul class="dropdown-menu"> 
                                     @foreach ($subMenuItem->childcategories as $childMenu)  
                                        <li>
                                            <a class="dropdown-item" href="{{route('childcategory.show',[$subMenuItem->slug,$childMenu->slug])}}">{{ $childMenu->name }}</a>
                                        </li>

                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
            </div>
        </nav>  
         <section class="categories">
                <div id="scroll" class="SearchCategoriesBar">
                <div class="categoriesWrapper">
                    <ul class="categoriesContainer">
                    @foreach($menus as $menuItem) 
                    <li class="category">
                        <a href="{{route('category.show',$menuItem->id)}}" class="">
                        <div class="img-container">
                        <div class="image first" style="width: 100%;">
                        <span class="overlay"></span>
                        <p>{{$menuItem->name}}</p>
                        </div>
                        </a>
                    </li>
                    @endforeach
                    </ul>
                </div>
                </div>
                <!--<div class="rvlqplr-placement-7ff8ce69-5ec5-4bea-a0b8-4c56109d6faf"></div>-->
            </section>

        <main class="py-4">
            @yield('content')
        </main>
         @include('footer')
    </div>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/create-advertisement.js') }}"></script>
    <script src="{{ asset('js/send-message.js') }}"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
    <script src="{{ asset('js/postcomment.js') }}"></script>
    <script src="{{ asset('js/category.js') }}"></script>
    <script src="{{ asset('js/Favoritelist.js') }}"></script>
    <script src="{{ asset('js/index-unde-menu.js') }}"></script>
</body>

</html> 