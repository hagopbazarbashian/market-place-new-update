@extends('layouts.app')
@section('content')
<style>
    .love{
         /* display: revert; */
        position: relative;
        /* color:orange; */
        top: -153px;
        /* left: 15px; */
        right: 11px;
        /* float: left; */
        float: right;
        font-size: 10;
        font-size: 17px;
}
</style>
<link rel="stylesheet" href="{{asset('/css/image.css')}}">
<link rel="stylesheet" href="{{asset('/css/swipper.css')}}">
<link rel="stylesheet" href="{{asset('/css/category.css')}}">
{{-- Controller User menu with Check in --}}
@if(Auth::check())
<div class="menu">
    <nav class="menu__nav"> 
      <ul class="menu__list r-list">
        <li class="menu__group">
          <a href="{{ route('manage-business-pages') }}" class="menu__link r-link">Manage Business Pages</a>
        </li>
        <li class="menu__group">
          <a href="#0" class="menu__link r-link">Post an Ad</a>
        </li>
        <li class="menu__group">
          <a href="#0" class="menu__link r-link">Favorit List</a>
        </li>
        <li class="menu__group">
          <a href="#0" class="menu__link r-link">Manage your ad</a>
        </li>
      </ul>
    </nav>
    <button class="menu__toggle r-button" type="button">
      <span class="menu__hamburger m-hamburger">
        <span class="m-hamburger__label">
          <span class="menu__toggle-hint screen-reader">Open menu</span>
        </span>
      </span>
    </button>
  </div>
@endif
{{-- Controller User menu with Check in --}}
<div class="slder" style="margin-top: -25px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('/img/47.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/44.png') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/45.png') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/baner3.png') }}" alt="Third slide">
            </div>
             <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/baner6.png') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/baner10.png') }}" alt="Third slide">
            </div>
            <!--<div class="carousel-item">-->
            <!--    <img class="d-block w-100" src="{{ asset('img/baner-21.png') }}" alt="Third slide">-->
            <!--</div>-->
        </div>  
    </div>
</div>
<div class="container mt-5">
    <h1><a href="#" class="effect-shine">category</a></h1>
        <section class="image-slider-container">
        <div class="swiper">
            <div class="swiper-wrapper">
            @foreach ($categories as $category)
                <div class="swiper-slide">
                    <div class="slide-con">
                        <a href="{{ route('category.show', $category->id) }}">
                        <img src="{{ Storage::url($category->image) }}"alt="">
                        </a>
                         <a href="{{ route('category.show', $category->id) }}">
                           <div class="slide-details">
                            <div class="movie-info">
                                    <h2 class="movie-name" title="">
                                        {{ $category->name }}
                                    </h2>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    {{-- For Business Pages --}}
    <div class="featured">
      <div class="c">
          <div class="u">
              <a href="{{route('business-page')}}">Business Pages</a>
              <div class="c">
                  @foreach ($businesspage as $businesspages)
                  <a href="">
                      <img src="/logobusines/{{$businesspages->logobusiness}}" />
                      <div class="r">
                          <div class="stars" style="--size: 16px; --rating: 49; --ratingfloor: 4;"></div>
                      </div>
                  </a>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
  {{-- For Business Pages --}}
    <span>
        <h1><a href="category/9" class="effect-shine">Car</a></h1>
    </span>  
    <br>
    <section>
        <div class="swiper">
          <div class="swiper-wrapper">
              @if($cars->count())
              @foreach ($cars as $car)
                <div class="swiper-slide swiper-slide--one">
                  <div>
                    <p>
                        <a href="{{route('category.show',[$car->category_id])}}"><img class="img-thumbnail forelecc" src="/images/{{$car->img->name}}" alt="First slide"></a>
                    </p>
                  </div>
                </div>   
             @endforeach
             @endif
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </section>

      <span>
        <h1><a href="{{route('category.show',$categoryelectronic->id)}}" class="effect-shine">Electronics</a></h1>
    </span>  
    <br>
    <section>
        <div class="swiper">
          <div class="swiper-wrapper">
              @if($electronics->count())
              @foreach ($electronics as $electronic)
                <div class="swiper-slide swiper-slide--one">
                  <div>
                    <p>
                        <a href="category/7"><img class="img-thumbnail forelecc" src="/images/{{$electronic->img->name}}" alt="First slide"></a>
                    </p>
                  </div>
                </div>   
             @endforeach
             @endif
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </section>
</div>

