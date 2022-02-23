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

    </style>
</head>

<body>
    <div class="container-scroller" style="background: url({{ asset('frontend/images/landing_page.png') }}) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper d-flex align-items-center" style="background: url({{ asset('frontend/images/landing_page.png') }}) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">

                    <div class="col-sm-12 col-lg-12 mx-auto">
                        {{-- <div class="text-center">
                    <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                </div> --}}
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 mt-3 mb-3" style="background: transparent;">
                                <ul style="list-style: none;">
                                    @forelse ($artists as $artist)
                                        <li>
                                            <div class="row text-center">
                                                <div class="col-sm-6 mb-1 mt-1"> {{ strtoupper($artist->name) }}</div>
                                                <div class="col-sm-6 mb-1 mt-1"> <a
                                                        href="{{ route('voteArtist', [$artist->id]) }}"
                                                        class="btn btn-sm btn-primary">Vote</a></div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>No Approved Artists yet</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="col-lg-4"></div>
                            <div class="col-sm-6 col-lg-4" style="background: transparent;">
                                <ul style="list-style: none;">
                                    @forelse ($artists as $artist)
                                        <li>
                                            <div class="row text-center">
                                                <div class="col-sm-6 mb-1 mt-1"> <a
                                                    href="{{ route('voteArtist', [$artist->id]) }}"
                                                    class="btn btn-sm btn-primary">Vote</a></div>
                                                <div class="col-sm-6 mb-1 mt-1"> {{ strtoupper($artist->name) }}</div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>No Approved Artists yet</li>
                                    @endforelse
                                </ul>
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
