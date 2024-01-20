<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/thrs.jpg') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <title>tHRS Admin | Login</title>
</head>
<!-- /.login-box -->

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="">
                <div class="row g-0">

                    <div
                        class="col-12 col-xl-7 col-xxl-8 auth-cover-left bg-gradient-burning align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/login-images/login-cover.svg') }}"
                                    class="img-fluid auth-img-cover-login" width="650" alt="" />
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                            <div class="card-body p-sm-5">
                                <div class="">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('assets/images/thrs.jpg') }}" width="150" alt="">
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">tHONTHRON HR System</h5>
                                        <p class="mb-0">Please log in to your account</p>
                                    </div>
                                    <div class="form-body">
                                      <form class='needs-validation row g-3' novalidate action="{{ route('business.business.login') }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3 col-12">
                                          <input type="email" name="email" class="form-control" placeholder="Email" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-envelope"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="input-group mb-3 col-12">
                                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-lock"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          
                                          <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
</body>
<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</html>

{{-- <form class="row g-3">
  <div class="col-12">
      <label for="inputEmailAddress" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmailAddress"
          placeholder="jhon@example.com">
  </div>
  <div class="col-12">
      <label for="inputChoosePassword" class="form-label">Password</label>
      <div class="input-group" id="show_hide_password">
          <input type="password" class="form-control border-end-0"
              id="inputChoosePassword" value="12345678"
              placeholder="Enter Password"> <a href="javascript:;"
              class="input-group-text bg-transparent"><i
                  class="bx bx-hide"></i></a>
      </div>
  </div>
  
  <div class="col-12">
      <div class="d-grid">
          <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
  </div>
  
</form> --}}
{{-- <form class='needs-validation' novalidate action="{{ route('admin.admin.login') }}" method="post">
  @csrf
  <div class="input-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-envelope"></span>
      </div>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  <div class="row">
    
    <div class="col-12">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
  </div>
</form> --}}
