@include('header');

<div class="container mt-3">

    <div class="d-flex justify-content-between align-item-center mm_flx mb-3">
        <!--<p>{{ session()->get('success') }}</p>-->
        <h4>Application Form For Birth Certificate</h4>

        {{-- <div class="d-flex align-items-center">

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

        </div> --}}

    </div>

    @if (session()->has('success'))
        <div class="col-12">
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        </div>
    @endif
    
        <div class="row">
            <form name="BirthForm" method="POST" action="{{ route('getApplicationData') }}" id="BirthForm"
            enctype="multipart/form-data">
            @csrf
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label lbleng">Application ID</label>
                       
                        <input type="text" class="form-control" id="" placeholder="" name="app_id" value="{{$application_data->rtiapplrefno}}" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3 mt-5">
                        <button class="btn btn-success btn_sm" type="submit" id="submitBtn"><i
                            class="fa-solid fa-check"></i> Get </button>
                    </div>
                </div>
            </form>
         
           <?php
           $status_data = array(0=>'In Process',1=>'Completed',5=>'Rejected');
         // echo $status_data[1]; exit();
         // echo   var_dump($application_data->workFlowStatus) ; exit();
           ?>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                       
                        <th scope="col">Names</th>
                        <th scope="col">Data</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td>Name of Applicant</td>
                        <td>{{$application_data->name}}</td>
                        
                      </tr>
                      <tr>
                       
                        <td> Applicant No</td>
                        <td>{{$application_data->rtiapplrefno}}</td>
                        
                      </tr>
                      <tr>
                        
                        <td>   Mobile No of applicant</td>
                        <td>{{$application_data->ph_no}}</td>
                      
                      </tr>
                      <tr>
                        
                        <td> Ward Name</td>
                        <td>{{$application_data->wardName}}</td>
                       
                      </tr>
                      <tr>
                        
                        <td> Name of Officer</td>
                        <td>{{$application_data->wardOffcierName}}</td>
                       
                      </tr>
                      <tr>
                        
                        <td> Application Status (Completed/Under Process/Rejected)</td>
                        <td><?php $che =(int)$application_data->workFlowStatus; echo  $status_data[$che]; ?></td>
                       
                      </tr>
                      <tr>
                        
                        <td>PDF file</td>
                        <td><a href="{{$application_data->pdfsavedpath}}" class="btn btn-primary btn_sm" ><i class="fa-solid fa-print"></i> Download PDF</a></td>
                       
                      </tr>
                    </tbody>
                  </table>
            </div>
          

        </div>



  



    </form>






</div>




@include('footer');








</body>

</html>
