@extends('layouts.app')
@section('content')
<div>
    <form  action="{{route('find-with-country')}}" method="post">
        @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header"style="justify-content: center;">
          <h5 class="modal-title">Search ad with locations</h5>
        </div>
        <div class="modal-body" style="text-align: center"> 
            <label for="file" class="mt-2"><b>Choose country</b></label>
            <div class="form-inline form-group mt-1">
                <div class="d-flex justify-content-between" style="justify-content: space-around !important;">
                    <div class="col-md-4">
                        <div class="form-group"></div>
                        <select class="form-control" name="country_id" required>
                            <option value=""> Select country</option>
                            @foreach ($countrys as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="justify-content: center;margin: 30px 0px 0px 9px;">
          <button  class="btn btn-primary" style=" background-color:#dc3545">Search</button>
        </div>
      </div>
    </div>
   </form>
  </div>
@endsection