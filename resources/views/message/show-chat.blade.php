@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row"> 
        <div class="col-md-10">
            <div class="card"> 
                <div class="card-header text-center">  
                    <span>Chat with <span style="color:green">{{$user_name->name}}</span></span> 
                </div>
                <div class="card-body chat-msg div" id="sc">   
                         <ul class="chat">
                           @foreach($messages as $message)
                           @if($message->selfOwned==false)
                           <li class="sender clearfix">
                            <span  class="chat-img left clearfix mx-2">
                                @if (!$message->user->avatar == null)
                                <img style="width:100%;border-radius:50px;" class="image-size" src="{{ Storage::url($message->user->avatar) }}">
                                @else
                                <img style="width:100%;border-radius:50px;" class="image-size" src="/img/man.jpg">
                                @endif
                            </span>
                            <div class="chat-body2 clearfix">
                                <div class="header clearfix">
                                    <strong class="primary-font">
                                        {{$message->user->name}}
                                    </strong>
                                    <small class="right text-muted">
                                        <span class="glyphicon glyphicon-time"><br>
                                            {{ $message->created_at->format('d/m/Y')}}
                                        </span>     
                                    </small>
                                </div>
                                @if($message->ad_id == null)
                                     <p class="text-center"></p>
                                @else
                                    <a href="{{route('product.view',[$message->ads->id,$message->ads->slug])}}" target="_blank"><p class="text-center"><img src="{{Storage::url($message->ads->feature_image)}}" style="width: 100%;"></p></a>
                                @endif
                                 <p id="txtComments" value="{{$message->receiver_id}}">{{$message->body}}</p>
                            </div>
                          </li>
                          
                            <li class="buyer clearfix" >  
                            <span class="chat-img right clearfix  mx-2">
                                @if (!$message->user->avatar == null)
                                <img style="width:100%;border-radius:50px;" class="image-size" src="{{ Storage::url($message->user->avatar) }}">
                                @else
                                <img  style="width:100%;border-radius:50px;" class="image-size" src="/img/man.jpg">
                                @endif
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header clearfix">
                                    <strong class="right primary-font">
                                        {{$message->user->name}}
                                     </strong>
                                    <small class="left text-muted">
                                    <span class="glyphicon glyphicon-time"><br>
                                        {{ $message->created_at->format('d/m/Y')}}
                                    </span>
                                    </small>
                                </div>
                                @if($message->ad_id == null)
                                     <p class="text-center"></p>
                                @else
                                    <a href="{{route('product.view',[$message->ads->id,$message->ads->slug])}}" target="_blank"><p class="text-center"><img src="{{Storage::url($message->ads->feature_image)}}" style="width:37px;"></p></a>
                                @endif
                                <p id="txtComments" value="{{$message->receiver_id}}">{{ $message->body }}</p>
                            </div>
                        </li>
                        
                        <li class="sender clearfix">
                            <span class="chat-img left clearfix mx-2"> </span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <input
                            name="body"
                            id="btn-input"
                            type="text"
                            class="form-control input-sm"
                            placeholder="Type your message here..."
                            required
                        />
                        <span class="input-group-btn">
                             <button class="btn btn-primary send">Send</button></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
     setInterval(function() {
        window.location.reload();
    }, 15000);
    var objDiv = document.getElementById("sc");
objDiv.scrollTop = objDiv.scrollHeight; 
</script>
@endsection
  