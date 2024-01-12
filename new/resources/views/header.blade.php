<!DOCTYPE html>
 


<html lang="en">
<head>
  <title>:: AURANGABAD MUNICIPAL CORPORATION | Birth Certificate</title>
  <meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
	
	<link href="{{ asset('public/css/mystyle.css') }}" rel="stylesheet">
	
	<link href="{{ asset('public/css/responsive.css')}}" rel="stylesheet">
	<style>
        .error {
            color:red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        //  alert("ggg");
            $(".lblmrt").hide();
        
        });
         </script>
</head>
	<?php 
     $uriSegment = Request::segment(1); 
     if($uriSegment == "birth-certificate"){
        $bg_img = "";

    }else{
        $bg_img = "mybg";
    }

    ?>
<body class="">

 
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
					<img src="{{ asset('public/images/aurangabad_smartcity.png') }}" class="img-fluid" width="80">
				</div>
			  </div>

		  </div>

</nav>
		
		</div>
		
		<div class="w-100 mt_100 bg_gray"  >
          <div class="container">
             <div class="navbar_cm"> 
    <div class="navbar_right mm_flx justify-content-between align-item-center w-100">
       
       <div class="mt-1">
           
       {{-- Home >> HEALTH DEPARTMENT SERVICES --}}
            
       </div>
       
       <div class="profile">
        <div class="icon_wrap">
          <img src="{{ asset('public/images/user.png')}}" alt="profile_pic">
          <span class="name">
             <small>Welcome to</small> <br>
           {{  Session::get('username') }}
              </span>
          <i class="fas fa-chevron-down"></i>
        </div>

        <div class="profile_dd">
          <ul class="profile_ul">
            <li class="">
                <a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i>
                </span>Profile</a>
              <!--<div class="btn">My Account</div>-->
            </li>
            <li><a class="address" href="#"><span class="picon"><i class="fas fa-cog"></i></span>My Account</a></li>
            <li><a class="settings" href="#"><span class="picon"><i class="fas fa-file"></i></span>My Application</a></li>
            <li><a class="logout" href="{{ url('logout') }} "><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
          </ul>
        </div>
      </div>
      
    </div>
  </div>
  
        </div>
  
        </div>
       