@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" />
    
    
    <link href="{{ asset('public/assets/css/toast.css') }}" rel="stylesheet">
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
        .toast-error {
            background-color:orangered !important;
        }
        .toast-success {
            background-color:green !important;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Client Master</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row ">
                <div class="col-xl-12 col-md-12">

                    <div class="card">
                        <div class="card-body">
                        <form action="{{url('/admin/add-client')}}" id="qr_code" name="qr_code_form" method="post">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div>
                                        <label for="" class="form-label ">Enter Client Id </label>
                                        <input type="text" class="form-control  " id="client_id" name="client_id" onkeypress="return /[a-zA-Z0-9]/.test(String.fromCharCode(event.charCode))">
                                   </div>
                                    @error('client_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div class="text-center">
                                       <button class="btn btn-success " id=" "><i class="fa fa-check"></i> Submit</button>
                                     </div>
                                </div>
                            </div>
                        </form>
                            
                        </div>


                    </div>

                </div>
            </div>
            
            <!-- start table content -->
            
            <!-- start page title -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class=" ">All Clients</h4>
                    </div>
                </div>
            </div>
            
            <div class="card">
                        <div class="card-body">
                        <form id="search_client" name="search_client_form" method="get">
                            <!--@csrf-->
                            <div class="row align-items-end">
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div>
                                        <label for="" class="form-label ">Search Client Id </label>
                                        <input type="text" class="form-control  " id="client_id_search" name="client_id_search" onkeypress="return /[a-zA-Z0-9]/.test(String.fromCharCode(event.charCode))">
                                   </div>
                                    @error('client_id_search')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div class="text-center">
                                       <button class="btn btn-success " id=" "><i class="fa fa-search"></i> Search</button>
                                     </div>
                                </div>
                            </div>
                        </form>
                            
                        </div>


                    </div>
                    
                    <div class="card" id="EditClient" style="display:none">
                        <div class="card-body">
                        <form id="edit_client" name="edit_client_form" method="get">
                            <!--@csrf-->
                            <div class="row align-items-end">
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div>
                                        <label for="" class="form-label ">Edit Client </label>
                                        <input type="hidden" name="client_id_edit" id="UpdateClientID" value="">
                                        <input type="text" class="form-control  " id="client_id_edit" name="client_name_edit" onkeypress="return /[a-zA-Z0-9]/.test(String.fromCharCode(event.charCode))">
                                   </div>
                                    @error('client_id_search')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-2 mt-3">
                                    <div class="text-center">
                                       <button class="btn btn-success " id=" "><i class="fa fa-edit"></i> Update</button>
                                     </div>
                                </div>
                            </div>
                        </form>
                            
                        </div>


                    </div>
            
            
            
            
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1 ">
                                

                            </div>
                            <!--<div class="row ">-->
                            <!--            <div class="col-xxl-3 col-md-2 mt-3">-->
                            <!--                <label>Search Plan</label>-->
                            <!--                <input type="text" name="plan_name" id="plan-filter">-->
                            <!--            </div>-->
                            <!--            <div class="col-xxl-3 col-md-2 mt-3">-->
                            <!--                <label>Search Date</label>-->
                            <!--                <input type="text" name="search_date" id="date-filter">-->
                            <!--            </div>-->
                            <!--</div>-->
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered users-table" style="width:100%">
                                    <thead>
                                        <tr class="table-success">
                                            <th>Sl.no</th>
                                            <th>Client Name </th>
                                           <th>Action </th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                      
                                        @foreach($clients as $client)
                                             <tr class="table-success">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$client->client_name}}</td>
                                                <td><button class="btn btn-success" onclick="return editClient({{$client->client_id}},'{{$client->client_name}}')"  id="Edit"  type="button">
                                                 <i class="fa fa-edit"></i>   Edit</button></td>
                                             </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                                {{ $clients->links() }}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- End Table Content-->


       

            <!--end row-->

        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
   
@endsection

@push('scripts')
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script src="{{ asset('public/assets/js/toast.js') }}"></script>
    
    
    
    <script>
    function editClient(client_id,client_name){
        if(client_id != '')
        {
            $('#EditClient').show();
            var clientIdInput = document.getElementById('UpdateClientID');
            clientIdInput.value = client_id;
        
        var clientNameInput = document.getElementById('client_id_edit');
        clientNameInput.value = client_name;
        }else{
            $('#EditClient').hide();
        }
}
    </script>
   <script>
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
    
@endpush
