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
    <link href="css/mystyle.css" rel="stylesheet">

    <link href="css/responsive.css" rel="stylesheet">

    <style>
        .hide {
            display: none;
        }

        .form-place {
            border: none;
            border-bottom: solid 1px #ccc;
        }

        .form-place:focus {
            outline: none;
        }

        .mt40 {
            margin-top: 40px;
        }
    </style>

</head>

<body>


    <div class="hed_bgcc">
        <nav class="navbar navbar-expand-sm   p-0">

            <div class="container-fluid  ">

                <div class="col-md-12 d-flex align-items-center justify-content-between">
                    <div class=" text-start">
                        <img src="images/aurangabad.png" class="img-fluid" width="80">
                    </div>
                    <div class=" text-center hed_tt">
                        <h2>AURANGABAD MUNICIPAL CORPORATION </h2>
                    </div>
                    <div class=" text-end">
                        <img src="images/aurangabad_smartcity.png" class="img-fluid" width="80">
                    </div>
                </div>

            </div>

        </nav>

    </div>




    <div class="container mt-3">

        <div class="d-flex justify-content-between align-item-center mm_flx mb-3">
            <div>
                <h4 class="lbleng">Pradhan Mantri Avaas Yojna ( Urban) </h4>
                <h4 class="lblmrt">प्रधानमंत्री आवास योजना (शहरी) <br> औरंगाबाद महानगरपालिका, औरंगाबाद. </h4>
            </div>
            <div class="d-flex align-items-center">

                <div class="mr_15"><small> Change Language </small> </div>

                <div class="switcher">
                    <input type="radio" name="balance" value="1" id="yin" class="switcher__input switcher__input--yin"
                        checked="">
                    <label for="yin" class="switcher__label">English</label>

                    <input type="radio" name="balance" value="2" id="yang"
                        class="switcher__input switcher__input--yang">
                    <label for="yang" class="switcher__label">Marathi</label>

                    <span class="switcher__toggle"></span>
                </div>

            </div>

        </div>

        <form id="MarriageForm" method="post" enctype="multipart/form-data" name="MarriageForm"
            action="https://egovindia.co.in/rtsservices/new/marriage-registration">
            <input type="hidden" name="_token" value="YebFFO8tbThGie0qejXiqadNarcp0jUksmYkCEnd">
            <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng  rounded-2"><strong>Application Details
                </strong>
            </h6>
            <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt  rounded-2"><strong>अर्जाचा
                    तपशीलील</strong>
            </h6>

            <div class="row mb-3">

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Application no <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> अर्ज क्र <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="application_no" value=""
                            readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Earlier filed application number in case of old
                            applicant </label>
                        <label for="" class="form-label lblmrt">जुने अर्जदार असल्यास पूर्वीचा दाखल अर्ज क्रमांक </label>
                        <input type="text" class="form-control " id="" placeholder="" name="old_application" value="">
                    </div>
                </div>

            </div>

            <div class="col-md-12 mb-3">

                <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng rounded-2"><strong> Applicant Details
                    </strong></h6>
                <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt rounded-2"><strong> अर्जदाराचा तपशील
                    </strong></h6>
            </div>

            <div class="row mt-2 mb-3">

                <div class="col-md-3">
                    <div class="mb-3 mt-0">
                        <label for="" class="form-label lbleng">Photo Attachment <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> अर्जदाराचा फोटो<span class="mand_error">*</span>
                        </label>
                        <input type="file" class="form-control " id="" placeholder="" name="photo_attachment" value="">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0">
                        <label for="" class="form-label lbleng"> Name of Head of Family <span
                                class="mand_error">*</span></label>
                        <label for="" class="form-label lblmrt">कुटुंब प्रमुखाचे नाव <span class="mand_error">*</span>
                        </label>
                        <input type="text" class="form-control " id="" placeholder="" name="name_of_head"
                            value="">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng"> Gender <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt">लिंग <span class="mand_error">*</span> </label>
                        <select class="form-select" name="gender">
                            <option value="">-Select-</option>
                            <option value="1">Male / पुरुष </option>
                            <option value="2">Female / स्त्री </option>
                            <option value="3">Transgender / ट्रान्सजेंडर </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Marritial Status <span
                                class="mand_error">*</span></label>
                        <label for="" class="form-label lblmrt">वैवाहिक तपशील <span class="mand_error"> *</span></label>
                        <select class="form-select" name="maritial_status">
                            <option value="">-Select-</option>
                            <option value="1">Married / विवाहित </option>
                            <option value="2">Unmarried / अविवाहित </option>
                            <option value="3">Single Female / Widow / एकल महिला / विधवा </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Type of applicant <span
                                class="mand_error">*</span></label>
                        <label for="" class="form-label lblmrt"> अर्जदाराचा प्रकार <span class="mand_error">
                                *</span></label>
                        <select class="form-select" name="type_of_applicant">
                            <option value="">-Select-</option>
                            <option value="1">Normal / सामान्य </option>
                            <option value="2">Disabled / अपंग </option>
                            <option value="3">Widow / विधवा </option>
                        </select>
                    </div>
                </div>



                <!--<div class="col-md-3 ">-->
                <!--    <div class="mb-3 mt-0 ">-->
                <!--        <label for="" class="form-label lbleng">Father Name/Husband Name <span class="mand_error">*</span> </label>-->
                <!--        <label for="" class="form-label lblmrt">अर्जदाराचा प्रकार<span class="mand_error">*</span> </label>-->
                <!--         <input type="text" class="form-control " id="" placeholder="" name="husband_alternate_name" value="">-->
                <!--    </div>-->
                <!--</div>-->
            </div>

            <div class="row">

                <div class="col-md-12 mb-2">
                    <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng rounded-2"><strong>Current
                            Address</strong></h6>
                    <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt rounded-2"><strong>कायमचा
                            पत्ता</strong></h6>
                </div>

                <div class="col-md-12">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">House/Flat/Plot no <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> घर /फ्लॅट/प्लॉट क्र<span class="mand_error">*</span>
                        </label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng"> Street Name / Mohalla / Address <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> रस्त्याचे नाव / मोहल्ला / पत्ता<span
                                class="mand_error">*</span> </label>
                        <textarea class="form-control" rows="3" name="c_street_name"></textarea>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Ward no<span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> प्रभाग / वॉर्ड क्र. <span class="mand_error">*</span>
                        </label>
                        <select class="form-select" name="c_ward_no">
                            <option value="">-Select-</option>
                            <option value="1">A-1 Town Hall / A-1 टाऊन हॉल </option>
                            <option value="2">B-5 Cidco N6 / B-5 सिडको N6 </option>
                            <option value="3">C-3 Central naka / C-3 सेंट्रल नाका </option>
                            <option value="3">D-9 Kranti Chowk / D-9 क्रांती चौक </option>
                            <option value="1">E-6 - Cidco N-6 / E-6 - सिडको </option>
                            <option value="2">F-7- Jawahar Colony / F-7- जवाहर कॉलनी </option>
                            <option value="3">G-2- Sillekhana / G-2- सिल्लेखाना </option>
                            <option value="3">H-4 Saubhagya mangal karyalaya / H-4 सौभाग्य मंगल कार्यालय </option>
                            <option value="3">I-8 Satara / I-8- सातारा </option>
                        </select>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">City<span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> शहर <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="c_city">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Mobile No. <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> मोबाईल नंबर <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="c_mobile_no">
                    </div>
                </div>
                <!--   <div class="col-md-12">-->
                <!--    <div class="mb-3 mt-0 ">-->
                <!--        <label for="" class="form-label lbleng"> Permanent Address  <span class="mand_error">*</span> </label>-->
                <!--        <label for="" class="form-label lblmrt"> कायमचा पत्ता<span class="mand_error">*</span> </label>-->
                <!--        <textarea class="form-control" rows="3" ></textarea>-->
                <!--    </div>-->
                <!--</div>-->


            </div>
            <div class="row">

                <div class="col-md-12 mb-2">
                    <h6 style="background-color: rgb(255, 239, 214); padding: 10px;" class="lbleng rounded-2">
                        <strong>Permenent Address</strong></h6>
                    <h6 style="background-color: rgb(255, 239, 214); padding: 10px; display: none;"
                        class="lblmrt rounded-2"><strong>सध्याचा पत्ता</strong></h6>
                </div>

                <div class="col-md-12">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng" style="">House/Flat/Plot no <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt" style="display: none;"> घर /फ्लॅट/प्लॉट क्र<span
                                class="mand_error">*</span> </label>
                        <textarea class="form-control" rows="3" name="p_house_no"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng" style=""> Street Name / Mohalla / Address <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt" style="display: none;"> रस्त्याचे नाव / मोहल्ला / पत्ता
                            <span class="mand_error">*</span> </label>
                        <textarea class="form-control" rows="3" name="p_street_name"></textarea>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <!--<label for="" class="form-label lbleng" >Ward no<span class="mand_error">*</span> </label>-->
                        <!--<label for="" class="form-label lblmrt">   प्रभाग / वॉर्ड क्र.            <span class="mand_error">*</span> </label>-->
                        <label for="" class="form-label lbleng" style="">Ward no<span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt" style="display: none;"> प्रभाग / वॉर्ड क्र. <span
                                class="mand_error">*</span> </label>
                        <select class="form-select" name="p_ward_no">
                            <option value="">-Select-</option>
                            <option value="1">A-1 Town Hall / A-1 टाऊन हॉल </option>
                            <option value="2">B-5 Cidco N6 / B-5 सिडको N6 </option>
                            <option value="3">C-3 Central naka / C-3 सेंट्रल नाका </option>
                            <option value="3">D-9 Kranti Chowk / D-9 क्रांती चौक </option>
                            <option value="1">E-6 - Cidco N-6 / E-6 - सिडको </option>
                            <option value="2">F-7- Jawahar Colony / F-7- जवाहर कॉलनी </option>
                            <option value="3">G-2- Sillekhana / G-2- सिल्लेखाना </option>
                            <option value="3">H-4 Saubhagya mangal karyalaya / H-4 सौभाग्य मंगल कार्यालय </option>
                            <option value="3">I-8 Satara / I-8- सातारा </option>
                        </select>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng" style="">City<span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt" style="display: none;"> शहर <span
                                class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="p_city">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng" style="">Mobile No. <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt" style="display: none;"> मोबाईल नंबर <span
                                class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="p_mobile_no">
                    </div>
                </div>
                <!--   <div class="col-md-12">-->
                <!--    <div class="mb-3 mt-0 ">-->
                <!--        <label for="" class="form-label lbleng" style=""> Permanent Address  <span class="mand_error">*</span> </label>-->
                <!--        <label for="" class="form-label lblmrt" style="display: none;"> कायमचा पत्ता<span class="mand_error">*</span> </label>-->
                <!--        <textarea class="form-control" rows="3"></textarea>-->
                <!--    </div>-->
                <!--</div>-->


            </div>

            <div class="col-md-12 mb-3">

                <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng rounded-2"><strong>Information about
                        family members </strong></h6>
                <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt rounded-2"><strong> कुटुंबातील
                        सदस्यांची माहिती</strong></h6>
            </div>

            <div class="row mt-2 mb-3">
                <div class="col-md-12 mb-3">
                    <div class="text-end">
                        <button class="btn btn-primary">Add more</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Aadhaar number of head of family <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> कुटुंब प्रमुखाचा आधार क्रमांक <span
                                class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="adhaar_no_head">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Name <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> नाव <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="family_name">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Relationship <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> नाते <span class="mand_error">*</span> </label>
                        <select class="form-select" name="family_relation_ship">
                            <option value="">-Select-</option>
                            <option value="1">Brother / भाऊ </option>
                            <option value="2">Mother / आई </option>
                            <option value="3">Sister / बहीण </option>
                            <option value="3">Grandfather / आजोबा </option>
                            <option value="1">GrandMother / आजी </option>

                            <option value="3">Father / वडील </option>

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng"> Gender <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt">लिंग <span class="mand_error">*</span> </label>
                        <select class="form-select" name="family_gender">
                            <option value="">-Select-</option>
                            <option value="1">Male / पुरुष </option>
                            <option value="2">Female / स्त्री </option>
                            <option value="3">Transgender / ट्रान्सजेंडर </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Age <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> वय <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="family_age">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Aadhaar Number <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> आधार क्रमांक <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="family_adhaar_no">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Election Identity Card <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> निवडणूक ओळखपत्र <span class="mand_error">*</span>
                        </label>
                        <input type="text" class="form-control " id="" placeholder="" name="family_identity_card">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">PAN Card (if any) <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> पॅनकार्ड ( असल्यास ) <span class="mand_error">*</span>
                        </label>
                        <input type="text" class="form-control " id="" placeholder="" name="family_pan">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng"> Caste <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt">जात <span class="mand_error">*</span> </label>
                        <select class="form-select" name="app_title">
                            <option value="">-Select-</option>
                            <option value="1">General/सामान्य </option>
                            <option value="2">SC / SC </option>
                            <option value="3">ST / ST </option>
                            <option value="4">OBC/OBC</option>
                        </select>
                    </div>
                </div>


            </div>

            <div class="col-md-12 mb-3">

                <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng rounded-2"><strong>Bank Details
                    </strong></h6>
                <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt rounded-2"><strong> बँक तपशील
                    </strong></h6>
            </div>


            <div class="row mt-2 mb-2">
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Bank Account Number<span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt">बँक खाते क्रमांक <span class="mand_error">*</span>
                        </label>
                        <input type="text" class="form-control " id="" placeholder="" name="bank_acc_no">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Bank and Branch Name: <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> बँक व शाखा नाव <span class="mand_error">*</span>
                        </label>
                        <input type="text" class="form-control " id="" placeholder="" name="bank_branch_name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">IFSC <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> IFSC <span class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="bank_ifsc">
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-3">

                <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng rounded-2"><strong>Applicant
                        Information </strong></h6>
                <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt rounded-2"><strong> अर्जदाराची
                        माहिती</strong></h6>
            </div>


            <div class="row mt-2 mb-2">
                <div class="col-md-4">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">How many years have you been living in this
                            city/village?<span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt">या शहर /गावात किती वर्षापासून राहात आहात <span
                                class="mand_error">*</span> </label>
                        <select class="form-select" name="inform_many_years">
                            <option value="">-Select-</option>
                            <option value="1">0 To 1 /0 ते 1 </option>
                            <option value="2">1 To 3 / 1 ते 3 </option>
                            <option value="3">3 To 5 / 3 ते 5 </option>
                            <option value="4">More Than 5 /5 पेक्षा जास्त</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Does the family own a house or residential land anywhere
                            in India?<span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> कुटुंबाच्या मालकीचे घर किंवा निवासी जमीन भारतात कुठेही
                            आहे का <span class="mand_error">*</span> </label>
                        <select class="form-select" name="inforn_own_rent_house">
                            <option value="">-Select-</option>
                            <option value="1">Yes /होय </option>
                            <option value="2">No / नाही </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Employment status <span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> रोजगार स्थिती <span class="mand_error">*</span>
                        </label>
                        <select class="form-select" name="inform_employ_status">
                            <option value="">-Select-</option>
                            <option value="1">Self Business / स्वतःचा व्यवसाय </option>
                            <option value="2">Salary employee / पगारदार </option>
                            <option value="1">Worker / कामगार </option>
                            <option value="2">Other / इतर </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Combined Annual Household Income (Rs.)<span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> घरातील एकत्रित वार्षिक उत्पन्न (रु) <span
                                class="mand_error">*</span> </label>
                        <input type="text" class="form-control " id="" placeholder="" name="inform_annual_income">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt40">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked name="family_checkbox_needs">
                            <label class="form-check-label" for="flexCheckChecked">
                                <label for="" class="form-label lbleng">Family housing needs<span
                                        class="mand_error">*</span> </label>
                                <label for="" class="form-label lblmrt"> कुटुंब गृहनिर्माण गरज <span
                                        class="mand_error">*</span> </label>

                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 mb-3">

                <h6 style="background-color:#FFEFD6; padding:10px;" class="lbleng rounded-2"><strong>Document Attachment
                    </strong></h6>
                <h6 style="background-color:#FFEFD6; padding:10px;" class="lblmrt rounded-2"><strong> दस्तऐवज
                        संलग्नक</strong></h6>
            </div>


            <div class="row mt-2 mb-2">
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Proof of income<span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt">उत्पनाचा दाखला <span class="mand_error">*</span>
                        </label>
                        <input type="file" class="form-control " id="" placeholder="" name="income_proof_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Self-Declared Affidavit (Enclosed) <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> स्वयंघोषित प्रतिज्ञापत्र ( सोबतचे) <span
                                class="mand_error">*</span> </label>
                        <input type="file" class="form-control " id="" placeholder="" name="self_declare_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Aadhaar Card (Husband and Wife) <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> आधार कार्ड (पती व पत्नी ) <span
                                class="mand_error">*</span> </label>
                        <input type="file" class="form-control " id="" placeholder="" name="adhaar_card_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Bank passbook xerox<span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> बँकेचे पासबुक झेरॉक्स <span class="mand_error">*</span>
                        </label>
                        <input type="file" class="form-control " id="" placeholder="" name="bank_xerox_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Voter ID Card<span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> मतदार ओळखपत्र<span class="mand_error">*</span> </label>
                        <input type="file" class="form-control " id="" placeholder="" name="voter_xerox_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Certificate of Disability <span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> अपंगत्वाचे प्रमाणपत्र <span class="mand_error">*</span>
                        </label>
                        <input type="file" class="form-control " id="" placeholder="" name="certificate_disability_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Caste certificate ( If any)<span
                                class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> जातीचा दाखला ( असल्यास ) <span
                                class="mand_error">*</span> </label>
                        <input type="file" class="form-control " id="" placeholder="" name="caste_certificate_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Residence certificate<span class="mand_error">*</span>
                        </label>
                        <label for="" class="form-label lblmrt"> रहिवासी दाखला <span class="mand_error">*</span>
                        </label>
                        <input type="file" class="form-control " id="" placeholder="" name="residence_certificate_file">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-0 ">
                        <label for="" class="form-label lbleng">Construction Worker Registration Certificate (if any)
                            <span class="mand_error">*</span> </label>
                        <label for="" class="form-label lblmrt"> बांधकाम कामगार नोंदणी प्रमाणपत्र (असल्यास) <span
                                class="mand_error">*</span> </label>
                        <input type="file" class="form-control " id="" placeholder="" name="construction_work_file">
                    </div>
                </div>
            </div>



            <div class="row mb-3 mt-3">


                <div class="col-md-12 text-start mb-5">
                    <div>

                        <a href="#" class="btn btn-primary btn_sm printMe"> <i class="fa-solid fa-print"></i> View and
                            Print </a>

                        <button class="btn btn-success btn_sm" type="submit" onclick="mr_form_click(this)"><i
                                class="fa-solid fa-check"></i> Submit </button>
                    </div>
                </div>

            </div>







        </form>
    </div>


    </div>



    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->

    <script>

        $(".profile .icon_wrap").click(function () {
            $(this).parent().toggleClass("active");
            $(".notifications").removeClass("active");
        });

        $(".notifications .icon_wrap").click(function () {
            $(this).parent().toggleClass("active");
            $(".profile").removeClass("active");
        });

        $(".show_all .link").click(function () {
            $(".notifications").removeClass("active");
            $(".popup").show();
        });

        $(".close, .shadow").click(function () {
            $(".popup").hide();
        });

    </script>

    <script>

        $(document).ready(function () {
            //  alert("ggg");
            $(".lblmrt").hide();

        });

        $(document).ready(function () {
            //$(".lblmrt").hide();
            $('input[type=radio][name=balance]').change(function () {
                if (this.value == '1') {
                    $(".lbleng").show();
                    $(".lblmrt").hide();
                } else if (this.value == '2') {

                    $(".lbleng").hide();
                    $(".lblmrt").show();
                }
            });

        });
        $('.printMe').click(function () {
            //alert("hi");
            window.print();
        });

    </script>



</body>

</html>