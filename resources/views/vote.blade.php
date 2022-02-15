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
    </style>
</head>

<body>
    <div class="container-scroller" style="background-color: rgb(236, 169, 25);">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper d-flex align-items-center" style="background-color: rgb(236, 169, 25);">
                    
                    <div class="col-sm-12 col-lg-4 mx-auto">
                        {{-- <div class="text-center">
                    <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                </div> --}}
                        <div class="card-body text-center justify-content-center px-5 py-5"
                            style="background-color: rgb(211, 166, 44); border-radius:20px;">
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
                            <form action="{{route('submit_vote')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="FirstName   LastName" style="text-align:center">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                        placeholder="254 XXX XXX XX" style="text-align:center">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="id_number" type="text"
                                        class="form-control @error('id_number') is-invalid @enderror" name="id_number"
                                        value="{{ old('id_number') }}" required autocomplete="id_number" autofocus
                                        placeholder="ID Number" style="text-align:center">

                                    @error('id_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select class="form-control"
                                        name="region_id" id="region_id" required style="text-align:center">
                                        <option selected disabled>--- Select Region ---</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 mt-3 text-center"
                                style="background-color: rgb(173, 153, 38); border-radius:20px;">
                                        <div class="text-center mt-2">
                                            <h4>Who is Your Favourite Artist?</h4>
                                        </div>
                                        <select class="form-control mt-3 mb-5" name="artist_id" id="artist_id" required>
                                            <option selected disabled>--- Select Artist ---</option>
                                            @foreach ($artists as $artist)
                                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('artist')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $error }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Submit" style="background-color: rgb(51, 196, 196);"
                                    class="btn btn-lg btn-success form-control">
                                </div>
                            </form>
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
