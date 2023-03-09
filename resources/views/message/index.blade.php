@extends('layouts.app')
@section('content')
 <div class="container"> 
    <div class="row">
        <div class="col-md-10">   
            <h2>Chat Messages</h2>
            <div class="card text-center">
                <div class=""> 
                    @if($users->count()) 
                    @foreach ($users as $user)
                    <a class="nav-link" href="{{route('show-chat',$user->id)}}">
                        @if ($user->avatar == null)
                        <img style="width:10%;border-radius:50px;" class="mx-auto d-block img-thumbnail" src="/img/man.jpg" width="20%">
                        @else
                        <img style="width:10%;border-radius:50px;" src="{{Storage::url($user->avatar)}}">
                        @endif
                         <p>{{$user->name}} 
                         <i class="fa-solid fa-message" style="font-size:16px;color:green;"></i></p><br>
                       @endforeach
                    </a>
                    @else
                    <p>Not have massage</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
