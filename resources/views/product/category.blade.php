@extends('layouts.app')
@section('content') 

<style>
    .slider-selection {
	background: #131313 !important;
}

.slider-gaia .slider-selection {
	background-color: #131313 !important;
}

.slider.slider-horizontal {
    width: 100% !important;
    height: 20px;
}
.slider-handle {
    background-color: #131313 !important;
    background-image: none !important;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border: none;
    width: 16px;
    height: 16px;
}

.slider-gaia .slider-horizontal .slider-track {
	height: 2px!important;
    width: 100%;
    margin-top: -3px;
    top: 50%;
    left: 0;
}

.slider-gaia .slider-handle {
	border-color: #131313;
}

.slider-gaia .tooltip-inner {
    max-width: auto!important;
    padding: 3px 8px;
    color: #000 !important;
    text-align: center;
 	border-radius: 4px;
 	background: none;
  position:relative;
}

.slider-gaia .tooltip .tooltip-arrow {
    display: none !important;
}

.slider-handle:nth-child(odd)
 {
  background-color: red!important;
  background-image: none;
}
</style>
<link rel="stylesheet" href="{{asset('/css/cate.css')}}">
    <div class="container" >
        <div class="row ">  
            <div class="col-md-3">
                <div class="card" >
                    <div class="card-header text-white text-center" style="background-color: red;">Filter by Category</div>
                    <div class="card-body">
                    @foreach ($subs as $ads)
                    <a href="{{ route('subcategory.show',$ads->name) }}" class="nav-link hover-underline-animation">
                        <p class="nav-link text-dark">
                            {{$ads->name}}
                        </p>
                    </a>
                    @endforeach    
                    </div>
                 </div>
                  <br>
                  <div class="card" >
                    <div class="card-header text-white text-center" style="background-color: red;">Filter Price</div>
                    <div class="card-body">
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
                 </div>
                    
            </div> 
            
            <div class="col-md-9">
                @include('breadcrumb')
                <div class="row"> 
                    @if ($categorys->count())
                    @foreach ($categorys as $advertisement)
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

