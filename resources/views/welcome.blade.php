<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    @include('partials.head')
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper d-flex align-items-center" style="background: url({{ asset('frontend/images/landing_page.png') }}) no-repeat center center fixed;
                                                                        -webkit-background-size: cover;
                                                                        -moz-background-size: cover;
                                                                        -o-background-size: cover;
                                                                        background-size: cover;">
                    <div class="col-sm-6 col-lg-4 mx-auto">
                        @if (\Carbon\Carbon::now()->month == 02 || \Carbon\Carbon::now()->month == 03)
                            <div class="text-center">
                                <a href="{{ route('register') }}" style="background-color: rgb(51, 196, 196);"
                                    class="btn btn-lg btn-success">
                                    <h4>Register</h4>
                                </a>
                            </div>
                        @endif
                        @if (\Carbon\Carbon::now()->month == 04 || \Carbon\Carbon::now()->month == 05)
                            <div class="text-center">
                                <a href="{{ route('vote') }}" style="background-color: rgb(51, 196, 196);"
                                    class="btn btn-lg btn-success">
                                    <h4>Vote Now</h4>
                                </a>
                            </div>
                        @endif
                        {{-- <div class="card-body px-5 py-5">
                        </div> --}}
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <div class="modal fade" id="ageConsent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color: #fafa98;">
            <div class="modal-header text-center">
              <h3 class="modal-title  text-dark" id="exampleModalLabel">Can You Show Us Some ID?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12 text-center">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="date">Enter Your Birthdate</label>
                                    <input type="date" class="form-control" name="date" id="">
                                </div>
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    @include('partials.scripts')
    <!-- endinject -->
    <script>
        $(document).ready(function() {
            $('#ageConsent').modal('show');
        });
    </script>
</body>

</html>
