@extends('layouts.app')
@section('content') 
<link rel="stylesheet" href="{{asset('/css/cate.css')}}">
    <div class="container" >
        <div class="row ">
            {{-- now is Comment for new update is show --}}
            <div class="col-md-3">   
                <div class="card" >
                    <div class="card-header text-white text-center" style="background-color: red;">Filter By Childcategory</div>
                    <div class="card-body">
                        <p>
                            @isset($filters->childcategory->name)
                            <a class="nav-link text-dark" href="{{$filters->childcategory->slug}}">{{$filters->childcategory->name}}</a>
                            @endisset
                        </p>
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
            {{-- now is Comment for new update is show --}}
            <div class="col-md-9">
                @include('breadcrumb')
                <div class="row">
                    @if ($advertisements->count())
                    @foreach ($advertisements as $advertisement)
                        <div class="col-3">
                          <img class="img-thumbnail" src="/images/{{$advertisement->img->name}}" alt="First slide">
                          <p class="text-center card-footer" style="color:#222;">{{$advertisement->name}}/{{$advertisement->price}}{{$advertisement->CurrencySymbol->symbol}}</p>
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
