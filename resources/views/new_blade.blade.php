<!DOCTYPE html>
<html lang="en">
<head>
  <title>Canopy QR</title>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
@font-face {
font-family: "CustomFont";
src: url("CustomFont.eot");
src: url("CustomFont.woff") format("woff"),
url("CustomFont.otf") format("opentype"),
url("CustomFont.svg#filename") format("svg");
}
    .body-image {
        /*background:url(https://canopy.zoomqr.com/public/assets/QrCodebodyImage.png) no-repeat ;*/
            background-size: cover;
            background-position: top;
            padding: 50px 0px;
                background: rgb(248,249,249);
               background: radial-gradient(circle, rgba(248,249,249,1) 0%, rgba(161,161,160,1) 100%);
               /*position:relative;*/
    }
    .card-pad {
        padding: 30px;
    }
    .card-pad h2 {
          color: #28a671;
    font-size: 40px;
    font-weight: 500;
    }
    .card-pad h4, h2 {
        margin-bottom:0px;
    }
      .card-pad h4 span:nth-child(1) {
        font-weight: 100;
    font-size: 35px;
    color: #9c9c9c;
    }
     .card-pad h4 span:nth-child(2) {
       font-style: italic;
           color: #848487;
               font-size: 35px;
               text-transform: lowercase;
                   font-weight: 400;
    }
    .border-dottedd {
            margin: 10px 0px;
        border-bottom: 1px dotted#ccc;
    }
    .top-details p {
           margin-bottom: 0px;
    font-weight: 600;
    text-transform: uppercase;
    color: #848487;
    }
    .top-details p:nth-child(5) {
        border-bottom: 1px dotted#ccc;
    padding-bottom: 10px;
    }
    .benefit-head {
            color: #28a671;
    font-weight: 600;
    text-transform: uppercase;
    padding: 3px 0px;
    font-size: 14px;
        border-bottom: 1px dotted #ccc;
    }
    .drugList {
            padding: 0;
    list-style: none;
        margin-bottom: 0;
    }
    .drugList li {
           padding: 5px;
    border-bottom: 1px dotted #ccc;
    color: #8c8c8c;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 400;
    }
    .drugList li:nth-child(9) {
    border-bottom: none;

    }
    .card-out {
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            border:none;
    }
    .btn-click {
      background: #28a671;
    color: white;
    border-radius: 3px;
    font-size: 20px;
    font-weight: 600;
    /* width: 30%; */
    padding: 15px;
    line-height: 0;
    }
    .btm-text {
          display: flex!important;
    text-align: center;
    align-items: center;
    justify-content: center;
    }
    .btm-text span{
            text-align: left;
    font-size: 20px;
    margin-left: 10px;
    line-height: 20px;
    color: #858588;
    }
    .btm-text-main {
              /*position: absolute;*/
    bottom: 35px;
    left: 20%;
    }
    .btm-text-main p {
            font-size: 35px; 
            margin: 0;
    }
    
    /*Media queries*/
    @media only screen and (max-width: 600px) {
  .body-image {
          background: none;
    background-color: #e2e2e2;
    padding: 50px 0px 150px 0px;
  }
   .btm-text-main p {
            font-size: 20px; 
            margin: 0;
    }
    .btm-text-main {
    position: absolute;
    bottom: -110px;
    left: 0;
}
.btm-text {
    display: block !important;
}
center {
    display:none;
}
.btn-click {
    background: #28a671;
    color: white;
    border-radius: 3px;
    font-size: 20px;
    font-weight: 600;
    /* width: 30%; */
    padding: 15px;
    line-height: 0;
    display: block;
    width: 85%;
    margin: 5px auto;
}
}
    
</style>

<body>
    <div class="container ">
    <div class="row align-items-center">
        <div class="col-md-6 col-6">
           <img src="https://canopy.zoomqr.com/public/assets/QrCodeHeader1.png" class="img-fluid" style="    padding: 10px 0px; width:40%;">
        </div>
         <div class="col-md-6 col-6 text-end">
           <img src="https://canopy.zoomqr.com/public/assets/QrCodeHeader2.png" class="img-fluid" style="    padding: 10px 0px; width:40%;">
        </div>
    </div>
</div>

    <div class="body-image">
        <div class="container">
  <div class="row ">
     <div class="col-md-4">
         <div class="card card-out">
             <div class="card-body card-pad">
                 <div class="title-heading">
                  <h4><span style="">Welcome to </span> <span style="">Your</span> </h4>
                  <h2>Canopy Health Benefits Portal</h2>
                </div>
                <div class="border-dottedd"></div>
                <div class="top-details">
                    <p>Card Holder Number :</p>
                     <p>DOB :</p>
                      <p>Effective Date : </p>
                       <p>Termination Date : </p>
                        <p >Company Name : </p>
                </div>
                
                <div class="d-flex justify-content-between benefit-head">
                    <div>Summery Of Benefits</div>
                    <div>Plan Pays</div>
                </div>
                
                <ul class="drugList">
                   <li> prescription Drugs : </li>
                   <li>Doctors Office Visit: </li>
                    <li>Specialist Consultation: </li>
                     <li>Paediatrician/Gynaecologist: </li>
                      <li>Hospital Room & Board: </li>
                       <li>Hospital Miscellaneous: </li> 
                       <li>lab/X-ray:</li>
                        <li>Dental:</li>
                         <li>Optical:</li>
                </ul>
             </div>
         </div>
     </div>
     <div class="col-md-8">
         <div>
           <center>
               <img src="https://canopy.zoomqr.com/public/assets/Qrcodegirl.png" class="img-fluid" alt="Canopy Image" style="width: 65%;">
           </center> 
         <div class="btm-text-main text-center">
      <p style="    "><span style="color: #28a671; font-weight: 500;">Hassle-free</span> group health insurance</p>
      <div class="d-flex btm-text">
          <button class="btn btn-click">CLICK HERE</button>
          <span> to access more benefits via online portal</span>
      </div>
  </div>
     </div>
     </div>
     
      
  </div>
 
  </div>
  </div>  


</div>

</body>
</html>
