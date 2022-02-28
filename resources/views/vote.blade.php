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

        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


        .btn-vote {
            position: relative;
            font-family: 'Roboto', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            border: none;
            border-radius: 10px;
            background-color: #f1ede5;

            width: 10rem;
            height: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .follow {
            width: 100%;
            height: 100%;

            background-color: #1d2938;
            color: #cfd2d6;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            z-index: 1;
            transition: transform 0.5s ease;
        }

        .thanks {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #d4ae63;
            color: black;
            font-weight: 500;

            display: flex;
            justify-content: center;
            align-items: center;
            transform: scale(0.5);
            transition: transform 0.5s ease;
        }

        .btn-vote:hover>.follow {
            transform: translateX(-100%);
        }

        .btn-vote:hover>.thanks {
            transform: scale(1);
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
            <div class="row">
                <div class="containter">
                    <div class="col-sm-6 mx-auto text-center">
                        <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="content-wrapper d-flex align-items-center responsive_style">

                    <div class="col-sm-12 col-lg-12 mx-auto">
                        {{-- <div class="text-center">
                    <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                </div> --}}
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 card" style="background: transparent; border:none;">
                                <div class="row">
                                    <div class="col-sm-12 mx-auto mt-3 mb-3"
                                    style="background: transparent;">
                                    <h3 style=" font-size:50px;font-weight:bold;color:#000;">WELCOME TO THE TUSKER
                                        NEXTERS VOTING PLATFORM</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center mt-3 mb-3"
                                    style="background: transparent;">
                                    <h4 class="mb-5" style="color: #fff;">Select Your Voting
                                        Category</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-lg-4"></div> --}}
                            <div class="col-sm-12 col-lg-6 mx-auto card" style="background: transparent; border:none;">
                                <div class="row">
                                    <div class="col-sm-12 text-center mx-auto mt-3 mb-3"
                                        style="background: transparent;">
                                        {{-- <h4>Select Category Below</h4> --}}
                                        <div class="text-center">
                                            <a href="{{ route('voting.artists') }}"><button class="btn-vote"
                                                    style="">
                                                    <span class="follow">Artists
                                                    </span>
                                                    <span class="thanks">Click! 😊
                                                    </span>
                                                </button>
                                            </a>
                                            <br>
                                            <a href="{{ route('voting.sportstars') }}"><button class="btn-vote"
                                                    style="">
                                                    <span class="follow">SportStars
                                                    </span>
                                                    <span class="thanks">Click! 😊
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
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
