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
          <div class="content-wrapper d-flex align-items-center" style="background: url({{asset('frontend/images/landing_page.jpg')}});background-size: cover;">
            <div class="col-lg-4 mx-auto">
                <div class="text-center">
                    <a href="{{route('vote')}}" style="background-color: rgb(51, 196, 196);" class="btn btn-lg btn-success"><h4>Vote Now</h4></a>
                </div>
                <div class="card-body px-5 py-5">
                    {{-- <form>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control p_input">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control p_input">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control p_input">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div>
                        <a href="#" class="forgot-pass">Forgot password</a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-facebook col mr-2">
                        <i class="mdi mdi-facebook"></i> Facebook </button>
                        <button class="btn btn-google col">
                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                    </div>
                    <p class="sign-up text-center">Already have an Account?<a href="#"> Sign Up</a></p>
                    <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                    </form> --}}
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