@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    
    <link href="{{ asset('assets/css/toast.css') }}" rel="stylesheet">
    <style>
        .dt-buttons {
            display: none;
        }

        .dataTables_filter {
            display: none;
        }

        .search-icon {
            top: 7px !important;
        }
        .category-heading {
                padding: 15px 0px;
        }
        .category-heading h4 {
                font-weight: 700;
    font-size: 15px !important;
    text-transform: uppercase;
        }
        .toast-error {
            background-color: orangered !important;
        }
        .toast-success{
            background-color: green !important;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add New Plan </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-md-12">

                    <div class="card">
                        <!--@if ($errors->any())-->
                        <!--    <div class="alert alert-danger">-->
                        <!--        <ul>-->
                        <!--            @foreach ($errors->all() as $error)-->
                        <!--                <li>{{ $error }}</li>-->
                        <!--            @endforeach-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--@endif-->
                        
                        <div class="card-body">
                        <form action="{{url('admin/add-plan')}}"  method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div>
                                        <label for="" class="form-label">Select Client</label>
                                         <select class="form-select " name="client_id" id="client_id" >
                                             <option value="">-Select-</option>
                                             @foreach($clients as $client)
                                               <option @if($client->client_id == old('client_id')) selected @endif value="{{$client->client_id}}">{{$client->client_name}}</option>
                                             @endforeach
                                         </select>
                                          @error('client_id')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div>
                                        <label for="" class="form-label">Plan Name</label>
                                          <input type="text" class="form-control" value="{{old('plan_name')}}" id="" name="plan_name" >
                                    </div>
                                     @error('plan_name')
                                          <span class="text-danger">{{$message}}</span>
                                      @enderror
                                </div>
                                </div>
                                
                                  <div class="category-heading">
                                        <h4 class="mb-sm-0">Category Limit Name</h4>
                                  </div>
                                @foreach($categories as $cat)
                                     <div class="row align-items-center">      
                                        <div class="col-xxl-3 col-md-3 mt-3">
                                            <div class="text-center">
                                                <label for="" class="form-label "> {{$cat->category_name}} </label> 
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3 mt-3">
                                            <div>
                                               <input type="text" class="form-control" value="{{old('category_'.$cat->category_id)}}" id="dob" name="category_{{$cat->category_id}}">
                                                @error('category_'  . $cat->category_id)
                                                  <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                     </div>
                                @endforeach
                            
                            <div class="text-end mt-3">
                                
                                <button class="btn btn-success" type="submit">Submit </button>
                            </div>
                        </form>
                            
                        </div>


                    </div>

                </div>
            </div>
            
          
            
           
            
            
            
       


       

            <!--end row-->

        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
   
@endsection

@push('scripts')
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script src="{{ asset('assets/js/toast.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
       $(document).ready(function() {
            $('#client_id').select2();
        });
        $(document).on('change', '#client_id', function(e) {
            let c_id = $(this).val();
            $.ajax({
                type: "GET",
                data: {
                    c_id: c_id
                },
                url: "{{ url('admin/ajax/plan') }}",
                success: function(response) {
                    $('#plan_id').empty();
                    $("#plan_id").append(
                        '<option selected disabled value="">--Select Plan--</option>');
                    if (response) {
                        $.each(response, function(key, value) {
                            $('#plan_id').append($("<option/>", {
                                value: value.plan_id,
                                text: value.plan_name
                            }));
                        });
                    }
                }
            });
        });
    </script>
    <script>
        @if (Session::has('message'))
            toastr.success("{{ Session::get('message') }}")
        @endif
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
    <script>
  
            $(document).ready(function() {
                $('#status').on('change', function() {
                    var status = $(this).val();
                    if (status == 2 || status == 3) {
                        $('.resign_div').show();
                    } else {
                        $('.resign_div').hide();
                    }
                })
            });

            // form submission
            $('form[name=qr_code_form]').submit(function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                //   console.log(formData);
                $.ajax({
                    url: ' {{ route('admin.store') }} ',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    async: false,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, xhr) {
                        if (xhr.status == 201) {
                            $.toast({
                                heading: 'Success',
                                text: data.msg,
                                icon: 'success',
                                position: 'top-center',
                            });
                            $('form[name=qr_code_form]')[0].reset();
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000); // 3000 milliseconds = 3 seconds

                        }else{
                            $.toast({
                                    heading: 'error',
                                    text: data.msg,
                                    icon: 'error',
                                    position: 'top-center',
                                });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('.input-error').remove();
                        $('input').removeClass('is-invalid');

                        if (jqXHR.status == 422) {
                            for (const [key, value] of Object.entries(jqXHR.responseJSON.errors)) {

                                $.toast({
                                    heading: 'error',
                                    text: value,
                                    icon: 'error',
                                    position: 'top-center',
                                });

                                $('form[name=qr_code_form] input[name=' + key + ']').addClass(
                                    'is-invalid');
                                $('form[name=qr_code_form] input[name=' + key + ']').after(
                                    '<span class="text-danger input-error" role="alert">' + value +
                                    '</span>');

                                $('form[name=qr_code_form] select[name=' + key + ']').after(
                                    '<span class="text-danger input-error" role="alert">' + value +
                                    '</span>');

                            }
                        } else {
                            // alert('something went wrong! please try again..');
                        }
                    },
                });
            });
        </script>
@endpush
