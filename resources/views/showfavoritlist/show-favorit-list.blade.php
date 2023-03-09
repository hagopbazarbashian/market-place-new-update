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
        <h1><a href="#" class="effect-shine">Favorit List {{ auth()->user()->name }}</a></h1>
    </span>
    @if(Session::has('delete'))
    <div class="alert alert-danger">
    {{ Session::get('delete')}}  
    </div>
    @endif
    <div class="row mt-5 d-cart">
        @if($Favoritelists->count())
        @foreach ($Favoritelists as $advertisement)
        <div class="card">
            <div class="image">
              <a href="{{ route('product.view', [$advertisement->favorit->id, $advertisement->favorit->slug]) }}" class="nav-link">
              <img src="/images/{{$advertisement->favorit->img->name}}"  alt="Denim Jeans" style="width:100%; background-size: cover;">
              </a>
            </div>
              <a href="{{ route('product.view', [$advertisement->favorit->id, $advertisement->favorit->slug]) }}" class="nav-link">
                  <h1 class="name">{{ $advertisement->favorit->name }}</h1>
                  <p class="price name">{{ $advertisement->favorit->price }}{{ $advertisement->favorit->CurrencySymbol->symbol}}</p>
                  <p class="show-text">{{ $advertisement->description }}.</p>
                   <small class="text-muted">{{ $advertisement->favorit->created_at->format('Y-m-d') }}</small>
                  <p><button>View ad</button></p>
              </a>
              <form action="{{ route('delete-favorit-list' ,$advertisement->favorit->id) }}" method="post">
                @csrf
                <p><button>Delete ad</button></p>
              </form>
        </div>
        @endforeach
        @else
        <p>Sorry, we are unble to Favorit product</p>
        @endif
    </div>  
@endsection