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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper d-flex align-items-center responsive_style">

                    <div class="col-sm-12 col-lg-12 mx-auto">
                        {{-- <div class="text-center">
                    <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                </div> --}}
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-sm-12 col-lg-6 card" style="background: transparent; border:none;">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-4 mt-3 mb-3" style="background: transparent;">
                                        <h4 class="">Artists</h4>
                                        <ul style="list-style: none;">
                                            @forelse ($artists as $artist)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-sm-3 mb-1 mt-1"> <a
                                                                href="{{ route('voteArtist', [$artist->id]) }}"
                                                                class="btn btn-sm btn-primary">Vote</a></div>
                                                        <div class="col-sm-3 mb-1 mt-1"> <button
                                                                class="btn btn-sm btn-info">&nbsp;{{ strtoupper($artist->name) }}&nbsp;</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li> <span>No Approved Artists yet</span></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="col-lg-4"></div>
                                    <div class="col-sm-6 col-lg-4" style="background: transparent;">
                                        <h4 class="mb-1">SportStars</h4>
                                        <ul style="list-style: none;">
                                            @forelse ($sportstars as $sportstar)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-sm-3 mb-1 mt-1"> <a
                                                                href="{{ route('voteArtist', [$sportstar->id]) }}"
                                                                class="btn btn-sm btn-primary">Vote</a></div>
                                                        <div class="col-sm-3 mb-1 mt-1"> <button
                                                                class="btn btn-sm btn-info">&nbsp;{{ strtoupper($sportstar->name) }}&nbsp;</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li> <button class="btn btn-info">&nbsp; No Approved SportStars yet
                                                        &nbsp;</button></li>
                                            @endforelse
                                        </ul>
                                    </div>

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
