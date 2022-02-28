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

                    <div class="col-sm-12 col-lg-12 mx-auto">
                        {{-- <div class="text-center">
                    <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                </div> --}}
                        <div class="row">

                            <div class="col-sm-12 col-lg-4 mx-auto mt-3 mb-3" style="background: transparent;">
                                <h2 class="text-center">Sportstars</h2>
                                <ul style="list-style: none;">
                                    <div class="col-sm-12mb-2 mt-2" style="background:rgba(253, 174, 3, 0.5)">
                                        <br>
                                        @forelse ($sportstars as $sportstar)
                                            <li>
                                                <div class="row mt-2 mx-auto">
                                                    <div class="col-sm-3">
                                                        <img src="{{ asset('profile_pictures/') . '/' . $sportstar->profile }}"
                                                            alt="" height="50px" width="50px"
                                                            style="border-radius: 30%;">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h4 style="color:#fff;">{{ strtoupper($sportstar->name) }}
                                                        </h4>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <a href="{{ route('voteArtist', [$sportstar->id]) }}"
                                                            class="btn btn-success mt-2">Vote</a>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-3 mb-1 mt-1"> <a
                                                                href="{{ route('votesportstar', [$sportstar->id]) }}"
                                                                class="btn btn-sm btn-primary">Vote</a></div>
                                                        <div class="col-sm-3 mb-1 mt-1"> <button
                                                                class="btn btn-sm btn-info">&nbsp;{{ strtoupper($sportstar->name) }}&nbsp;</button>
                                                        </div> --}}

                                            </li>
                                            <hr>
                                        @empty
                                            <li style="color:#fff;"> <span>No Approved sportstars yet</span></li>
                                        @endforelse
                                    </div>
                                </ul>
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
