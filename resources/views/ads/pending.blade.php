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
        <div class="row ">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-9"  style="overflow-y: scroll;">
                @include('backend.inc.message')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @forelse($ads as $key =>$ad)
                            <tr>

                                <th scope="row">{{ $key + 1 }}</th>
                            <td>
                            <a href="{{route('product.view',[$ad->id,$ad->slug])}}" target="_blank" >{{$ad->name}}</a>
                                
                            </td>
                            <td>
                            <a href="{{route('ads.edit',$ad->id)}}">Edit</a>
                            </td>

                            </tr>
                        @empty
                            <td>You have no any pending ads</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
