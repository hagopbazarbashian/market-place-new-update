@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Reported Advertisements</h4>
            <div class="row justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>N</th>
                                            <th>User Name</th>
                                            <th>Ad Name</th>
                                            <th>Comment</th>
                                            <th>Like</th>
                                            <th>created_at</th>  
                                            <th>Delete</th>  
                                        </tr>   
                                    </thead>
                                    <tbody> 
                                        @if ($comments->count()) 
                                        @forelse($comments as $key=>$ad)
                                        <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$ad->user->name}}</td>
                                        <td>{{$ad->Advertisement->name}}</td>
                                        <td>{{$ad->comment_body}}</td>   
                                        <td>{{$ad->like}}</td>
                                        <td>{{$ad->created_at}}</td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $ad->ad_id }}">
                                                <i class="mdi mdi-delete"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $ad->ad_id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('remove-comment',$ad->id) }}" method="post">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> Are you sure you want to delete this comment ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Yes Delete
                                                                    it</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    @empty
                                        <td>No  any reported ads to display</td>
                                    @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>

                </div>
                {{ $comments->links() }}
            </div>
        @endsection
