<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{env('APP_NAME')}}</title>
    @include('partials.head')
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper d-flex align-items-center" style="background: url({{asset('frontend/images/landing_page.png')}}) no-repeat center center fixed;
                                                                        -webkit-background-size: cover;
                                                                        -moz-background-size: cover;
                                                                        -o-background-size: cover;
                                                                        background-size: cover;">
            <div class="col-lg-4 mx-auto">
                @if(\Carbon\Carbon::now()->month == 02||\Carbon\Carbon::now()->month == 03)
                  <div class="text-center">
                      <a href="{{route('register')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Register</h4></a>
                  </div>
                @endif
                @if(\Carbon\Carbon::now()->month == 04||\Carbon\Carbon::now()->month == 05)
                  <div class="text-center">
                      <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                  </div>
                @endif
                <div class="card-body px-5 py-5">
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
  </body>
</html>
