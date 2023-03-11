@extends('layouts.app')
@section('content') 
<link rel="stylesheet" href="{{ asset('/css/managebusinesspage.css') }}">
<div id="main">
    @if($find_business_page)
    <div id="puheader">
        <div class="head">
            <div class="bnr"><img src="/logobusines/{{ $find_business_page->logobusiness }}" original-title="" /></div>
            <div class="i">
                <div class="l">
                    <div class="l"><img src="/logobusines/{{ $find_business_page->logobusiness }}" original-title="" /></div>
                    <div class="n">
                        <div>{{ $find_business_page->businesspagename }}</div>
                        <div class="st">
                            @foreach ($managebusinesspages as $managebusinesspage)
                            <div>{{ $managebusinesspage->count() }} ads</div>
                            @endforeach
                            <div>84 followers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pagecol">
        <div id="contentr">
            <div class="dl p">
                <div class="gl">
                    @foreach ($managebusinesspages as $advertisement)
                        <a href="{{ route('product.view', [$advertisement->id, $advertisement->slug]) }}">
                            <img data-original="/images/{{$advertisement->img->name}}" original-title="" src="/images/{{$advertisement->img->name}}" style="" />
                            <div class="p">{{ $advertisement->price }}{{ $advertisement->CurrencySymbol->symbol}}</div>
                            <div class="l">{{ $advertisement->name }}</div>
                            <div class="at">{!! $advertisement->description !!}</div>
                        </a>
                    @endforeach
                </div>
                
            </div>
            <div id="star" class="gl" style="display: none;"><div class="on" original-title="Add to Favorites"></div></div>
        </div>
    </div>
    @else
    <div class="flex">
        <p>You Dont have Business Page </p>
    </div>
    @endif
    
</div>
    

@endsection
