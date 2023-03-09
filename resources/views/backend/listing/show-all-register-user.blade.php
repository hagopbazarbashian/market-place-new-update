@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Manage All User</h4>
            <div class="row justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table"> 
                                    <thead>
                                        <tr>
                                            <th>User</th> 
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($Users as $User)
                                        @if($User->isadmin == false)
                                            <tr>
                                                <td>
                                                    @if ($User->avatar)
                                                        <img src="{{ Storage::url($User->avatar) }}" width="120">
                                                    @else
                                                        <img src="/img/man.jpg" width="120">
                                                    @endif
                                                    <a target="_blank"
                                                        href="/user/{{$User->id}}/view">{{$User->name}}</a>
                                                </td>

                                                <td>
                                                    <a target="_blank"
                                                        href="/user/{{$User->id}}/view">
                                                        <button class="btn btn-primary">View</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{$User->id}}">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
 
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $User->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{route('delete-all-user',$User->id)}}" method="post">
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
                                                                        <p> Are you sure you want to delete this User ?</p>

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
                                        @endif
                                        @empty
                                            <td>No ads to display</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                {{ $Users->links() }}
            </div>
        @endsection
