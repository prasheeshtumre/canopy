<!DOCTYPE html>
<html lang="en">
<head>
  <title>:: AURANGABAD MUNICIPAL CORPORATION | Birth Certificate</title>
  <meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
	<link href="{{'public/css/mystyle.css'}}" rel="stylesheet">
	
	<link href="{{'public/css/responsive.css'}}" rel="stylesheet">
	<style>
    .mand_error {
    color: #ff0000;
    font-size: 16px;
}
  </style>
</head>
	
<body >

 
	<div class="hed_bgcc">
<nav class="navbar navbar-expand-sm  p-0">

		  <div class="container-fluid  ">

			  <div class="col-md-12 d-flex align-items-center justify-content-between">
				<div class=" text-start">
					<img src="{{'public/images/aurangabad.png'}}" class="img-fluid" width="80">
				</div>
				  <div class=" text-center hed_tt">
						<h2>AURANGABAD MUNICIPAL CORPORATION </h2>
				</div>

				  <div class=" text-end">
					<img src="{{'public/images/aurangabad_smartcity.png'}}" class="img-fluid" width="80">
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
           
        <!-- <nav aria-label="breadcrumb">-->
        <!--  <ol class="breadcrumb">-->
        <!--    <li class="breadcrumb-item"><a href="#">Home</a></li>-->
        <!--    <li class="breadcrumb-item"><a href="#">Animal Husbandary Dept</a></li>-->
        <!--    <li class="breadcrumb-item active" aria-current="page"> Application for Dog License</li>-->
        <!--  </ol>-->
        <!--</nav>-->
            
       </div>
       
      <!-- <div class="profile">-->
      <!--  <div class="icon_wrap">-->
      <!--    <img src="images/user.png" alt="profile_pic">-->
      <!--    <span class="name">-->
      <!--       <small>Welcome to</small> <br>-->
      <!--        Srinivasa Rao-->
      <!--        </span>-->
      <!--    <i class="fas fa-chevron-down"></i>-->
      <!--  </div>-->

      <!--  <div class="profile_dd">-->
      <!--    <ul class="profile_ul">-->
      <!--      <li class="">-->
      <!--          <a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i>-->
      <!--          </span>Profile</a>-->
              <!--<div class="btn">My Account</div>-->
      <!--      </li>-->
      <!--      <li><a class="address" href="#"><span class="picon"><i class="fas fa-cog"></i></span>My Account</a></li>-->
      <!--      <li><a class="settings" href="#"><span class="picon"><i class="fas fa-file"></i></span>My Application</a></li>-->
      <!--      <li><a class="logout" href=" "><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>-->
      <!--    </ul>-->
      <!--  </div>-->
      <!--</div>-->
      
    </div>
  </div>
  
        </div>
  
        </div>

