@extends('layouts.app')
@section('content')  
<link rel="stylesheet" href="{{asset('/css/cate.css')}}">
    <div class="container" >  
        <div class="row ">  
            <div class="col-md-3">
                <div class="card" >
                    <div class="card-header text-white text-center" style="background-color: red;">Filter By SubCategory</div>
                    <div class="card-body">
                    @foreach ($filterbysubcategorys as $ads)  
                        <p>
                            <a class="nav-link text-dark nav-link hover-underline-animation" href="#">{{$ads->childcategory->name}}</a>
                        </p>
                    @endforeach    
                    </div>
                 </div> 
                  <br>
                    <form action="{{route('filter')}}" method="GET">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Filter Price For All Product</label>
                                    <input type="text" name="minPrice" class="form-control">
                                </div><br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div> 
            <div class="col-md-9">
                @include('breadcrumb')
                <div class="row">
                    @if ($advertisements->count())
                    @foreach ($advertisements as $advertisement)
                        <div class="col-3">
                            <a class="nav-link text-dark" href="{{ route('product.view',[$advertisement->id ,$advertisement->slug ])}}">
                               <img class="img-thumbnail" src="/images/{{$advertisement->img->name}}" alt="First slide">
                               <p class="text-center card-footer" style="color:#222;">{{$advertisement->name}}/{{$advertisement->price}}{{$advertisement->CurrencySymbol->symbol}}</p>
                            </a>
                        </div>
                    @endforeach
                    @else
                    <p>Sorry, we are unble to find product based on this category</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