<div class="container mt-5">
    <span>
        <h1><a href="#" class="effect-shine">Show All Ad</a> 
          <div class="item button-jittery" style="margin: -35px 0 0 220px;">
            <i class="fa-solid fa-magnifying-glass-location" style="color:#dc3545;font-size: 43px;" data-toggle="modal" data-target="#exampleModalCenter"></i>
          </div>
        </h1>
    </span>
     <div class="ff">
        @foreach ($aa as $advertisement)
        <div class="t">
            <div class="image">
              <a href="{{ route('product.view', [$advertisement->id, $advertisement->slug]) }}" class="nav-link">
               <img src="/images/{{$advertisement->img->name}}"  alt="Denim Jeans" style="width:100%; background-size: cover;">
              </a>
              @if($advertisement->urgent == 1)
               <span class="lbl lbl1">Urgent</span>
              @else
              @endif
              @if (Auth()->check())
              <i class="fa-regular fa-heart love ad js-click"  data-value="{{ $advertisement->id }}"></i>
              @endif
            </div>
            <div>
                 @if ($advertisement->star_rating == 1)
                 <div class="p">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              @endif
              @if ($advertisement->star_rating == 2)
                 <div class="p">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              @endif
              @if ($advertisement->star_rating == 3)
                 <div class="p">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              @endif
              @if ($advertisement->star_rating == 4)
              <div class="p">
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star"></span>
             </div>
             @endif
             @if ($advertisement->star_rating == 5)
              <div class="p">
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
             </div>
             @endif
             
            <a class="nav-link" href="{{ route('product.view', [$advertisement->id, $advertisement->slug]) }}">
              <div class="p">{{ $advertisement->price }}{{ $advertisement->CurrencySymbol->symbol}}</div>
              <div class="b">{{ $advertisement->name }}</div>
              <div class="d">{!! $advertisement->description !!}</div>
            </a>
            </div>
        </div>
        @endforeach
    </div> 
    {{ $aa->links() }}

<!-- Modal location -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form  action="{{route('find-with-country')}}" method="post">
        @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Search Ad in your locations</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center">
            <label for="file" class="mt-2"><b>Choose country</b></label>
            <div class="form-inline form-group mt-1">
                <div class="d-flex justify-content-between" style="justify-content: space-around !important;">
                    <div class="col-md-4">
                        <div class="form-group"></div>
                        <select class="form-control" name="country_id" required>
                            <option value=""> Select country</option>
                            @foreach ($countrys as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
   </form>
  </div>

</div>

<script>
  var swiper = new Swiper(".swiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: true
  },
  spaceBetween: 60,
  loop: true,
  pagination: {
    el: ".swiper-pagination"
  }
});
</script>
<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3219614958849945"-->
<!--     crossorigin="anonymous"></script>-->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-format="fluid"-->
<!--     data-ad-layout-key="+s+sa-l-64+d2"-->
<!--     data-ad-client="ca-pub-3219614958849945"-->
<!--     data-ad-slot="2671806898"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<script>
  $( document ).ready(function() {
  $( ".js-click" ).click(function() {
    let current_color =
        $(this).css('color', 'red');
  });
});
</script>
@if(!Auth::check())
<script>
// 	window.SGPMPopupLoader=window.SGPMPopupLoader||{ids:[],popups:{},call:function(w,d,s,l,id){
// 		w['sgp']=w['sgp']||function(){(w['sgp'].q=w['sgp'].q||[]).push(arguments[0]);}; 
// 		var sg1=d.createElement(s),sg0=d.getElementsByTagName(s)[0];
// 		if(SGPMPopupLoader && SGPMPopupLoader.ids && SGPMPopupLoader.ids.length > 0){SGPMPopupLoader.ids.push(id); return;}
// 		SGPMPopupLoader.ids.push(id);
// 		sg1.onload = function(){SGPMPopup.openSGPMPopup();}; sg1.async=true; sg1.src=l;
// 		sg0.parentNode.insertBefore(sg1,sg0);
// 		return {};
// 	}};
// 	SGPMPopupLoader.call(window,document,'script','https://popupmaker.com/assets/lib/SGPMPopup.min.js','40156577ac7c');


	// window.SGPMPopupLoader=window.SGPMPopupLoader||{ids:[],popups:{},call:function(w,d,s,l,id){
	// 	w['sgp']=w['sgp']||function(){(w['sgp'].q=w['sgp'].q||[]).push(arguments[0]);}; 
	// 	var sg1=d.createElement(s),sg0=d.getElementsByTagName(s)[0];
	// 	if(SGPMPopupLoader && SGPMPopupLoader.ids && SGPMPopupLoader.ids.length > 0){SGPMPopupLoader.ids.push(id); return;}
	// 	SGPMPopupLoader.ids.push(id);
	// 	sg1.onload = function(){SGPMPopup.openSGPMPopup();}; sg1.async=true; sg1.src=l;
	// 	sg0.parentNode.insertBefore(sg1,sg0);
	// 	return {};
	// }};
	// SGPMPopupLoader.call(window,document,'script','https://popupmaker.com/assets/lib/SGPMPopup.min.js','a0f5e0a6b955');
</script>
@endif

{{-- @if(Auth::check())
<script>
	window.SGPMPopupLoader=window.SGPMPopupLoader||{ids:[],popups:{},call:function(w,d,s,l,id){
		w['sgp']=w['sgp']||function(){(w['sgp'].q=w['sgp'].q||[]).push(arguments[0]);}; 
		var sg1=d.createElement(s),sg0=d.getElementsByTagName(s)[0];
		if(SGPMPopupLoader && SGPMPopupLoader.ids && SGPMPopupLoader.ids.length > 0){SGPMPopupLoader.ids.push(id); return;}
		SGPMPopupLoader.ids.push(id);
		sg1.onload = function(){SGPMPopup.openSGPMPopup();}; sg1.async=true; sg1.src=l;
		sg0.parentNode.insertBefore(sg1,sg0);
		return {};
	}};
	SGPMPopupLoader.call(window,document,'script','https://popupmaker.com/assets/lib/SGPMPopup.min.js','e2ae47f1d3cf');
</script>
@endif --}}
@endsection
