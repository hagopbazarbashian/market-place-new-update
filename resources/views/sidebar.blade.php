<div class="card">
    <div class="card-body ">
        @if(!auth()->user()->avatar)
            <img src="/img/man.jpg" width="100%" alt="..." class="rounded-circle">
        @endif 
        @if(auth()->user()->avatar && !auth()->user()->fb_id)
            <img src="{{Storage::url(auth()->user()->avatar)}}" width="100%" alt="..." class="rounded-circle">
        @endif
        @if(auth()->user()->fb_id)   
            <img src="/public{{Storage::url(auth()->user()->avatar)}}" style="width:100%;">
        @endif
    <p class="text-center"><b>{{auth()->user()->name}}</b></p>
    </div>
    <hr style="border:2px solid blue;">
    <div class="vertical-menu">
        <div class="vertical-menu">
            <a href="#">Dashboard</a>
            <a href="{{ route('profile') }}" class="{{ request()->is('profile')?'active':'' }}">Profile</a>
            <a href="{{ route('ads.create') }}" class="{{ request()->is('ads/create')?'active':'' }}">Create ads</a>
            <a href="{{ route('ads.index') }}" class="{{ request()->is('/ads')?'active':'' }}">Published ads</a>
            <a href="{{ route('pending.add') }}" class="{{ request()->is('/add-pending')?'active':'' }}">Pending ads</a>
            <a href="/chatify" class="{{ request()->is('message')?'active':'' }}">Message</a>
            <a href="{{ route('show.add') }}" class="{{ request()->is('ads/show-add')?'active':'' }}">Saved Ads</a>
        </div>
    </div>

</div>