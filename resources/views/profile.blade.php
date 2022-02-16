@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')

{{-- Profile --}}
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ $user->name }}</h4>
        <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <img src="/profile_pictures/{{$user->profile}}" width="200" height="200" style="border-radius:50%;" alt="Profile Image Avatar">
                        </div>
                        @if($user->video != null &&(Auth::id() == $user->id|| $user->role_id == 1))
                            <div class="row mt-5">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <video class="embed-responsive-item" controls controlsList="nodownload">
                                        <source src="/video_uploads/{{$user->video}}">
                                    </video>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-9">
                            {{-- <table class="table-bordered table-striped">
                                <tr>
                                    <div class="col-md-6">
                                        <th>Name :</th>
                                    </div>
                                    <div class="col-md-6">
                                        <td>{{$user->name}}</td>
                                    </div>  
                                </tr>
                                <tr>
                                    <div class="col-md-6">
                                        <th>Email:</th>
                                    </div>
                                    <div class="col-md-6">
                                        <td>{{$user->email}}</td>
                                    </div>   
                                </tr>
                                <tr>
                                    <div class="col-md-6">
                                        <th>Phone:</th>
                                    </div>
                                    <div class="col-md-6">
                                        <td>{{$user->phone}}</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-6">
                                        <th>Registered:</th>
                                    </div>
                                    <div class="col-md-6">
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-6">
                                        <th>Status:</th>
                                    </div>
                                    <div class="col-md-6">
                                        <td class="{{ $user->is_approved == '1'?"text-success":"text-danger"}}">{{ $user->is_approved == '1'?"Aproved":"Not Approved"}}</td>
                                    </div>              
                                </tr>
                            </table> --}}
                            <div class="card">
                                <div class="card-header">
                                    {{strtoupper($user->name)}}
                                </div>
                                <div class="card-body  text-dark">
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Email:</b> {{$user->email}}</li>
                                        <li class="list-group-item"><b>Phone:</b> {{$user->phone}}</li>
                                        <li class="list-group-item"><b>Registered:</b> {{$user->created_at->diffForHumans()}} </li>
                                        <li class="list-group-item"><b>Type:</b> {{$user->role_id == 1 ? "Judge":($user->role_id == 2?"Artist":"Gamer")}} </li>
                                        @if($user->role_id != 1 )
                                            <li class="list-group-item"><b>Status:</b> <a class="btn btn-sm {{$user->is_approved == '1'?"text-success":"text-danger"}}">{{ $user->is_approved == '1'?"Approved":"Not Approved"}}</a></li>
                                        @endif
                                    </ul>
                                    @if (Auth::id()== $user->id)
                                        <div class="text-center">
                                            <a href="{{route('edit_profile',[$user->id])}}" class="btn btn-lg btn-primary mt-3">Edit</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                    @if ($user->is_approved == 0 && Auth::user()->role_id == 1)
                        <div class="row text-center ml-5 mt-5">
                            <a class="btn btn-lg btn-success" href="{{ route('approve',[$user->id])}}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('approve').submit();">
                                            Approve
                                        </a>

                                        <form id="approve" action="{{ route('approve',[$user->id]) }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                        </div>   
                    @endif

                    @if ($user->is_approved == 1 && Auth::user()->role_id == 1)
                        <div class="row text-center ml-5 mt-5">
                            <a class="btn btn-lg btn-danger" href="{{ route('disapprove',[$user->id])}}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('disapprove').submit();">
                                            Disapprove
                                        </a>

                                        <form id="disapprove" action="{{ route('disapprove',[$user->id]) }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                        </div>   
                    @endif
                    
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- End of registered Users --}}

@endsection