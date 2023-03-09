
<div class="favorite-list-item">
    @if(auth()->user()->avatar)     
    <div  data-id="{{ $user->id }}" data-action="0" id="send-mail" value="{{ $user->id }}" class="avatar av-m send_mail_to_user"
        style="background-image: url({{Storage::url(auth()->user()->avatar)}});">
    </div>
    @else
    <div data-id="{{ $user->id }}" data-action="0" id="send-mail" value="{{ $user->id }}" class="avatar av-m send_mail_to_user"
        style="background-image: url('/img/man.jpg');">
    </div>
    @endif
    <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="{{ asset('js/sendemailtouser.js') }}"></script>
   