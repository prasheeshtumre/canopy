@include('header');


<div class="container mt-3">

    <div class="d-flex justify-content-between align-item-center mm_flx mb-3">

        <h4>Application For Change of Ownership Property</h4>

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

    <form name="propertyForm" method="POST" action="{{ route('insertData') }}" id="BirthForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Name of Applicant</label>
                    <label for="" class="form-label lblmrt"> अर्जदाराचे नाव </label>
                    <input type="text" class="form-control" id="" placeholder="" name="app_name" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 mt-0">
                    <label for="" class="form-label lbleng">Address </label>
                    <label for="" class="form-label lblmrt"> पत्ता </label>
                    <textarea class="form-control" rows="3" name="app_address"></textarea>
                </div>
            </div>


        </div>




        <div class="row">
            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Contact Number </label>
                    <label for="" class="form-label lblmrt"> संपर्क क्रमांक </label>
                    <input type="text" class="form-control" id="" placeholder="" name="app_mobile">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Type of transfer</label>
                    <label for="" class="form-label lblmrt"> हस्तांतरणाचा प्रकार </label>
                    <select class="form-select" name="transfer_type">
                        <option value="">-select-</option>
                        @foreach ($TransferType as $val)
                        <option  value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Property Number </label>
                    <label for="" class="form-label lblmrt"> मालमत्ता क्रमांक</label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_number" >
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Usage</label>
                    <label for="" class="form-label lblmrt"> वापर </label>
                    <select class="form-select" name="usage">
                        <option value="">-select-</option>
                        @foreach ($usage as $val)
                        <option  value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Tap Account Number  </label>
                    <label for="" class="form-label lblmrt"> नळ खाते क्रमांक </label>
                    <input type="text" class="form-control" id="" placeholder="" name="tap_account_number">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Usage</label>
                    <label for="" class="form-label lblmrt"> वापर </label>
                    <select class="form-select" name="usage" required>
                        <option value="">-select-</option>
                        @foreach ($usage as $val)
                        <option  value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Name of Previous Owner </label>
                    <label for="" class="form-label lblmrt"> पूर्वीचा मालकाचे नाव </label>
                    <input type="text" class="form-control" id="" placeholder="" name="pre_own_name">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3 mt-0">
                    <label for="" class="form-label lbleng"> Property Address </label>
                    <label for="" class="form-label lblmrt">  मालमत्तेचा पत्ता </label>
                    <textarea class="form-control" rows="3" name="prop_address"></textarea>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> Zonal Office </label>
                    <label for="" class="form-label lblmrt">  झोन कार्यालय </label>
                    <select class="form-select" name="zonal_office">
                        <option value="">-select-</option>
                        @foreach ($ZonalOffice as $val)
                        <option  value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> Full name of the person in whose name the <br> property
                        is to be renamed </label>
                        <label for="" class="form-label lblmrt">  ज्यांचे नावे मालमत्ता नामांतर
                            करायचे आहे त्यांचे पूर्ण नाव</label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_holder_name">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3 mt-0">
                    <label for="" class="form-label lbleng"> Full Address  </label>
                    <label for="" class="form-label lblmrt">  पूर्ण पत्ता </label>
                    <textarea class="form-control" rows="3" name="prop_holder_address"></textarea>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Mobile  </label>
                    <label for="" class="form-label lblmrt"> मोबाइल </label>
                    <input type="text" class="form-control" id="" placeholder=""  name="prop_holder_mobile">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> Email Address </label>
                    <label for="" class="form-label lblmrt">  ई-मेल आडी </label>
                    <input type="text" class="form-control" id="" placeholder=""  name="prop_holder_email">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng">Property boundaries  </label>
                    <label for="" class="form-label lblmrt">मालमत्तेची चतु:सीमा </label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_boundries">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> East </label>
                    <label for="" class="form-label lblmrt">  पूर्वेस </label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_east">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> West  </label>
                    <label for="" class="form-label lblmrt"> पश्चिमेस </label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_west">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> North  </label>
                    <label for="" class="form-label lblmrt"> उत्तरेस </label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_north">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label lbleng"> South </label>
                    <label for="" class="form-label lblmrt">  दक्षिणेस </label>
                    <input type="text" class="form-control" id="" placeholder="" name="prop_south">
                </div>
            </div>

        </div>

        <div class="row">

            <h6 class="mt-5"><strong> List of Documents (Attachment) </strong></h6>

            <div class="col-md-3">
                <div class="mb-3 mt-4">
                    <label for="" class="form-label">Aadhaar Card </label>
                    <input type="file" class="form-control" id="" placeholder="" name="aadhar_file">
                </div>

                {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                    <div class="att_file">
                        <i class="fa-solid fa-file"></i> aadharcard-0001.jpg <br>
                        <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                    </div>
                    <div class="mm_l">

                    </div>
                </div> --}}

            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">CIDCO / MHADA tenement transfer / PR Card OR 7/12 /
                        Gunthewari Certificate</label>
                    <input type="file" class="form-control" id="" placeholder="" name="cidio_file">
                </div>

                {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                    <div class="att_file">
                        <i class="fa-solid fa-file"></i> cidco001.jpg <br>
                        <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                    </div>
                    <div class="mm_l">

                    </div>
                </div> --}}

            </div>


            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Type of Transfer / (Inheritance / Gift / <br> Sale Deed /
                        Will)</label>
                    <input type="file" class="form-control" id="" placeholder="" name="trans_type_file">
                </div>

                {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                    <div class="att_file">
                        <i class="fa-solid fa-file"></i> Typetrasfer0001.jpg <br>
                        <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                    </div>
                    <div class="mm_l">

                    </div>
                </div> --}}

            </div>


            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label"> Existing property tax and Water tax paid receipt OR No
                        Dues
                        Certificate</label>
                    <input type="file" class="form-control" id="" placeholder="" name="tax_file">
                </div>

                {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                    <div class="att_file">
                        <i class="fa-solid fa-file"></i> existing_property0001.jpg <br>
                        <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                    </div>
                    <div class="mm_l">

                    </div>
                </div> --}}

            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label"> Affidavit </label>
                    <input type="file" class="form-control" id="" placeholder="" name="affidative_file">
                </div>

                {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                    <div class="att_file">
                        <i class="fa-solid fa-file"></i> affidavit0001.jpg <br>
                        <small>&nbsp; &nbsp; <a href="#"> Priview </a></small>
                    </div>
                    <div class="mm_l">

                    </div>
                </div> --}}

            </div>

            <div class="col-md-3">
                <div class="mb-3 mt-3">
                    <label for="" class="form-label"> Death Certificate </label>
                    <input type="file" class="form-control" id="" placeholder="" name="death_file">
                </div>

                {{-- <div class="mb-3 mt-0 d-flex d-flex align-items-center">

                    <div class="att_file">
                        <i class="fa-solid fa-file"></i> deathcertificate0001.jpg <br>
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
                        value="something">

                    <label class="form-check-label ms-3 lbleng" style="margin-top: -15px;">
                      

                        (Affidavit: Completeness of the above information: True and correct and uploaded along with <br>
                        (I am sure that the documents are their original counter orders. I am ready to pay the
                        prescribed
                        fee for
                        name transfer. I am aware that the Municipal Corporation shall have full right to take legal
                        action
                        against me besides canceling the order of name transfer issued hereby if any information or
                        mistake
                        is
                        found in the application.)

                    </label>
                    <label class="form-check-label ms-3 lblmrt" style="margin-top: -15px;">
                        ( शपथपत्र : उपरोक्त माहिती पूर्णता : सत्य व बरोबर असून सोबत अपलोड केलेली<br>
                        कागदपत्रे त्यांच्या मूळ प्रतिबरहुकूम आहेत याची मला खात्री आहे .नामांतरसाठी निर्धारित शुल्क
                        भरण्यास
                        मी तयार आहे .अर्जातील
                        माहिती किंवा चूक आढळून आल्यास याद्वारे निर्गमित करण्यात आलेली नामांतर आदेश रद्द करण्यासोबतच
                        माझयावर
                        कायदेशीर
                        कार्यवाही करण्याचा महानगरपालिकेस पूर्ण अधिकार असेल याची मला जाणीव आहे .)

                       

                    </label>

                </div>
                <label id="declaration-error" class="error" for="declaration"></label>
            </div>
        </div>

        <div class="col-md-12 text-start mb-5 mt-5">
            <div>
                <button class="btn btn-primary btn_sm"> <i class="fa-solid fa-print"></i> View and Print </button>
                <button class="btn btn-success btn_sm" type="submit"><i class="fa-solid fa-check"></i> Submit </button>
            </div>
        </div>
    </form>




</div>


</div>

@include('footer');
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    /////////////////////


    // add validation
    $(function() {
        $("form[name='propertyForm']").validate({
            rules: {
                app_name: "required",
                app_address: "required",
                app_mobile: "required",
                transfer_type: "required",
                prop_number: "required",
                usage: "required",
                tap_account_number: "required",
                pre_own_name: "required",
                prop_address: "required",
                zonal_office: "required",
                prop_holder_name: "required",
                prop_holder_address: "required",
                prop_holder_mobile: "required",
                prop_holder_email: "required",
                prop_boundries: "required",
                prop_east: "required",
                prop_west: "required",
                prop_north: "required",
                prop_south: "required",
                aadhar_file: "required",
                cidio_file: "required",
                trans_type_file: "required",
                tax_file: "required",
                affidative_file: "required",
                death_file: "required",
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
                app_name: "Please Enter Applicant Name",
                app_address: "Please Enter Address",
                app_mobile: "Please Enter Contact Number",
                transfer_type: "Please Select Transfer Type",
                prop_number: "Please Enter Property Number ",
                usage: "Please Select Usage",
                tap_account_number: "Please Enter Tap Account Number",
                pre_own_name: "Please Enter Previous Owner Name",
                prop_address: "Please Enter Property Address",
                zonal_office: "Please Enter Zonal Office ",
                prop_holder_name: "Please Enter Full Name of the Person",
                prop_holder_address: "Please Enter Full Address",
                prop_holder_mobile: "Please Enter Mobile ",
                prop_holder_email: "Please Enter Email Address",
                prop_boundries: "Please Enter Property boundaries",
                prop_east: "Please Enter East ",
                prop_west: "Please Enter West ",
                prop_north: "Please Enter North",
                prop_south: "Please Enter South ",
                aadhar_file: "Please Select file",
                cidio_file: "Please Select file",
                trans_type_file: "Please Select file",
                tax_file: "Please Select file",
                affidative_file: "Please Select file",
                death_file: "Please Select file",
                declaration: "Please Accept our Declaration",
                app_mobile: {
                    required: "Please Enter Mobile Number",
                    minlength: "Please Enter 10 digit valid Mobile Number",
                    maxlength: "Please Enter 10 digit valid Mobile Number",
                },
                prop_holder_mobile: {
                    required: "Please Enter Mobile Number",
                    minlength: "Please Enter 10 digit valid Mobile Number",
                    maxlength: "Please Enter 10 digit valid Mobile Number",
                },
                
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    // add validation

</script>

</body>

</html>

