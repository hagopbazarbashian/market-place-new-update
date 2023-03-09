@extends('layouts.app')
@section('content')
<style>
    .show-text{
        text-overflow:ellipsis;
        white-space:nowrap;
        overflow:hidden;
    }
    
@media only screen and (min-width: 320px) and (max-width: 767px){
    .image{
        width: 160px;
        height: 160px;
        overflow: hidden;  
    }
    
}

.image{
        overflow: hidden;
    }
</style>
<link rel="stylesheet" href="{{asset('/css/swipper.css')}}">
<link rel="stylesheet" href="{{asset('/css/category.css')}}">
<div class="container mt-5">
    <a href="/" class="nav-link"><i class="fa-solid fa-arrow-left-long" style="font-size: 47px;"></i></a>
    <span>
        @if($find_first_name)
        <h1><a href="#" class="effect-shine">Show All Ad In {{$find_first_name->city_id}}</a></h1>
        @endif
    </span>
    <div class="row mt-5 d-cart">
        @if($find->count())
        @foreach ($find as $advertisement)
        <div class="card">
            <div class="image">
              <a href="{{ route('product.view', [$advertisement->id, $advertisement->slug]) }}" class="nav-link">
              <img src="/images/{{$advertisement->img->name}}"  alt="Denim Jeans" style="width:100%; background-size: cover;">
              </a>
            </div>
              <a href="{{ route('product.view', [$advertisement->id, $advertisement->slug]) }}" class="nav-link">
                  <h1 class="name">{{ $advertisement->name }}</h1>
                  <p class="price name">{{ $advertisement->price }}{{ $advertisement->CurrencySymbol->symbol}}</p>
                  <p class="show-text">{{ $advertisement->description }}.</p>
                   <small class="text-muted">{{ $advertisement->created_at->format('Y-m-d') }}</small>
                  <p><button>View ad</button></p>
              </a>
        </div>
        @endforeach
        @else
        <p>Sorry, we are unble to find product</p>
        @endif
    </div>  
    {{ $find->links() }}
@endsection
