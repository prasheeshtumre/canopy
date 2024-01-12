<!DOCTYPE html>
<html>

<head>
    <title>Canopy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            position: relative;
            /*background: #f5f5f5;*/
            /*background: radial-gradient(circle, rgba(248,249,249,1) 0%, rgba(161,161,160,1) 100%);*/
            font-family: 'bostonregular';

        }

        .main-card {
            background-image: url(https://canopy.zoomqr.com/public/assets/Qrcodegirl.png);
            background-size: contain;
            background-position: left bottom !important;
            background-repeat: no-repeat !important;
            width: 580px;
            height: 580px;
            position: fixed;
            bottom: 0px;
            right: 0px;
            z-index: -2;
        }

        .items-card {
            width: 100%;
            /*max-width: 1060px;*/
            margin: auto;
            background: radial-gradient(circle, rgba(248, 249, 249, 1) 0%, rgba(161, 161, 160, 1) 100%);
        }

        h1 {
            text-align: center;
            color: #28ac58;
            font-size: 36px;
            margin: 0;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .left-card {
            /*background: #fff;*/
            /*border: solid 1px #ccc;*/
            float: left;
            padding: 25px 25px 10px;
            width: 65%;
            border-radius: 11px;
        }

        .right {
            float: right;
            width: 32%;
        }

        h2 {
            color: #7a797f;
            font-size: 30px;
            margin: 10px 0px;
        }

        h2 span {
            color: #23a26d;
            margin: 10px 0px;
        }

        .clear {
            clear: both
        }

        h5 {
            margin: 0;
            margin-bottom: 20px;
        }

        h4 {
            color: #436d61;
            /*letter-spacing: 2px;*/
            margin: 10px 0px;
            font-size: 14px;
        }

        p {
            margin: 0px 0px;
            padding: 0;
            font-size: 12px;
        }

        td b {
            font-size: 12px;
        }

        .my_right {
            text-align: right;
        }

        .w_60 {
            width: 60%;
        }


        .card-pad {
            padding: 30px;
        }

        .card-pad h2 {
            color: #28a671;
            font-size: 40px;
            font-weight: 500;
        }

        .card-pad h4,h2 {
            margin-bottom: 0px;
        }

        .card-pad h4 span:nth-child(1) {
            font-weight: 100;
            font-size: 25px;
            color: #9c9c9c;
        }

        .card-pad h4 span:nth-child(2) {
            font-style: italic;
            color: #848487;
            font-size: 25px;
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
            font-size: 15px;
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
            font-size: 13px;
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
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            border: none;
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
            display: flex !important;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .btm-text span {
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
        
        .logo_mm{
            padding: 10px 0px; 
            width:40%;
        }
        
        .logo_mm1{
            padding: 10px 0px; 
            width:40%;
        }
        
         .bttom_mm{
              display:none;
          }
          
          .gg_imm1{
              display:block;
          }
            .gg_imm2{
              display:none;
          }

        @font-face {
            font-family: 'bostonbold';
            src: url('https://canopy.zoomqr.com/public/assets/fonts/bostonbold-webfont.woff2') format('woff2'),
                url('https://canopy.zoomqr.com/public/assets/fonts/bostonbold-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;

        }




        @font-face {
            font-family: 'bostonsemibold';
            src: url('https://canopy.zoomqr.com/public/assets/fonts/bostonsemibold-webfont.woff2') format('woff2'),
                url('https://canopy.zoomqr.com/public/assets/fonts/bostonsemibold-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;

        }




        @font-face {
            font-family: 'bostonregular';
            src: url('https://canopy.zoomqr.com/public/assets/fonts/bostonregular-webfont.woff2') format('woff2'),
                url('https://canopy.zoomqr.com/public/assets/fonts/bostonregular-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;

        }
        
        
       .btm-text-main1{
           display:none;
       } 
        
        
        
        
        


        @media only screen and (max-width: 768px) {
            
            
            body {
                background: #ccc;
            }

            .left-card {
                width: 100%;
                padding: 15px 15px 10px;
            }

            .w_60 {
                width: 100%;
            }

            .my_right {
                text-align: left;
            }

            .bt_logo {
                display: flex;
                flex-direction: column;
            }

            .right {
                width: 100%;
                padding-left: 23px;
            }

            .line {
                padding-left: 23px;
            }

            .main-card {
                background: none;
            }

            h1 {
                font-size: 26px;
                font-weight: bold;
            }

            /*.m_w_2 td{*/
            /*    width:20%;*/
            /*}*/

            .m_table table tr {
                border-bottom: 1px #ccc solid;
            }

            .m_table table .bg_cc {
                background-color: #d6f6e9;
            }

            .m_table table .bg_cc h6 {
                margin: 0px;
            }

            .body-image {
                background: none;
                /*background-color: #e2e2e2;*/
                padding: 20px 0px 20px 0px;
            }

            .top-details p{
                font-size:13px;
            }
            .btm-text-main p {
                font-size: 20px;
                margin: 0;
            }
            .drugList li{
                font-size:12px;
            }
            .card-pad h2{
                font-size: 30px;
            }
            

            .btm-text-main {
                /*position: absolute;*/
                bottom: -110px;
                left: 0;
            }

            .btm-text {
                display: flex !important;
                margin: 0px 37px;
            }

            /*center {*/
            /*    display: none;*/
            /*}*/

            .btn-click {
                background: #28a671;
                color: white;
                border-radius: 3px;
                font-size: 12px;
                font-weight: 600;
                /* width: 30%; */
                padding: 15px;
                line-height: 0;
                display: block;
                width: 50%;
                margin: 5px auto;
            }
            .m_col{
                display: flex;
                 flex-direction: column;
            }
            
             .logo_mm{
            padding: 12px 0px 5px 20px;
            width:100%;
         }
         .title-heading h2{
             margin-top:0px;
         }

            .logo_mm1{
            display:none;
            width:100%;
         }
         
         .logo_mm2{
             display:block;
             background: transparent;
    background-blend-mode: multiply;
         }
         
          .bttom_mm{
              display:block;
              
          }  
          
          .my_img{
                  position: relative;
                z-index: 9999;
                top: -38px;
          }
          
          .drugList{
              padding-bottom: 30px; 
          }
          
          .gg_imm1{
              display:none;
          }
          .gg_imm2{
              display:block;
          }
          body{
              position: inherit;
          }
          
          .btm-text-main1{
           display:block;
           background-color:#fff;
           padding-bottom: 15px;
       } 
          
          .btm-text-main{
           display:none;
       } 

        .btm-text span{
            font-size: 17px;
        }

        .btm-text-main1 p{
            font-size: 19px;
        }
        
        
        
    </style>
</head>

<body>

    <div class="container ">
        <div class="row align-items-center bg-white">
            <div class="col-md-6 col-6">
                <img src="https://canopy.zoomqr.com/public/assets/QrCodeHeader1.png" class="img-fluid logo_mm"
                     >
            </div>
            <div class="col-md-6 col-6 text-end">
                <img src="https://canopy.zoomqr.com/public/assets/QrCodeHeader2.png" class="img-fluid logo_mm1"
                    >
            </div>
        </div>
    </div>

    <div class="items-card">

        <!--<div class="">-->
        <!--    <h1>Welcome to the Canopy Health Benefits Portal</h1>-->
        <!--</div>-->
        <div class="container p-3">

            <div class="">



                <div class="body-image">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-5">
                                <div class="card card-out">
                                    <div class="card-body card-pad pt-2">
                                        <div class="title-heading">
                                            <h4><span style="">Welcome to </span> <span style="">Your</span>
                                            </h4>
                                            <h2>Canopy Health Benefits Portal</h2>
                                        </div>
                                        <div class="border-dottedd"></div>
                                        <div class="top-details">
                                            <p>Card Holder Number : {{ $user->card_no }}</p>

                                            @php
                                                $dob = \Carbon\Carbon::parse($user->dob)->format('d-M-Y');
                                                $exploded_dob = explode('-', $dob);
                                                if ($exploded_dob[2] > date('Y')) {
                                                    $dob = str_replace('20', '19', $dob);
                                                }
                                            @endphp
                                            <p> DOB:<b>&nbsp;&nbsp;&nbsp;{{ $dob }}</b> </p>




                                            {{-- <p>Effective Date : {{ $user->effective_date }}</p> --}}
                                            <p>Effective Date : {{ date('d-M-Y', strtotime($user->effective_date)) }}
                                            </p>
                                            {{-- <p>Termination Date :
                                                {{ \Carbon\Carbon::parse($user->terminatiion_date)->format('d-M-Y') }}
                                            </p> --}}
                                            <p>Termination Date :
                                                {{ date('d-M-Y', strtotime($user->terminatiion_date)) }}
                                            </p>
                                            <p>Company Name : {{ $categories['10'] }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between benefit-head">
                                            <div>Summery Of Benefits</div>
                                            <div>Plan Pays</div>
                                        </div>

                                        <ul class="drugList">
                                            <li  > Prescription Drugs : <span
                                                    class="float-end"><b>{{ $categories['1'] }}</b></span></li>
                                            <li >Doctors Office Visit: <span
                                                    class="float-end"><b>{{ $categories['2'] }}</b></span></li>
                                            <li class="m_col" >Specialist Consultation: <span
                                                    class="float-end"><b>{{ $categories['3'] }}</b></span></li>
                                            <li>Paediatrician/ Gynaecologist: <span class="float-end"><b>
                                                        {{ $categories['9'] }}</b></span></li>
                                            <li>Hospital Room & Board:<span class="float-end"><b>
                                                        {{ $categories['4'] }}</b></span></li>
                                            <li>Hospital Miscellaneous:<span class="float-end"><b>
                                                        {{ $categories['5'] }}</b></span></li>
                                            <li>Lab/X-ray:<span class="float-end"><b> {{ $categories['6'] }}</b></span>
                                            </li>
                                            <li>Dental:<span class="float-end"><b> {{ $categories['7'] }}</b></span>
                                            </li>
                                            <li>Optical: <span class="float-end"><b>{{ $categories['8'] }}</b> </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div style="">
                                    <center>
                                        <img src="https://canopy.zoomqr.com/public/assets/Qrcodegirl_mm.png"
                                            class="img-fluid my_img gg_imm1" alt="Canopy Image" style="width: 83%;"  >
                                            
                                       <img src="https://canopy.zoomqr.com/public/assets/Qrcodegirl_mm2.png"
                                            class="img-fluid my_img gg_imm2" alt="Canopy Image" style="width: 65%;"  >     
                                            
                                            
                                    </center>
                                    
                                       <div class="bttom_mm">
                                             <img src="https://canopy.zoomqr.com/public/assets/GK_M.png" class="img-fluid logo_mm2" >
                                        </div>
                                    
                                    <div class="btm-text-main text-center pt-2">
                                        <p style="    "><span style="color: #28a671; font-weight: 500;">Hassle-free</span>
                                            group health insurance</p>
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


        </div>


    </div>

    <!--<div class="main-card">-->
    <!--</div>-->


    </div>





    <div>



    </div>



                <div class="btm-text-main1 text-center pt-2">
                        <p style="    "><span style="color: #28a671; font-weight: 500;">Hassle-free</span>
                            group health insurance</p>
                        <div class="d-flex btm-text">
                            <button class="btn btn-click">CLICK HERE</button>
                            <span> to access more benefits via online portal</span>
                        </div>
                    </div>



</body>

</html>
