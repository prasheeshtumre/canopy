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
        
        body{
            position: relative;
            background: #f5f5f5;
             font-family: 'bostonregular';
            
        }
        .main-card {
            background-image:url(https://my.canopy-insurance.com/assets/logback-6faae5d7e7a61296b88358ae5727216aa97d70c6b9dc7181bd150ba847203757.jpg);
            background-size: contain;
            background-position: left bottom !important;
            background-repeat: no-repeat !important;
            width: 380px;
            height: 380px;
            position: fixed;
            bottom: 0px;
            right: 0px;
            z-index: -2;
        }
        .items-card{
            width: 100%;
            max-width: 1060px;
            margin: auto;
        }
        h1{
            text-align: center;
            color: #28ac58;
            font-size: 36px;
            margin:0;
            margin-bottom:10px;
            font-weight:bold;
        }
        .left-card{
            background: #fff;
            border: solid 1px #ccc;
            float: left;
            padding: 25px 25px 10px;
            width: 65%
        }
        .right{
            float: right;
            width: 32%;
        }
        h2{
            color: #7a797f;
            font-size: 30px;
            margin:10px 0px; 
        }
        
        h2 span{
            color: #23a26d;
            margin:10px 0px; 
        }
        .clear{
            clear: both
        }
        h5{
            margin: 0;
            margin-bottom: 20px;
        }
        h4{
            color:#436d61;
            /*letter-spacing: 2px;*/
            margin:10px 0px; 
            font-size:14px;
        }
        p{
            margin:0px 0px;
            padding: 0;
            font-size: 12px;
        }
        td b{
            font-size:12px;
        }
        
        .my_right{
            text-align:right;
        }
        
        .w_60{
            width:60%;
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


 @media only screen and (max-width: 768px) {
    .left-card{
        width:100%;
        padding: 15px 15px 10px;
    }
     .w_60{
            width:100%;
        }
        
    .my_right{
        text-align:left;
    }
    .bt_logo{
        display:flex;
        flex-direction:column;
    }
    
    .right{
        width:100%;
        padding-left: 23px;
    }
    .line{
            padding-left: 23px;
    }
    
    .main-card{
        background:none;
    }
    h1{
        font-size:26px;
        font-weight: bold;
    }
    
    /*.m_w_2 td{*/
    /*    width:20%;*/
    /*}*/
    
    .m_table table tr{
        border-bottom: 1px #ccc solid;
    }
     
   .m_table table  .bg_cc{
       background-color:#d6f6e9;
   }
     .m_table table  .bg_cc h6{
         margin:0px;
     }
     
    
}





    </style>
</head>

<body>
    
    <div class="items-card">
        <div class="">
            <h1>Welcome to the Canopy Health Benefits Portal</h1>
        </div>
        
        
        <div class="left-card">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr class="bt_logo">
                    <td>
                        <img src="https://my.canopy-insurance.com/assets/canopy-insurance-34a7d3ab1bfa4d173628c1003f1bc4f2a84bee6abb71b21046ceaf4dab96e2e8.png" width="160" />
                    </td>
                    <td class="my_right">
                        <h4>BENEFIT CARD</h4>
                    </td>
                </tr>
                
 
                <tr>
                    <td colspan="2" height="10"></td>
                </tr>
 
                
                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr class="bt_logo">
                                <td class="w_60">
                                <p>CARDHOLDER NUMBER:<b>&nbsp;&nbsp;&nbsp;{{$user->card_no}}</b></p>
                                </td>
                                <td>
                                <!--<p>EFFECTIVE DATE:<b>&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($categories['11'])->format('d-M-Y') }}</b></p>-->
                                <p>EFFECTIVE DATE:<b>&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($user->effective_date)->format('d-M-Y') }}</b></p>
                                </td>
                            </tr>
                        <tr class="bt_logo">
                            <td>
                                <p>DOB:<b>&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($user->dob)->format('d-M-Y') }}</b></p>
                            </td>
                            <td>
                                 <!--<p>TERMINATION DATE:<b>&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($categories['12'])->format('d-M-Y') }}</b></p>-->
                                 <p>TERMINATION DATE:<b>&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($user->terminatiion_date)->format('d-M-Y') }}</b></p>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
 
                <tr>
                    <td colspan="2" height="10"></td>
                </tr>
 
                <tr>
                    <td colspan="2">
                        <div class="m_table">
                            <table width="100%">
                                
                                <tr class="bg_cc">
                                    <td><h6><strong> SUMMARY OF BENEFITS </strong></h6></td>
                                    <td><h6><strong>PLAN PAYS</strong></h6></td>
                                </tr>
                                
                                
                                <tr><td> <p>PRESCRIPTION DRUGS:</p> </td><td> <b>{{$categories['1']}}</b> </td></tr>
                                <tr><td ><p>DOCTOR'S OFFICE VISIT:</p></td><td><b>{{$categories['2']}}</b></td></tr>
                                <tr><td ><p>SPECIALIST CONSULTATION:</p></td><td><b>{{$categories['3']}}</b></td></tr>
                                <tr><td ><p>PAEDIATRICIAN/GYNAECOLOGIST:</p></td><td><b>{{$categories['9']}}</b></td></tr>
                                <tr><td ><p>HOSPITAL ROOM & BOARD:</p></td><td><b>{{$categories['4']}}</b></td></tr>
                                <tr><td ><p>HOSPITAL MISCELLANEOUS:</p></td><td><b>{{$categories['5']}}</b></td></tr>
                                <tr><td ><p>LAB/X-RAY:</p></td><td><b>{{$categories['6']}}</b></td></tr>
                                <tr><td ><p>DENTAL:</p></td><td><b>{{$categories['7']}}</b></td></tr>
                                <tr><td ><p>OPTICAL:</p></td><td><b>{{$categories['8']}}</b></td></tr>
                                
                            </table>
                        </div>
                        
                    </td>
                </tr>
                
                
                
                
                
                
                <tr class="bt_logo">
                    <td><h4>COMPANY NAME: <b>{{$categories['10']}}</b> </h4></td>
                    <td align="right"><img src="https://my.canopy-insurance.com/assets/can_footer_logo_lg-7c9d661a7cfdd42b42f49aef67e988ea982543ff6c666f51fb6555bb3a82e662.png" alt="" width="300"/></td>
                </tr>
                
            </table>
        </div>
        
        <div class="right">
           <div class="mt-3"> 
            <h6>For more of the Canopy Experience</h6>
            <h6>Login to <a href="http://canopy-insurance.com" target="_blank">http://canopy-insurance.com</a></h6>
           </div> 
        </div>
        <div class="clear"></div>
        <div class="line">
            <h2><span>Hassle-free</span><br>group health<br>Insurance</h2>
        </div>
    </div>

    <div class="main-card">
    </div>

</body>

</html>
