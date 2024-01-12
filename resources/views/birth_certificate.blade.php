@include('header');

    <div class="container mt-3">

        <div class="d-flex justify-content-between align-item-center mm_flx mb-3">
   <!--<p>{{ session()->get('success') }}</p>-->
            <h4>Application Form For Birth Certificate</h4>

            <div class="d-flex align-items-center">

                <div class="mr_15"><small> Change Language </small> </div>

                <div class="switcher">
                    <input type="radio" name="balance" value="1" id="yin"
                        class="switcher__input switcher__input--yin" checked="">
                    <label for="yin" class="switcher__label">English</label>

                    <input type="radio" name="balance" value="2" id="yang"
                        class="switcher__input switcher__input--yang">
                    <label for="yang" class="switcher__label">Marathi</label>

                    <span class="switcher__toggle"></span>
                </div>

            </div>

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

                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Name of Applicant</label>
                        <label for="" class="form-label lblmrt"> अर्जदाराचे नाव </label>
                        <input type="text" class="form-control" id="" placeholder="" name="app_name"
                            required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 ">
                        <label for="" class="form-label lbleng"> Applicant Address </label>
                        <label for="" class="form-label lblmrt"> अर्जदाराचा पत्ता </label>
                        <textarea class="form-control" rows="3" name="app_address" required></textarea>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Mobile No.</label>
                        <label for="" class="form-label lblmrt">मोबाईल क्र. </label>
                        <input type="text" class="form-control" id="" placeholder="" name="app_number"
                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="10" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Email </label>
                        <label for="" class="form-label lblmrt">ईमेल </label>
                        <input type="email" class="form-control" id="" placeholder="" name="app_email"
                            required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Date of Birth </label>
                        <label for="" class="form-label lblmrt"> जन्मदिनांक </label>
                        <input type="date" class="form-control" id="" placeholder="" name="app_dob"
                        max="<?php echo date("Y-m-d"); ?>"  required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Gender of the Child</label>
                        <label for="" class="form-label lblmrt">लिंग </label>

                        <select class="form-select" name="gender" required>
                            <option value="">-Select-</option>
                            <option   value="1">Male</option>
                            <option  value="2">Female</option>
                            <option  value="3">Transgender</option>
                            <option  value="4">Other </option>
                        </select>


                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Name of Child  </label>
                        <label for="" class="form-label lblmrt">अपत्याचे नाव </label>
                        <input type="text" class="form-control" id="" placeholder="" name="child_name"
                            required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Father's Full Name </label>
                        <label for="" class="form-label lblmrt">वडिलांचे पूर्ण नाव </label>
                        <input type="text" class="form-control" id="" placeholder="" name="fath_name"
                            required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Grandfather's Name </label>
                        <label for="" class="form-label lblmrt"> आजोबांचे नाव </label>
                        <input type="text" class="form-control" id="" placeholder=""
                            name="grand_fath_name" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Mother's Full Name </label>
                        <label for="" class="form-label lblmrt">आईचे पूर्ण नाव </label>
                        <input type="text" class="form-control" id="" placeholder="" name="moth_name"
                            required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-1">
                        <label for="" class="form-label lbleng">Place of Birth</label>
                        <label for="" class="form-label lblmrt"> जन्माचे ठिकाण </label>
                        <div class="d-flex mt-2 border rounded  p-2">
                            <div class="form-check ms-3">
                                <input type="radio" class="form-check-input" id="radio3" name="pob"
                                    value="1" required>Home
                                <label class="form-check-label" for="radio1"></label>
                            </div>

                            <div class="form-check ms-3">
                                <input type="radio" class="form-check-input" id="radio4" name="pob"
                                    value="2" required>Hospital
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                        </div>
                        <label id="pob-error" class="error" for="pob"></label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Hospital Name </label>
                        <label for="" class="form-label lblmrt">रुग्णालयाचे नाव </label>
                        <select class="form-select" name="hospital_name" required>
                            <option value="">-Select Hospital-</option>
                            @foreach ($hospitals as $hospitals)
                             <option  value="{{$hospitals->id}}">{{$hospitals->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Mother / Father Permanent Address </label>
                        <label for="" class="form-label lblmrt"> आई वडिलांचा  कायमचा पत्ता </label>
                        <input type="text" class="form-control" id="" placeholder=""
                            name="perm_address" required>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Ward No </label>
                        <label for="" class="form-label lblmrt"> प्रभाग क्र </label>
                        <select class="form-select" name="ward_no" required>
                            <option value="">-Select-</option>
                             @foreach ($wards as $wards)
                             <option  value="{{$wards->ward_id}}">{{$wards->ward_name}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>



            </div>

            <div class="row">

                <h6 class="mt-5"><strong> List of Documents (Attachment) </strong></h6>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Hospital Certificate (M)</label>
                        <input type="file" class="form-control" id="" placeholder="" name="hosp_file"
                        id="upload" onchange="readURL(this.value)"   required>
                    </div>

                    {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                        <div class="att_file">
                            <i class="fa-solid fa-file"></i> Hospital_certificate-0001.jpg <br>
                            <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                            <img id="img" src="#" alt="your image" />
                        </div>
                        <div class="mm_l">

                        </div>
                    </div> --}}

                </div>

                <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Father Aadhaar Card (M)</label>
                        <input type="file" class="form-control" id="" placeholder="" name="aadh_file_fath">
                    </div>

                    {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                        <div class="att_file">
                            <i class="fa-solid fa-file"></i> Mother_Father_AAdhar Card001.jpg <br>
                            <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                        </div>
                        <div class="mm_l">

                        </div>
                    </div> --}}

                </div>
                 <div class="col-md-3">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Mother Aadhaar Card (M)</label>
                        <input type="file" class="form-control" id="" placeholder="" name="aadh_file_moth">
                    </div>

                    {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                        <div class="att_file">
                            <i class="fa-solid fa-file"></i> Mother_Father_AAdhar Card001.jpg <br>
                            <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                        </div>
                        <div class="mm_l">

                        </div>
                    </div> --}}

                </div>

            </div>

            <div class="col-md-12">
                <div class="mb-5 mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check1" name="declaration"
                            value="something" required>

                        <label class="form-check-label ms-3 lbleng" style="margin-top: -15px;">
                            <strong>Declaration:- </strong>Kindly provide the said Birthcertificate, I am ready to pay
                            the prescribed fees. 
                           
                        </label>
                        <label class="form-check-label ms-3 lblmrt" style="margin-top: -15px;">
                            <strong>घोषणा:- </strong>  कृपया सदरील जन्म प्रमाणपत्र देण्यात यावे, मी नियमानुसार असलेली फीस भरण्यास तयार आहे
                           
                        </label>
                        

                    </div>
                    <label id="declaration-error" class="error" for="declaration"></label>
                </div>
            </div>


            <div class="col-md-12 text-start mb-5">
                <div>

                    <a href="#" class="btn btn-primary btn_sm printMe"> <i class="fa-solid fa-print"></i> View and Print </a>
                    <button class="btn btn-success btn_sm" type="submit" id="submitBtn"><i
                            class="fa-solid fa-check"></i> Submit </button>
                </div>
            </div>

        </form>






    </div>





    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script>
        $(".profile .icon_wrap").click(function() {
            $(this).parent().toggleClass("active");
            $(".notifications").removeClass("active");
        });

        $(".notifications .icon_wrap").click(function() {
            $(this).parent().toggleClass("active");
            $(".profile").removeClass("active");
        });

        $(".show_all .link").click(function() {
            $(".notifications").removeClass("active");
            $(".popup").show();
        });

        $(".close, .shadow").click(function() {
            $(".popup").hide();
        });




        /////////////////////

        $(document).ready(function() {
            //alert("d");
        });
        // add validation 
        $(function() {
            $("form[name='BirthForm']").validate({
                rules: {
                    app_name: "required",
                    app_address: "required",
                    app_dob: "required",
                    gender: "required",
                    child_name: "required",
                    fath_name: "required",
                    grand_fath_name: "required",
                    moth_name: "required",
                    pob: "required",
                    hospital_name: "required",
                    perm_address: "required",
                    ward_no: "required",
                    hosp_file: "required",
                    aadh_file_moth: "required",
                    aadh_file_fath: "required",
                    declaration: "required",

                    app_email: {
                        required: true,
                        email: true
                    },
                    app_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages: {
                    // app_name: "Please Enter Name",
                    // app_address: "Please Enter Address",
                    // app_dob: "Please Enter Date of Birth",
                    // gender: "Please Select Gender",
                    // child_name: "Please Enter Child Name",
                    // fath_name: "Please Enter Name",
                    // grand_fath_name: "Please Enter Name",
                    // moth_name: "Please enter Name",
                     declaration: "Please Agree the Declaration",

                    app_number: {
                        required: "Please Enter Mobile Number",
                        minlength: "Please Enter 10 digit valid Mobile Number",
                        maxlength: "Please Enter 10 digit valid Mobile Number",
                    },
                    app_email: "Please Enter a valid email address"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        // add validation 

        $('.printMe').click(function(){
            //alert("hi");
            window.print();
        });

        function readURL(input) {
           /// alert("ho");
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else{
            $('#img').attr('src', '/images/user.png');
        }
        }
    </script>
 
 <script>
$(document).ready(function(){
    //$(".lblmrt").hide();
        $('input[type=radio][name=balance]').change(function() {
        if (this.value == '1') {
            $(".lbleng").show();
            $(".lblmrt").hide();
        }
        else if (this.value == '2') {
            
            $(".lbleng").hide();
            $(".lblmrt").show();
        }
    });

});
 </script>
    





</body>

</html>
