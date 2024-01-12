<!DOCTYPE html>
<html lang="en">

<head>
    <title>:: AURANGABAD MUNICIPAL CORPORATION | Birth Certificate</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('public/css/mystyle.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="mybg">


    <div class="hed_bgcc">
        <nav class="navbar navbar-expand-sm   p-0">

            <div class="container-fluid  ">

                <div class="col-md-12 d-flex align-items-center justify-content-between">
                    <div class=" text-start">
                        <img src="{{ asset('public/images/aurangabad.png') }}" class="img-fluid" width="80">
                    </div>
                    <div class=" text-center hed_tt">
                        <h2>AURANGABAD MUNICIPAL CORPORATION </h2>
                    </div>

                    <div class=" text-end">
                        <img src="{{ asset('public/images/aurangabad_smartcity.png') }}" class="img-fluid"
                            width="80">
                    </div>
                </div>

            </div>

        </nav>

    </div>

    <div class="container" style="margin-top:20px">

        <div class="text-center">
            <h4> LOGIN </h4>
        </div>

        <div class="wrapper">

            {{-- <ul class="nav nav-pills" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link  rounded-0" data-bs-toggle="pill" href="#home"><strong>User ID
                        </strong></a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link active rounded-0" data-bs-toggle="pill" href="#menu1"><strong>Mobile
                            Number</strong></a>
                </li>

            </ul> --}}

            <div class="tab-content">
                {{-- <div id="home" class="  tab-pane fade"><br>
                    @if (session()->has('wrong'))
                        <div class="alert alert-danger">
                            <strong>Error!</strong> {{ session()->get('wrong') }}
                        </div>
                    @endif
                    <form class="" name="LoginForm" method="POST" action="{{ route('checkLogin') }}"
                        autocomplete="off">
                        @csrf
                        <div class="form-field d-flex align-items-center">
                            <span class="fa-sharp fa-solid fa-user"></span>

                            <input type="text" name="userName" id="userName" placeholder="Username"
                                autocomplete="off" required>
                        </div>
                        <label id="userName-error" class="error" for="userName"></label>
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="password" name="password" id="pwd" placeholder="Password"
                                autocomplete="off" required>
                        </div>
                        <label id="pwd-error" class="error" for="pwd"></label>

                        <button class="btn mt-3" type="submit"><strong> LOGIN </strong></button>

                        <div class="text-center d-flex justify-content-between fs-6 mt-2">
                            <a href="#"><i class="fa fa-user "></i> &nbsp; New user registration</a>
                            <a href="#">Forgot Password?</a>
                        </div>
                    </form>
                </div> --}}


                <div id="menu1" class=" tab-pane active">
                    <br>
                    @if (session()->has('wrong'))
                        <div class="alert alert-danger">
                            <strong>{{ session()->get('wrong') }}</strong> 
                        </div>
                    @endif
                    <form class="" name="getOTP" method="POST" action="{{ route('getOTPNumber') }}"
                        autocomplete="off">
                        @csrf
                        <div class="form-field d-flex align-items-center">
                            <span class="fa-solid fa-mobile"></span>

                            <input type="text" name="mobile" id="userName" placeholder="Enter Mobile Number"
                                autocomplete="off" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                        </div>
                        <label id="userName-error" class="error" for="userName"></label>
                        {{-- <div class="form-field d-flex align-items-center">

                            <input type="number" name="otp" id="userName" placeholder="Enter OTP"
                                autocomplete="off">
                        </div> --}}

                        {{-- <div class="text-end">
                            <a href="#"> Resend OTP </a>
                        </div> --}}

                        <button class="btn mt-3"><strong> Send OTP </strong></button>
                    </form>
                </div>

            </div>





   



        </div>



    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
  $(function() {
      $("form[name='getOTP']").validate({
          rules: {
             
              mobile: {
                      required: true,
                      minlength: 10,
                      maxlength: 10
                  }
            

          },
          messages: {
           
              mobile: {
                      required: "Enter Mobile Number",
                      minlength: "Enter 10 digit valid Mobile Number",
                      maxlength: "Enter 10 digit valid Mobile Number",
                  },
           
            
          },
          submitHandler: function(form) {
              form.submit();
          }
      });
  });
</script>



</html>
