@extends('layouts.app')
@section('content')
<style>
    .sh{
     margin: 0px 0px 10px 0;
    }
    
</style>
<link rel="stylesheet" href="{{asset('/css/Similarstatements.css')}}"> 
<link rel="stylesheet" href="{{asset('/css/rate.css')}}"> 
<link rel="stylesheet" href="{{asset('/css/show-ad.css')}}">    
<link rel="stylesheet" href="{{asset('/css/forsinglepage.css')}}">
    <div class="container ">  
        <div class="row">  
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    {{-- <div class="carousel-inner">
                        <div class="carousel-item active"> 
                            <img src="/images/{{$images->name}}" class="d-block w-100" alt="...">
                        </div>
                    </div> --}}
                    @php
                    $url =url()->full();
                    $message = "Jack-Pops.com";
                    $image = '/images/{{$image->name}}';
                    @endphp
                    <div class="sh">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}&quote={{ urlencode($message) }}" target="_blank">
                        <i  style="font-size: 24px;color: #1877F2;"class="fa-brands fa-facebook" title="sharer page"></i>
                    </a>
                    <a href="whatsapp://send?text={{ urlencode($message . ' ' . $url) }}" data-action="share/whatsapp/share">
                         <i  style="font-size: 24px;color:#00a884;" class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="instagram://library?AssetPath={{ urlencode($image) }}" data-action="share/instagram/share">
                        <i style="font-size: 24px;color:#962fbf ;" class="fa-brands fa-instagram"></i>
                    </a>
                    </div>
                    <div class="container2">
                        <div class="main-img2">
                          <span class="span2"></span>
                          <span class="span2"></span>  
                          <span class="span2"></span>
                          <span class="span2"></span>
                          <span class="span2"></span>
                          <span class="span2"></span>
                        </div>
                         <div class="images">
                            @foreach ($images as $image)
                            <img src="/images/{{$image->name}}" width="90" onclick="getImg(this)"/>
                            @endforeach
                         </div>
                      </div>

                </div>
                <hr> 
                <div class="card">
                    <div class="card-body">
                        <p>{!! $advertisement->description !!}</p>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">More Info</div>
                    <div class="card-body">
                        <p>Country: {{ $advertisement->country->name}}</p>
                        <p>State: {{ $advertisement->state_id}}</p>
                        <p>City: {{ $advertisement->city_id}}</p>
                        <p>Product condition: {{ $advertisement->product_condition}}</p>
                        <p>Product unique Id: {{ $advertisement->id }}</p>
                    </div>
                </div>
                <hr>
                @if($advertisement->link == Null)
                @else
                <div class="card">
                    <div class="card-body">
                        <iframe width="100%" height="100%" src="{{$advertisement->link}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <h1>{{ $advertisement->name }}</h1>
                <p>Price: <span style="font-size:20px">{{ $advertisement->price }}{{$advertisement->CurrencySymbol->symbol}} {{ $advertisement->price_status }}</span></p>
                <p>Posted: {{ $advertisement->created_at->diffForHumans() }}</p>
                <p>Listing location: {{ $advertisement->listing_location }}</p>
                <div>
                    <div class="row">
                        <div class="col mt-1">
                            <form class="py-2 px-1" action="" style="" method="POST" autocomplete="off">
                                @csrf
                                <p class="font-weight-bold ">Review</p>
                                <div class="form-group row">
                                <div class="col">
                                    <div class="rate">
                                        <input type="radio" id="star5" class="get_value" name="rating" data-id="5"/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" checked id="star4" class="get_value" name="rating" data-id="4"/>
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" class="get_value" name="rating" data-id="3"/>
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" class="get_value" name="rating" data-id="2">
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" class="get_value" name="rating" data-id="1"/>
                                        <label for="star1" title="text">1 star</label>
                                        <input type="hidden" class="adid" value="{{$advertisement->id}}">
                                    </div>
                                </div>
                                <div class="com"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- @isset($advertisement_user->advertisement_id)
                <i class="fa-solid fa-star color"></i>
                <i class="fa-solid fa-star color"></i>  
                <i class="fa-solid fa-star color"></i>
                <i class="fa-solid fa-star color"></i>
                <i class="fa-solid fa-star color"></i>
                @else
                <button id="saveaddlove" class="btn btn-info save-add"><i class="fas fa-heart"></i> Rate this ad</button>
                @endisset
                <br>
                <div id="saveadd"></div> --}}
                {{-- @if (Auth::check())
                    @if (!$advertisement->didUserSavedAd() && auth()->user()->id != $advertisement->user_id)
                        <save-ad :ad-id="{{ $advertisement->id }}" :user-id="{{ auth()->user()->id }}">
                        </save-ad>
                    @endif
                @endif --}}
                <hr>
                <div class="image">
                    @if (!$advertisement->user->avatar)
                        <img src="/img/man.jpg" width="65px" alt="..." class="rounded-circle">
                    @else
                         <img src="{{ Storage::url($advertisement->user->avatar) }}" width="65px" alt="..." class="rounded-circle">
                    @endif
                </div>
                <p>
                    <a class="user_id nav-link" value="{{$advertisement->user_id}}" href="{{ route('show.user.ads' ,$advertisement->user_id ) }}" class="nav-link">{{ $advertisement->user->name}}</a>
                    <input type="hidden" id="advertisement_id" value="{{$advertisement->id}}">
                </p>
                <p>
                    @if ($advertisement->phone_number)
                        <button type="button" class="btn btn-success" id="show-phonenumber">
                            <i class="fa-sharp fa-solid fa-phone"></i> Show Phone Number
                        </button>
                        <div id="box" style="display: none;"><a  class="nav-link" href="tel:{{ $advertisement->phone_number }}"> <i class="fa fa-phone" aria-hidden="true"></i> {{ $advertisement->phone_number }}</a></div>
                    @endif
                </p>
                <p>
                  @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                  @endif
                  @if(Auth()->check())
                  @if (auth()->user()->id != $advertisement->user_id)
                    <button type="button" class="btn btn-danger hide" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa-regular fa-envelope"></i> Send Message
                    </button>
                  @endif
                  @endif
                  <a href="#">
                    <button type="button" class="btn btn-success" id="panel">
                        <i class="fa-solid fa-paper-plane"></i>Show  Message
                     </button>
                  </a><br><br>
                  <span>
                    @if (Session::has('report'))
                    <div class="alert alert-success">
                        {{ Session::get('report') }}
                    </div>
                    @endif
                        @if(Auth()->check())
                        @if (auth()->user()->id != $advertisement->user_id)
                        <a href="#" id="sixteen" class="nav-link" data-toggle="modal" data-target="#exampleModal1">
                            <i class="fa-regular fa-thumbs-down"></i>
                            Report This Ad
                        </a>
                        @endif
                        @endif
                        {{-- Report for this ad --}}
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('report.ad')}}" method="post">@csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Something wrong with this ads ?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> 
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Select reason</label>
                                                <select class="form-control" name="reason" required>
                                                    <option value="">select</option>
                                                    <option value="Fraud">Fraud</option>
                                                    <option value="Duplicate">Duplicate</option>
                                                    <option value="Spam">Spam</option>
                                                    <option value="Wrong-category">Wrong Category</option>
                                                    <option value="Offesnsive">Offensive</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Your Email</label>
                                                @if (Auth::check())
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ Auth::user()->email }}" readonly>
                                                @else
                                                    <input type="email" name="email" class="form-control" required>
                                                @endif
    
                                            </div>
                                            <div class="form-group">
                                                <label>Your Message</label>
                                                <textarea name="message" class="form-control" required></textarea>
                                            </div>
                                            <input type="hidden" name="ad_id" value="{{ $advertisement->id }}">
    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Report this ad</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                  </span>
                    {{-- <button id="show">Show</button> --}}
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <!--<form action="/chatify">-->
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Send Message To Saller {{ $advertisement->user->name}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <div id="order-detail"></div>
                                        <div class="form-group">
                                            <label>Your Message</label>
                                            <textarea name="message" id="message" class="form-control" ></textarea>
                                        </div>
                                        <input type="hidden" id="ad_id" name="ad_id" value="{{ $advertisement->id }}">
                                        <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $advertisement->user->id }}"> --}}
                                        <div class="alert alert-danger" role="alert">
                                              with click you can show Saller in your favorite bar
                                             {{-- Saller Name <p style="color:red">{{ $advertisement->user->name }}</p> --}}
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">  
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <p class="show_ad_image" value="/images/{{$image->name}}"></p>
                                        @if($show_button)
                                        <a class="nav-link" href="/chatify"><button class="btn btn-success">User {{$advertisement->user->name}} in your favorite bar list</p></a>
                                        @else
                                        <button type="submit" class="btn btn-danger add-favorite add_user"  value="{{  $advertisement->user->id  }}"  onclick="myFunction()" id="show">Go to Chat Room</button>
                                        @endif
                                    </div>
                                </div>
                             <!--</form>-->
                        </div>
                    </div>
                </p>
                @if(Auth::check())
                @if (auth()->user()->id != $advertisement->user_id)
                <div class="container mt-5">
                    <div class="d-flex row">
                        <div class="">
                            <div class="d-flex flex-column comment-section">
                                  {{-- show comment --}}
                                   <div id="showcomment"></div>
                                  {{-- show comment --}}
                                 
                                  @foreach ($comments as $comment)
                                  <div class="bg-white p-2">  
                                    <div class="d-flex flex-row user-info">
                                    @if (auth()->user()->avatar)
                                       <img class="rounded-circle" src="{{Storage::url(auth()->user()->avatar)}}" width="40">
                                    @else
                                     <img class="rounded-circle" src="{{asset('/img/man.jpg')}}" width="40">
                                    @endif
                                    <div class="d-flex flex-column justify-content-start ml-2" style="margin: 0 0 0 12px;"><span class="d-block font-weight-bold name">{{auth()->user()->name}}</span><span class="date text-black-50">{{$comment->created_at}}</span></div>
                                          </div>
                                          <div class="mt-2">
                                              <p class="comment-text" style="font-size: 15px">{{$comment->comment_body}}</p>
                                          </div>
                                          <div class="d-flex flex-row fs-12">
                                            @if ($comment->like == 1)
                                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1 shadow-none " style="color:#dc3545" id="showcomment">{{$comment->like}} Like</span></div>
                                            @else
                                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1 shadow-none "><i class="fa-solid fa-thumbs-up show-all-comments" style="font-size: 17px;"></i></span></div>
                                            @endif
                                            <!--<div class="likeShareBtnmt-3">-->
                                            <!--<div id="fb-root"></div>-->
                                            <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="ccaa4s"></script>-->
                                            <!--<div -->
                                            <!--    class="fb-like" -->
                                            <!--    data-layout="standard" -->
                                            <!--    data-action="like" -->
                                            <!--    data-size="large" -->
                                            <!--    data-show-faces="true" -->
                                            <!--    data-href="https://jack-pops.com/products/110/2021%20Kia%20Sorento%20Review" -->
                                            <!--    data-share="true">-->
                                            <!--</div>-->
                                            <!--</div>-->
                                        </div>
                                    </div><hr>
                                  @endforeach
                                <div class="bg-white">
                                    <div class="d-flex flex-row fs-12">
                                        <div class="like p-2 cursor advertisement_id" value="{{ $advertisement->id }}"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                                        @if($comments->count())
                                        <div class="like p-2 cursor"><i class="fa fa-commenting-o" ></i><span class="ml-1"><img title="Click to show all comment" class=" blink_text" src="/img/commenting-o.jpg"></span></div>
                                        @else
                                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">not have any comment</span></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-light p-2">
                                    <div class="d-flex flex-row align-items-start">
                                        @if (auth()->user()->avatar)
                                        <img src="{{Storage::url(auth()->user()->avatar)}}" width="40" height="40" class="rounded-circle">
                                        @else
                                        <img src="{{asset('/img/man.jpg')}}" width="40" height="40" class="rounded-circle">
                                        @endif

                                        <textarea style="margin: 0 0 0 12px;" class="form-control ml-1 shadow-none textarea"></textarea></div>
                                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm comment-now" type="button">Post comment</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endif
                @endif
                <div class="dlrel">
                   <span class="trel">Similar statements</span>
                   @foreach ($childs as $child)
                   <div>
                    <a href="{{ route('product.view', [$child->id, $child->slug]) }}">
                       <img src="/images/{{$child->img->name}}" data-original="/images/{{$child->img->name}}" original-title="" style="">
                       <div>
                           <div class="np" style="text-overflow: ellipsis;">{!! $child->description !!}</div>
                           <div class="p">{{ $child->price }}{{ $child->CurrencySymbol->symbol}}</div>
                       </div>
                   </a>
                  </div>
                   @endforeach
                </div>  
            </div>
        </div>
    </div>
    <script src="{{ asset('js/send-rate.js') }}"></script>
    <!--update ch_favorites -->
    <script>
        $('.add-favorite').click(function () {
        var add_user = $('.add_user').attr('value');
        var show_ad_image = $('.show_ad_image').attr('value');
        $.ajax({ 
            type:"POST",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
              "add_user":add_user,
              "show_ad_image":show_ad_image
            //    "comment":comment,
            //    "ad_name":ad_name
            },
            url:"/update-favorite",  
            success:function(data){
              $("#showcomment").append(data); 
              window.location.href = "/chatify";
            }
          })
      });
    </script>
@endsection
