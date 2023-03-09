@extends('layouts.app')
@section('content')
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
                <p>Price: ${{ $advertisement->price }} USD, {{ $advertisement->price_status }}</p>
                <p>Posted: {{ $advertisement->created_at->diffForHumans() }}</p>
                <p>Listing location: {{ $advertisement->listing_location }}</p>
                @isset($advertisement_user->advertisement_id)
                <i class="fa-solid fa-star color"></i>
                <i class="fa-solid fa-star color"></i>  
                <i class="fa-solid fa-star color"></i>
                <i class="fa-solid fa-star color"></i>
                <i class="fa-solid fa-star color"></i>
                @else
                <button id="saveaddlove" class="btn btn-info save-add"><i class="fas fa-heart"></i> Rate this ad</button>
                @endisset
                <br>
                <div id="saveadd"></div>
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
                    <button type="button" class="btn btn-danger hide" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa-regular fa-envelope"></i> Send Message
                    </button>
                  @endif
                  <a href="{{route('message')}}">
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
                    <a href="#" id="sixteen" class="nav-link" data-toggle="modal" data-target="#exampleModal1">
                        <i class="fa-regular fa-thumbs-down"></i>
                        Report This Ad
                      </a>
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
                            <form action="/chatify">@csrf
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
                                             In Search bar please Search Saller Name
                                             Saller Name <p style="color:red">{{ $advertisement->user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" onclick="myFunction()" id="show">Go to Chat Room</button>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </p>
                @if(Auth::check())
                @if (auth()->user()->id != $advertisement->user_id)
                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://marketplacelaravel.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();

                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
                        by Disqus.</a></noscript>
                @endif
            </div>
            @endif
        </div>
    </div>
@endsection