<script>
     (function($) {
    $(document).ready(function() {
        $('#priceRange').each(function() {
            var slidervalue = $(this).attr('data-slider-value');
            var separator = slidervalue.indexOf(',');
            if (separator !== -1) {
                slidervalue = slidervalue.split(',');
                slidervalue.forEach(function(item, i, arr) {
                    arr[i] = parseFloat(item);
                });
            } else {
                slidervalue = parseFloat(slidervalue);
            }


            $(this).slider({
                formatter: function(slidervalue) {
                    return '$' + slidervalue;
                },
                min: parseFloat($(this).attr('data-slider-min')),
                max: parseFloat($(this).attr('data-slider-max')),
                range: $(this).attr('data-slider-range'),
                value: slidervalue,
                tooltip_split: $(this).attr('data-slider-tooltip_split'),
                tooltip: $(this).attr('data-slider-tooltip'),
                tooltip_position: 'bottom'
            });


            $("#priceRange").on('change', function() {
                var maxvalue = $(".tooltip-max .tooltip-inner").text().replace(/\$/g, "");
                maxparse = parseInt(maxvalue);
                minvalue = $(".tooltip-min .tooltip-inner").text().replace(/\$/g, "");
                minparse = parseInt(minvalue);
                switch (true) {
                    case (maxparse < $('#range1').attr('data-range')):
                        $('#range1').prop('checked', true);
                        $('#range2, #range3, #range4, #range5').prop('checked', false);
                        break;
                    case (maxparse < $('#range2').attr('data-range')):
                        $('#range1, #range2').prop('checked', true);
                        $('#range3, #range4, #range5').prop('checked', false);
                        break;
                    case (maxparse < $('#range3').attr('data-range')):
                        $('#range1, #range2, #range3').prop('checked', true);
                        $('#range4, #range5').prop('checked', false);
                        break;
                    case (maxparse < $('#range4').attr('data-range')):
                        $('#range1, #range2, #range3, #range4').prop('checked', true);
                        $('#range5').prop('checked', false);
                        break;
                    case (maxparse == $('#range5').attr('data-range')):
                        $('#range1, #range2, #range3, #range4, #range5').prop('checked', true);
                        break;
                        $('#range1').prop('checked', true);
                }

                if (minparse > $('#range1').attr('data-range')) {
                    $('#range1').prop('checked', false);
                }
                if (minparse >= $('#range2').attr('data-range')) {
                    $('#range1, #range2').prop('checked', false);
                }
                if (minparse >= $('#range3').attr('data-range')) {
                    $('#range1, #range2, #range3').prop('checked', false);
                }
                if (minparse >= $('#range4').attr('data-range')) {
                    $('#range1, #range2, #range3, #range4').prop('checked', false);
                }

            });


            //Onchange function checkbox on/off

        });


        $('.rangeCheck').on('change', function() {

                if ($(".rangeCheck:checked").length == 0) {
                    $('#range1').prop('checked', true);
                    $('.max-slider-handle').css("left", "17.3311%");
                    $('.slider-selection').css("width", "17.3311%");
                    $('.tooltip-max').css("left", "17.3311%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range1').attr('data-range'));
                }

                if ($("#range1:checked").length == 1) {
                    $('.max-slider-handle').css("left", "17.3311%");
                    $('.slider-selection').css("width", "17.3311%");
                    $('.tooltip-max').css("left", "17.3311%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range1').attr('data-range'));

                }


                if ($("#range1:checked,#range2:checked").length == 2) {
                    $('.max-slider-handle').css("left", "33.3311%");
                    $('.slider-selection').css("width", "33.3311%");
                    $('.tooltip-max').css("left", "33.3311%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range2').attr('data-range'));

                } 
                

                if ($("#range1:checked,#range3:checked").length == 2) {
                    $('#range2').prop('checked', true);
                    $('.max-slider-handle').css("left", "66.6622%");
                    $('.slider-selection').css("width", "66.6622%");
                    $('.tooltip-max').css("left", "66.6622%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range3').attr('data-range'));

                }
                

                if ($("#range1:checked,#range4:checked").length == 2) {
                    $('#range2, #range3').prop('checked', true);
                    $('.max-slider-handle').css("left", "93.3271%");
                    $('.slider-selection').css("width", "93.3271%");
                    $('.tooltip-max').css("left", "93.3271%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range4').attr('data-range'));

                }
                

                if ($("#range1:checked,#range5:checked").length == 2) {
                    $('#range2, #range3, #range4').prop('checked', true);
                    $('.max-slider-handle').css("left", "100%");
                    $('.slider-selection').css("width", "100%");
                    $('.tooltip-max').css("left", "100%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range5').attr('data-range'));

                }


                if ($("#range2:checked,#range4:checked").length == 2) {
                    $('#range3').prop('checked', true);
                    $('.max-slider-handle').css("left", "93.3271%");
                    $('.slider-selection').css("width", "93.3271%");
                    $('.tooltip-max').css("left", "93.3271%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range4').attr('data-range'));
                }

                if ($("#range2:checked,#range5:checked").length == 2) {
                    $('#range3, #range4').prop('checked', true);
                    $('.max-slider-handle').css("left", "100%");
                    $('.slider-selection').css("width", "100%");
                    $('.tooltip-max').css("left", "100%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range5').attr('data-range'));
                }

                if ($("#range3:checked,#range5:checked").length == 2) {
                    $('#range4').prop('checked', true);
                    $('.max-slider-handle').css("left", "100%");
                    $('.slider-selection').css("width", "100%");
                    $('.tooltip-max').css("left", "100%");
                    $('.tooltip-max .tooltip-inner').html('$' + $('#range5').attr('data-range'));

                }

                if($("#range1").is(':checked')){
                    $('.min-slider-handle').css("left", "0%");
                    $('.tooltip-min').css("left", "0%");
                    $('.tooltip-min .tooltip-inner').html('$' + $('#range1').attr('data-range'));
                    
                } else{
                    $('.min-slider-handle').css("left", "17.1429%");
                    $('.tooltip-min').css("left", "17.1429%");
                    $('.tooltip-min .tooltip-inner').html('$' + $('#range1').attr('data-range'));
                    
                }

                

            });


    });



})(jQuery);
</script>
@endsection
