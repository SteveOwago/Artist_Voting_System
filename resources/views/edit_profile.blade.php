@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')



{{-- Registered Artists --}}
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Profile : {{strtoupper($user->name)}}</h4>
        <form method="POST" action="{{ route('update_profile',$user->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="profile" class="col-md-4 col-form-label text-md-end">Profile Picture</label>

                <div class="col-md-6">
                    <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{ old('profile') }}" autocomplete="profile">

                    @error('profile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if($user->role_id != 1)
            <div class="row mb-3">
                <label for="video" class="col-md-4 col-form-label text-md-end">Video</label>

                <div class="col-md-6">
                    <input id="video" type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" autocomplete="video">

                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @endif
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
{{-- End of registered Users --}}

@endsection
