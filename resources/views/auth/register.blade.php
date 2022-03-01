<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    @include('partials.head')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                background: url("{{ asset('frontend/images/laptop.png') }}") no-repeat center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }

        /* Media Screen Tablet */
        @media only screen and (min-device-width: 500px) and (max-device-width: 1199px) and (-webkit-min-device-pixel-ratio: 1) {
            .responsive_style {
                background: url("{{ asset('frontend/images/tablet.png') }}") no-repeat center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }

        /* Media Screen Phone */
        @media only screen and (min-device-width: 200px) and (max-device-width: 499px) and (-webkit-min-device-pixel-ratio: 1) {
            .responsive_style {
                background: url("{{ asset('frontend/images/phone.png') }}") no-repeat center fixed;
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper d-flex align-items-center responsive_style">
                    <div class="col-sm-12 col-lg-4 mx-auto">
                        {{-- <div class="card text-center justify-content-center"
                        ></div> --}}

                        <div class="row text-center">
                            <h3 class="mb-5" style=" font-size:50px;font-weight:bold;color:#000;">WELCOME TO
                                THE TUSKER
                                NEXTERS PLATFORM</h3>
                        </div>
                        @if (session('message'))
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                                </div>
                            </div>
                        @endif
                        @if ($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card" style="background-color: #fafa98;">
                            <div class="card-header text-center">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body text-center justify-content-center px-5 py-5">
                                <form method="POST" action="{{ route('register_user') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="FirstName LastName" autofocus>

                                            {{-- @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $error }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <input id="id_number" type="id_number"
                                                class="form-control @error('id_number') is-invalid @enderror"
                                                name="id_number" required
                                                placeholder="ID NUMBER" autocomplete="id_number">

                                            {{-- @error('id_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $error }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" required placeholder="2547XXXXXXXX"
                                                autocomplete="phone">

                                            {{-- @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $error }}</strong>
                                                </span>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <select name="region_id" class="form-control" required>
                                                <option selected disabled>---Select Your Region---</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}">
                                                        {{ strtoupper($region->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <select name="activity_id" class="form-control" required>
                                                <option selected disabled>---Select Activity/Audition---</option>
                                                @foreach ($activities as $activity)
                                                    <option value="{{ $activity->id }}">
                                                        {{ strtoupper($activity->title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <select name="role_id" class="form-control" required>
                                                <option selected disabled>---Select Type---</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">
                                                        {{ strtoupper($role->title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    {{-- <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required placeholder="Password"
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    {{-- <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" placeholder="Confirm Password" required
                                                autocomplete="new-password">
                                        </div>
                                    </div> --}}

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="consent"
                                                    id="consent">
                                                <a class="form-check-label  @error('consent') is-invalid @enderror">
                                                    Do you agree To Tusker Cenetary Terms & Conditions
                                                </a>
                                                @error('consent')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-warning">
                                                {{ __('Register') }}
                                            </button>
                                            &nbsp; <a class="btn btn-link" href="{{ route('login') }}">
                                                {{ __('Login?') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
