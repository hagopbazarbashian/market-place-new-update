@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('/css/edit.css')}}">
<style>
     #wait-animation {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: 9999;
      }
      
      @keyframes spin {
        to {transform: rotate(360deg);}
      }
      
      #wait-animation:before {
        content: '';
        box-sizing: border-box;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 60px;
        height: 60px;
        margin-top: -30px;
        margin-left: -30px;
        border-radius: 50%;
        border: 6px solid #ccc;
        border-top-color: #333;
        animation: spin 1s linear infinite;
      }
      #businesspagename,#descriptionbusinesspageb,#businessphonenumber,#businessaddress,#border{
        display:none;
      }
      .flex{
        display: flex;
        justify-content: center;
      }
</style>
<div id="wait-animation"></div>
<div class="container">
    <div class="row ">  
        <div class="col-md-3">
            <div class="card ">  
                @include('sidebar')
            </div> 
        </div> 
        <div class="col-md-9">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $errormessage)
                    <li>{{ $errormessage }}</li>
                @endforeach
            </div>
            @endif
            @if(Session::has('successful'))
                <div class="alert alert-success">
                {{ Session::get('successful')}}
                </div>  
            @endif
            
            <form action="{{ route('add.store') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header text-white" style="background-color: red">
                        Post your ad.
                    </div>
                    <div class="card-body">
                        <h2>Ad Type</h2>
                        <span class="rgroup">
                            <span><input name="ad_type" onchange="paddtoggle(1);" id="ad_type_0" type="radio" value="0" checked=""><label for="ad_type_0">personal page</label></span>
                            <span onclick="show()"><input name="ad_type" onchange="paddtoggle(1);" id="ad_type_1" type="radio" value="1"><label for="ad_type_1">Business page </label></span>
                        </span> 
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>            
                        <div class="custom-file">
                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                        <br>
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
                        
                        <label for="file" class="mt-2"><b>Choose category</b></label>
                        <div class="form-inline form-group mt-1">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-4">
                                    <select class="form-control" id="category"  name="category_id">
                                        <option value="">Choose category</option>
                                        @foreach ($categorys as $category)
                                         <option value="{{ $category->id }}" {{ old('category_id') == "$category->id" ? 'selected' : '' }}>{{ $category->name }}</option>
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

                        <div class="image-upload-wrap" id="border">
                            <div class="flex">
                                <h2>Business Info</h2>
                                
                            </div>
                            <div class="drag-text">
                                <div class="form-group" id="businesspagename">
                                    <label for="name">Business Page Name</label>
                                    <input type="text" name="businesspagename" class="form-control" value="{{ old('businesspagename') }}">
                                </div>
        
                                <div class="form-group formTag" id="businessphonenumber">
                                    <label for="name">Business Phone Number</label>
                                    <input id="numberType" type="number" class="form-control" name="businessphonenumber" value="{{ old('businessphonenumber') }}">
                                </div>
        
                                <div class="form-group" id="businessaddress">
                                    <label for="name">Business Address </label>
                                    <input type="text" name="businessaddress" class="form-control" value="{{ old('businessaddress') }}">
                                </div>
        
            
                                <div class="form-group" id="descriptionbusinesspageb">
                                    <label for="name">Description Business Page</label>
                                    <textarea  name="descriptionbusinesspage"  class="form-control" placeholder="Description Business for Page." value="{{ old('descriptionbusinesspage') }}"></textarea>
                                </div>
        
                            </div>
                            
                        </div>

                       
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
                        </div><br>
                        
                        <label style="color:red" for="name">Your Ad Urgent ?</label>
                        <div class="form-group">
                            <input type="checkbox" id="vehicle1" name="urgent" value="1">
                            <label for="vehicle1">Urgent</label><br>
                        </div>
                        
                        <label for="file" class="mt-2"><b>Price</b></label>
                        <div class="form-inline form-group mt-1">
                            <div class="d-flex justify-content-between"> 
                                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                                <div class="col-md-4"> 
                                    <select class="form-control" id="category"  name="currency_id">
                                        <option value="">Currency Symbols</option>
                                        @foreach ($CurrencySymbols as $CurrencySymbol)
                                         <option value="{{ $CurrencySymbol->id }}"  {{ old('currency_id') == "$CurrencySymbol->id" ? 'selected' : '' }}>{{ $CurrencySymbol->symbol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Price staus</label>
                            <select class="form-control" name="price_status">
                                <option value="negoitable">Negotiable</option>
                                <option value="fixed">Fixed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Condition</label>
                            <select class="form-control" name="product_condition">
                                <option value="">Select </option>
                                <option value="likenew">Looks like New</option>
                                <option value="heavilyused">Heavily Used</option>
                                <option value="new">New</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location">Listing Location</label>
                            <input type="text" class="form-control" name="listing_location" value="{{ old('listing_location') }}">
                        </div>
                        <label for="file" class="mt-2"><b>Choose address</b></label>
                        <div class="form-inline form-group mt-1">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-group"></div>
                                    <select class="form-control" name="country_id">
                                        <option value=""> Select country</option>
                                        @foreach ($countrys as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id') == "$country->id" ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">state</label>
                                <input type="text" class="form-control" name="state_id" value="{{ old('state_id') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">city</label>
                                <input type="text" class="form-control" name="city_id" value="{{ old('city_id') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location">Seller contact number</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                        </div>
                        <div class="form-group">
                            <label for="location">Demo link of product(ie:youtube)</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link') }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger float-right"  id="wait-button" type="submit">Publish</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
const waitButton = document.getElementById("wait-button");
const waitAnimation = document.getElementById("wait-animation");

waitButton.addEventListener("click", function() {
  waitAnimation.style.display = "block";
});


function show() {

/* Access image by id and change
the display property to block*/
document.getElementById('image')
        .style.display = "block";

document.getElementById('businesspagename')
.style.display = "block";

document.getElementById('descriptionbusinesspageb')
.style.display = "block";

document.getElementById('businessphonenumber')
.style.display = "block";

document.getElementById('businessaddress')
.style.display = "block";

document.getElementById('border')
.style.display = "block";

document.getElementById('btnID')
        .style.display = "none";

}

document.getElementById('files').addEventListener('change', previewFile, false);


        
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

</script>
@endsection
