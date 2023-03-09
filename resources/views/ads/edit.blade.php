@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('/css/edit.css')}}">
<style>
    .d{
         display:flex; 
         flex-wrap: wrap;  
    }
</style>
    <div class="container">
        <div class="row "> 
            <div class="col-md-3">
               @include('sidebar')
            </div>
            <div class="col-md-9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $errorMessage)
                            <li>{{ $errorMessage }}</li>
                        @endforeach
                    </div>
                @endif   
                <form action="{{ route('ads.update',$ad->image->id) }}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header text-white" style="background-color:#dc3545">
                            Update your ad.
                        </div>
                       
                        <div class="card-body">
                            <h2>Ad Type</h2>
                            @if ($ad->image->adtype == 1)
                            <span class="rgroup">
                                <span><input name="ad_type" onchange="paddtoggle(1);" id="ad_type_0" type="radio" value="0"><label for="ad_type_0">personal page</label></span>
                                <span onclick="show()"><input name="ad_type" onchange="paddtoggle(1);" id="ad_type_1" type="radio" value="1" checked ><label for="ad_type_1">Business page </label></span>
                            </span> 
                            @else
                            <span class="rgroup">
                                <span><input name="ad_type" onchange="paddtoggle(1);" id="ad_type_0" type="radio" value="0" checked><label for="ad_type_0">personal page</label></span>
                                <span onclick="show()"><input name="ad_type" onchange="paddtoggle(1);" id="ad_type_1" type="radio" value="1"><label for="ad_type_1">Business page </label></span>
                            </span> 
                            @endif
                             
                            <div class="d">   
                                @if ($ad->name > 1)
                                @foreach ($image as $img)
                                <p class="slide">
                                    <img class="category_id" value="{{ $category_id->category_id }}" class="photo" src="/images/{{ $img->name }}" style="width:200px;margin: 22px;">
                                    <i  class="fa-solid fa-x ad_id" value="{{ $category_id->id }}" id="del"></i>
                                    <p class="ad_name" value="{{ $category_id->name }}"></p>
                                </p>
                                @endforeach
                                @else 
                                @foreach ($image as $img)
                                <p class="slide">
                                    <img class="category_id" value="{{ $category_id->category_id }}" class="photo" src="/images/{{ $img->name }}" style="width:200px;margin: 22px;">
                                    {{-- <i  class="fa-solid fa-x ad_id" value="{{ $category_id->id }}" id="del"></i> --}}
                                    <p class="ad_name" value="{{ $category_id->name }}"></p>
                                </p>
                                @endforeach
                                @endif
                              </div>
                              <div class="user-image mb-3 text-center">
                                <div class="imgPreview"> </div>
                            </div>            
                            <div class="custom-file">
                                <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                                <label class="custom-file-label" for="images">Choose image</label>
                            </div><br>
                            {{-- //show business logo --}}
                            @if ($ad->image->adtype == 1)
                            <label for="file" class="mt-2"><b>Business Logo</b></label>
                            @endif
                            <div>
                                <div class="logo-busines"> 
                                    @if ($ad->image->adtype == 1)
                                    <img class="logo" src="/logobusines/{{ $ad->image->logobusiness}}">
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Choose Logo Business</button>
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" name="logobusiness" type='file' onchange="readURL(this);" accept="image/*" />
                                            <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="file-upload" id="image">
                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Choose Logo Business</button>
    
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" name="logobusiness" type='file' onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                    <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>

                             <label for="file" class="mt-2"><b style="color:red">Choose category *</b></label>
                            <div class="form-inline form-group mt-1">
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <select class="form-control" id="category"  name="category_id">
                                            <option value="">Choose category</option>
                                            @foreach ($categorys as $category)
                                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" id="subCategory" name="subcategory_id">
                                            <option value="0">Choose Subcategory</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" id="childCategory" name="childcategory_id">
                                            <option value="0">Choose Childcategory</option>
                                        </select> 
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$ad->image->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                            <textarea name="description" id="mytextarea" class="form-control">{{$ad->image->description}}</textarea>
                            </div><br>
                            <label style="color:red" for="name">Your Ad Urgent ?</label>
                            @if ($ad->image->urgent == 1)
                                <div class="form-group">
                                    <input type="checkbox" id="vehicle1" name="urgent" value="1" checked>
                                    <label for="vehicle1">Urgent</label><br>
                                </div>
                            @else
                                <div class="form-group">
                                    <input type="checkbox" id="vehicle1" name="urgent" value="1">
                                    <label for="vehicle1">Urgent</label><br>
                                </div>
                            @endif
                            <label for="file" class="mt-2"><b>Price</b></label>
                            <div class="form-inline form-group mt-1">
                            <div class="d-flex justify-content-between"> 
                                <input type="text" name="price" class="form-control" value="{{$ad->image->price}}">
                                <div class="col-md-4">
                                    <select style="color:red" class="form-control" id="category"  name="currency_id">
                                        <option value="">Currency Symbols*</option>
                                        @foreach ($CurrencySymbols as $CurrencySymbol)
                                         <option value="{{ $CurrencySymbol->id }}"{{ old('currency_id', $CurrencySymbol->id) == $ad->currency_id ? 'selected' : '' }}>{{ $CurrencySymbol->symbol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           </div>
                            <div class="form-group">
                                <label for="description">Price staus</label>
                                <select class="form-control" name="price_status">
                                    <option value="negoitable" {{$ad->image->price_status=="negoitable"?'selected':''}}>Negotiable</option>
                                    <option value="fixed" {{$ad->image->price_status=="fixed"?'selected':''}}>Fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Product Condition</label>
                                <select class="form-control" name="product_condition">
                                    <option value="">Select </option>
                                    <option value="likenew" {{$ad->image->product_condition=="likenew"?'selected':''}}>Looks like New</option>
                                    <option value="heavilyused" {{$ad->image->product_condition=="heavilyused"?'selected':''}}>Heavily Used</option>
                                    <option value="new" {{$ad->image->product_condition=="new"?'selected':''}}>New</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="location">Listing Location</label>
                            <input type="text" class="form-control" name="listing_location" value="{{$ad->image->listing_location}}">
                            </div>
                            <label for="file" style="color:red" class="mt-2"><b>Choose address*</b></label>
                            <div class="form-inline form-group mt-1">
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <div class="form-group"></div>
                                        <select class="form-control" name="country_id">
                                            <option value=""> Select country</option> 
                                            @foreach ($countrys as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="location">state</label>
                                    <input type="text" class="form-control" name="state_id" value="{{ $ad->image->state_id}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="location">city</label>
                                    <input type="text" class="form-control" name="city_id" value="{{ $ad->image->city_id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location">Seller contact number</label>
                            <input type="number" class="form-control" name="phone_number" value="{{$ad->image->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label for="location">Demo link of product(ie:youtube)</label>
                            <input type="text" class="form-control" name="link" value="{{$ad->image->link}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger float-right" type="submit">Update ad</button>
                            </div>

                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
   $.confirm({
    title: 'Attention!',
    content: 'with edit your ad info please return Choose address & Currency Symbols & Choose category',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: { 
            text: 'ok',
            btnClass: 'btn-red',
            action: function(){
            }
        },
        close: function () {
        }
    }
});


function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});


function show() {

/* Access image by id and change
the display property to block*/
document.getElementById('image')
        .style.display = "block";

document.getElementById('btnID')
        .style.display = "none";
}

document.getElementById('files').addEventListener('change', previewFile, false);

</script>
@endsection
