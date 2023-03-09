@extends('layouts.app')
@section('content')
<style>
    .vertical-menu a {
        background-color: #fff;
        color: #000;
        display: block;
        padding: 12px;
        text-decoration: none;
    }

    .vertical-menu a:hover {
        background-color: red;
        color: #fff;
    }

</style>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card ">
                @include('sidebar')
            </div> 
            </div>
            <div class="col-md-9" style="overflow-y: scroll;">
                @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message')}}  
                </div>
                @endif
                @if(Session::has('delete'))
                <div class="alert alert-danger">
                {{ Session::get('delete')}}  
                </div>
                @endif

                <table class="table table-bordered"> 
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Staus</th>
                            <th scope="col">Edit</th>
                            <th scope="col">View</th>
                            <th scope="col">Delete</th> 
                        </tr>
                    </thead>  
                    <tbody>
                        @if($advertisements->count())
                        @foreach ($advertisements as $key=>$advertisement)
                        @if($advertisement->image->user_id == auth()->user()->id) 
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <th>{{ $advertisement->id }}</th>
                            <td style="width: 200px;height:130px;">
                                <div id="carouselExampleControls{{ $advertisement->image->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="/images/{{$advertisement->name}}" width="150">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls{{ $advertisement->image->id }}" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls{{ $advertisement->image->id }}" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </td>
                            <td>{{ $advertisement->image->name }}</td>
                            <td style="color: blue;">{{ $advertisement->image->price }}{{$advertisement->image->CurrencySymbol->symbol}}</td>
                            <td>
                                @if ($advertisement->image->published == true)
                                <span class="badge badge-success" style="color:green">Published</span>
                                @else
                                <span class="badge badge-danger" style="color:red">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('ads.edit',$advertisement->image->id) }}"> <button class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>
                            <a target="_blank" href="{{route('product.view',[$advertisement->image->id,$advertisement->image->slug])}}"><button class="btn btn-info">View</button></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Delete
                                </button>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                <form action="{{route('ads.delete',$advertisement->image->id)}}" method="post">@csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this item?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete it</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                        <script>
                        	window.SGPMPopupLoader=window.SGPMPopupLoader||{ids:[],popups:{},call:function(w,d,s,l,id){
                        		w['sgp']=w['sgp']||function(){(w['sgp'].q=w['sgp'].q||[]).push(arguments[0]);}; 
                        		var sg1=d.createElement(s),sg0=d.getElementsByTagName(s)[0];
                        		if(SGPMPopupLoader && SGPMPopupLoader.ids && SGPMPopupLoader.ids.length > 0){SGPMPopupLoader.ids.push(id); return;}
                        		SGPMPopupLoader.ids.push(id);
                        		sg1.onload = function(){SGPMPopup.openSGPMPopup();}; sg1.async=true; sg1.src=l;
                        		sg0.parentNode.insertBefore(sg1,sg0);
                        		return {};
                        	}};
                        	SGPMPopupLoader.call(window,document,'script','https://popupmaker.com/assets/lib/SGPMPopup.min.js','5d0327c332be');
                        </script>
                        @endif
                        @endforeach
                        @else
                        <td>You have no any ads</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