<div class="container mt-3">
    
    
      <div class="d-flex justify-content-between align-item-center mm_flx mb-3">	
  
 	 <h4> Corporate Social Responsibility/Citizen Contribution Inquiry Form </h4>
 	 
 	  
 	 
 </div>
 		 <div class="bg-success text-white p-2 rounded-2">
 		 <h5 class="m-0">Organization Details</h5>
 		</div> 
    
 @if(session()->has('success'))
        <div class="col-12">
            <div class="alert alert-success">
              <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        </div>
 @endif
 	  <form name="BirthForm" method="POST" action="{{ route('insertData') }}" id="BirthForm"
            enctype="multipart/form-data">
            @csrf
 		 <div class="row">
         
         <div class="col-md-4">
             <div class="mb-3 mt-3">
                    <label  class="form-label">Name of Organization  / Name of Individual  <span class="mand_error">*</span></label>
                    <input type="text" class="form-control"  name="org_name" required>
                  </div>
         </div>
         
         <div class="col-md-12">
             <div class="mb-3 ">
                    <label  class="form-label">Address of Organization</label>
                    <textarea class="form-control" rows="3" id="comment"  name="org_address" ></textarea>
                  </div>
         </div>
         
       </div>
         
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-0">
                    <label  class="form-label">Mobile Number <span class="mand_error">*</span></label>
                    <input type="text" class="form-control"  name="org_number" maxlength="10" minlength="10" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                  </div>
                 <div class="mb-3 mt-0">
                    <label  class="form-label">Email <span class="mand_error">*</span></label>
                    <input type="email" class="form-control"  name="org_email" required >
                  </div>
                  
                  
            </div>
            
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label  class="form-label">Information about Organization / Individual<span class="mand_error">*</span></label>
                     <textarea class="form-control" rows="4" id="comment" name="org_info" required></textarea>
                   </div>
            </div>
            
            
            
         </div>
        
         
           <div class="bg-success text-white p-2 rounded-2">
             <h5 class="m-0">Contact person details</h5>
            </div> 
         
         
         <div class="row">
             <div class="col-md-6 mt-3">
                 <div class="mb-3 mt-0">
                    <label  class="form-label">Name <span class="mand_error">*</span></label>
                    <input type="text" class="form-control"  name="cont_name" required>
                  </div>
                  <div class="mb-3 mt-0">
                    <label  class="form-label">Mobile number <span class="mand_error">*</span></label>
                    <input type="text" class="form-control"   name="cont_number" maxlength="10"  minlength="10" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                  </div>
                  
                   <div class="mb-3 mt-0">
                    <label  class="form-label">Email Id <span class="mand_error">*</span></label>
                    <input type="email" class="form-control"  name="cont_email" required>
                  </div>
                  
             </div>
             <div class="col-md-6">
                  <div class="mb-3 mt-3">
                    <label  class="form-label">Address</label>
                     <textarea class="form-control" rows="4" id="comment" name="cont_info" ></textarea>
                   </div>
             </div>
             
              
         </div>
 		  
 		     
 		       <div class="bg-success text-white p-2 rounded-2">
         		 <h5 class="m-0">Area of interest for contribution in development of the city</h5>
         		</div> 
 		     
 		     <div class="row">
            @foreach ($Proposal as $Proposal)
 		         <div class="col-md-3 mt-4  ">
 		             <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="{{$Proposal->id}}" required >{{$Proposal->name}}
                      <label class="form-check-label" for="radio1"></label>
                    </div>
 		         </div>
              @endforeach
 		         
 		         
 		         
 		          <div class="col-md-12 mt-4 mb-4">
 		             <div class="form-check">
                      <label  class="form-label">Description</label>
                      <textarea class="form-control" rows="4" id="comment" name="description" ></textarea>
                    </div>
 		         </div>
 		         
 		         
 		     </div>
 		
 		 
 		 <div class="bg-success text-white p-2 rounded-2">
         		 <h5 class="m-0">Upload application or related documents (optional)</h5>
         		</div> 
 		 
 		 <div class="row ">
 		     <div class="col-md-3">
 		            <div class="mb-3 mt-3">
                    <label  class="form-label">Upload File</label>
                      <input type="file" class="form-control"  name="files[]" >
                   </div>
 		        </div>
 		        <div class="col-md-1">
 		            <a herf="#" class="btn btn-success btn-sm" style="    margin-top: 49px;" onclick="clone_div()"><i class="fa fa-plus"></i></a>
 		              <a herf="#" class="btn btn-danger btn-sm" style="    margin-top: 49px;" onclick="remove(${count_new})"><i class="fa fa-minus"></i></a>
 		        </div>
 		 </div>
       <div id="app_div"></div>
 		 
 
		
		<div class="col-md-12 text-start mb-5">
			<div>
				<!--  <button class="btn btn-primary btn_sm"> <i class="fa-solid fa-print"></i> View and Print  </button> -->
				<button class="btn btn-success btn_sm" type="submit"><i class="fa-solid fa-check"></i>  Submit  </button>
			</div>
		</div>
		
		
		</form>
		
		

	
	
</div>




 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->

<script>
    
    $(".profile .icon_wrap").click(function(){
  $(this).parent().toggleClass("active");
  $(".notifications").removeClass("active");
});

$(".notifications .icon_wrap").click(function(){
  $(this).parent().toggleClass("active");
   $(".profile").removeClass("active");
});

$(".show_all .link").click(function(){
  $(".notifications").removeClass("active");
  $(".popup").show();
});

$(".close, .shadow").click(function(){
  $(".popup").hide();
});
    

     function clone_div() {
      //alert("hi");
   
            var count = $('.newrow').length;

           var count_new = count+1;
         if(5 > count_new) {

            var html = `
                        <div class="row  newrow" id="newrow${count_new}">
                     <div class="col-md-3">
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Upload File</label>
                                  <input type="file" class="form-control" name="files[]" >
                               </div>
                        </div>
                        <div class="col-md-1">
                            <a herf="#" class="btn btn-success btn-sm" style="    margin-top: 49px;" onclick="clone_div()" ><i class="fa fa-plus"></i></a>
                              <a herf="#" class="btn btn-danger btn-sm" style="    margin-top: 49px;" onclick="remove(${count_new})"><i class="fa fa-minus"></i></a>
                        </div>
                     </div>
                        `;
            $('#app_div').append(html);
          }else{
            $('#overflow').html("You have already selected "+adults+" ADULT. Remove before adding a new one.");
            //$('#overflow').show();
          }


        }
         function remove(id) {
            $('#newrow' + id).remove();
            $('#overflow').html('');
           // $('#overflow').hide();

        }
</script>


</body>
</html>


