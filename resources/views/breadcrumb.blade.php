<style>
      ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
  }
  ul.breadcrumb li {
    display: inline;
    font-size: 18px;
  }
  ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
  }
  ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
  }
  ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
  }  

</style>

<div>
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">Home</a> >
        </li>
        <li>
          @for($i=2; $i<= count(Request::segments());$i++)
          @if($i<count(Request::segments()) & $i>0)
          <a href="{{URL::to(implode('/',array_slice(Request::segments(),0,$i,true)))}}">{{ucwords(Request::segment($i))}}</a>
          @else   
          {{ucwords(str_replace('-',' ',Request::segment($i)))}}
          @endif
      @endfor
        </li>
    </ul>
</div>