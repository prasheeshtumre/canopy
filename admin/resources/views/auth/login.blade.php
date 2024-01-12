
<!DOCTYPE html>
<html lang="en">
<head>

    <title>:: Canopy | Login</title>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->

    <link href="{{asset('public/assets/css/bootstrapcss.css')}} " rel="stylesheet" />

    <!-- Fontawesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

    <!-- Animations -->

    <link href="{{asset('public/assets/css/Animations.css')}} " rel="stylesheet" />

    <!-- Font family -->

 <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


     <!--Datatables CSS-->

    <link href="css/datatables.css" rel="stylesheet" />

      <!-- Canoply links -->
  
    <script src=
'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script>
  
    <script src=
'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
    </script>

     <!-- Canoply links End-->

    <!--Extra CSS-->

    <link href="{{asset('public/assets/css/extracss.css')}} " rel="stylesheet" />

    <style>

    </style>

    <script>



    </script>

</head>

<body>

    <!-- Header -->


    <nav class="navbar navbar-expand-md navbar-dark">

        <!-- Brand -->

        <a class="navbar-brand" href="index.html"><img src="{{asset('public/assets/images/logo-canopy1.png')}}" class=""></a>

        <!-- Toggler/collapsibe Button -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span><i class="fas fa-bars"></i></span>
        </button>

        <!-- Navbar links -->

        <!--<div class="collapse navbar-collapse" id="collapsibleNavbar">-->
        <!--    <ul class="navbar-nav margin-nav">-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">About Canopy</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">How We Help</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">Products</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">Online Wellness</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--       <span class="bg-online-inner menu-right">-->
        <!--        <ul class="navbar-nav">-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">Online Portal</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="signup.html">Sign Up</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--    </span>-->
        <!--</div>-->
        
        
    </nav>


    <!-- End Of Header -->


    <!-- Content -->
<div class="bg-body">
<div class="container">
       <div class="row align-items-center">
           <div class="col-lg-8 col-md-8 col-sm-8 col-12 text-center">
        <img src="{{asset('public/assets/images/about-canopy-home-6.jpg')}} " class="img-fluid" style="width: 80%;">
       </div>
       
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 clr-lightgray mt20">
            <div class="sign-up">
                <p> Please login to your account</p> <br>
                <!--<form class="mt10">-->
                <!--    <label><b>Email Address</b></label>-->
                <!--    <span class="icons-for-form"><i class="fas fa-envelope"></i></span>-->
                <!--    <input type="email" placehlder="enter your email" name="" id="" class="form-control input-p">-->
                <!--    <label class="mt10"><b>Password</b></label>-->
                <!--    <span class="icons-for-lock"><i class="fas fa-lock"></i></span>-->
                <!--    <input type="pwd" placehlder="enter your password" name="" id="" class="form-control input-p">-->
                <!--    <div class="check-reme">-->
                <!--    <input type="checkbox" class="float-left"><label>Remember me</label>-->
                <!--    <a href="#"><span class="float-right">forget password?</span></a>-->
                <!--    </div>-->
                <!--    <a href="after-login.html"><button class="btn btn-sign-up">Sign in</button></a>-->
                <!--</form>-->
                
                 <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label"><b>Email </b></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <!--<div class="float-end">-->
                                            <!--    @if (Route::has('password.request'))-->
                                            <!--        <a class="text-mute" href="{{ route('password.request') }}">-->
                                            <!--            {{ __('Forgot Your Password?') }}-->
                                            <!--        </a>-->
                                            <!--    @endif-->
                                                <!--<a href="#" class="text-muted">Forgot password?</a>-->
                                            <!--</div>-->
                                            <label class="form-label" for="password-input"><b>Password</b></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror pe-5 password-input" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-sign-up w-100" type="submit">Sign In</button>
                                        </div>
                                  </form>

            </div>
            
       </div>
       
</div>
</div>

    <!-- End Of Content -->



    <!-- Footer -->


    <div class="container-fluid p0 footer">


    </div>



    <!-- End Of Footer -->
    <!-- All scripts -->
    <!-- jQuery library -->

    <script src="{{asset('public/assets/js/jquery.js')}}"></script>

    <!-- Bootstrap JavaScript -->

    <script src="{{asset('public/assets/js/bootstrapjs.js')}}"></script>

    <!--Popups js-->

    <script src="{{asset('public/assets/js/popperjs.js')}} "></script>

    <!--Datatables js-->

    <script src="{{asset('public/assets/js/datatables.js')}}"></script>


    <!-- Extra js -->

    <script src="{{asset('public/assets/js/extrajquery.js')}}"></script>

<!-- Jquery datepickers -->

  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("show");
         });
      </script>


</body>

</html>