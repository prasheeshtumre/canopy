@include('header');

<div class="container" >
    
 


<!--<div class="d-flex">	-->
<!--      <div class="text-start">	-->
<!--     	 <h4> Dashboard </h4>-->
<!--     </div>	-->
     
<!--     <div>-->
             
<!--     </div>-->
 
<!-- </div>-->
 
	<div class="row mt-5 mt-sm-0">
	    
	    <div class="col-md-3 mt-3">
	        <div class="card shadow bbxx1">
              <div class="card-body">
               <div class="d-flex justify-content-between mm_col"> 
                    <a href="{{ url('birth-certificate') }}"> BIRTH <br> REGISTRATION </a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/property_tax.png') }}">
                    </div>
               </div>   
                
              </div>
            </div>
	    </div>
	    
	    <div class="col-md-3 mt-3">
	        <div class="card shadow bbxx2">
              <div class="card-body">
                  <div class="d-flex justify-content-between mm_col"> 
                    <a href="#">DEATH <br> REGISTRATION
 </a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/advertisement.png') }}">
                    </div>
               </div> 
              </div>
            </div>
	    </div>
	    
	    <div class="col-md-3 mt-3">
	        <div class="card shadow bbxx3">
              <div class="card-body">
                  <div class="d-flex justify-content-between mm_col"> 
                    <a href="#"> NURSING HOME <br> REGISTRATION
</a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/waterdrop.png') }}">
                    </div>
               </div> 
              </div>
            </div>
	    </div>
	    
	    <div class="col-md-3 mt-3">
	        <div class="card shadow bbxx4">
              <div class="card-body">
                  <div class="d-flex justify-content-between mm_col"> 
                    <a href="#"> NURSING HOME <br> RENEWAL
</a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/gradening.png') }}">
                    </div>
               </div> 
              </div>
            </div>
	    </div>
	    
	    <div class="col-md-3 mt-4">
	        <div class="card shadow bbxx5">
              <div class="card-body">
                  <div class="d-flex justify-content-between mm_col"> 
                    <a href="#"> JKP MEMBERSHIP SERVICE   (Javik Kachra Prakalp) </a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/townplanning.png') }}">
                    </div>
               </div> 
              </div>
            </div>
	    </div>
	    
	    <div class="col-md-3 mt-4">
	        <div class="card shadow bbxx6">
              <div class="card-body">
                  <div class="d-flex justify-content-between mm_col"> 
                    <a href="#"> CHANGE IN NO. OF <br> BEDS / USAGE
                    
                    </a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/animal_hus.png') }}">
                    </div>
               </div> 
              </div>
            </div>
	    </div>
	    
	    <div class="col-md-3 mt-4">
	        <div class="card shadow bbxx7">
              <div class="card-body">
                  <div class="d-flex justify-content-between mm_col"> 
                    <a href="#">MTP </a>  
                    <div class="wtt_">
                        <img src="{{ asset('public/images/drainage.png') }}">
                    </div>
               </div> 
              </div>
            </div>
	    </div>
	    
	    
	    
	    
	    
	    
	    
	</div>
	
	
	
	
	
	
	
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
    
</script>














</body>
</html>


