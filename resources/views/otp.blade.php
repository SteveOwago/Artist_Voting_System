{{-- @extends('layouts.app')

@section('content')<div class="card">
                <div class="card-header">OTP Verification</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('otp.post') }}">
                        @csrf

                        <p class="text-center text-success">We sent code to your phone : {{ substr(auth()->user()->phone, 0, 5) . '******' . substr(auth()->user()->phone,  -2) }}</p>

                        @if ($message = Session::get('success'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>

                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('otp.resend') }}">Resend Code?</a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    @include('partials.head')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        input {
            width: 400px;
            padding: 3em;
            border: 1px solid silver;
            /* <-- Override default border */
        }

        input::placeholder {
            color: rgb(252, 244, 244);
        }
        /* Media Screen Desktop/Laptop */
        @media only screen and (min-device-width: 1200px) and (max-device-width: 3000px) and (-webkit-min-device-pixel-ratio: 1) {
            .responsive_style {
                background: url("{{ asset('frontend/images/web-1920.png') }}") no-repeat center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }
/* Media Screen Tablet */
        @media only screen and (min-device-width: 500px) and (max-device-width: 1199px) and (-webkit-min-device-pixel-ratio: 1) {
            .responsive_style {
                background: url("{{ asset('frontend/images/ipad-view.png') }}") no-repeat center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }
/* Media Screen Phone */
        @media only screen and (min-device-width: 200px) and (max-device-width: 499px) and (-webkit-min-device-pixel-ratio: 1) {
            .responsive_style {
                background: url("{{ asset('frontend/images/mobile-view.png') }}") no-repeat center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller responsive_style">
        <div class="container-fluid page-body-wrapper full-page-wrapper responsive_style">
            <div class="row w-100">
                <div class="content-wrapper d-flex align-items-center responsive_style">

                    <div class="col-sm-12 col-lg-6 mx-auto">
                        @if(session('message'))
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                                </div>
                            </div>
                        @endif
                        @if($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card" style="background-color: #fafa98;">
                            <div class="card-header"><h4>OTP Verification</h4></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('otp.post') }}">
                                    @csrf

                                    <p class="text-center text-success">We sent code to your phone : {{ substr(auth()->user()->phone, 0, 5) . '******' . substr(auth()->user()->phone,  -2) }}</p>

                                    @if ($message = Session::get('success'))
                                        <div class="row">
                                          <div class="col-md-12">
                                              <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                  <strong>{{ $message }}</strong>
                                              </div>
                                          </div>
                                        </div>
                                    @endif

                                    @if ($message = Session::get('error'))
                                        <div class="row">
                                          <div class="col-md-12">
                                              <div class="alert alert-danger alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                  <strong>{{ $message }}</strong>
                                              </div>
                                          </div>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>

                                        <div class="col-md-6">
                                            <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <a class="btn btn-link" href="{{ route('otp.resend') }}">Resend Code?</a>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('partials.scripts')
    <!-- endinject -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>



