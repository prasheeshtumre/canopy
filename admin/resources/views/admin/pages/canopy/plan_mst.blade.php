@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" />
    
    
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
                        <h4 class="mb-sm-0">All Plans</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

           
            
            
            
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <a href="{{route('admin.newplan-add')}}" type="button" class="btn btn-primary align-right mb-4">Add New Plan</a>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1 ">
                                

                            </div>
                            <div class="row ">
                                        <div class="col-xxl-3 col-md-2 mt-3">
                                            <label>Search Plan</label>
                                            <input type="text" name="searchTerm" placeholder="Search by Plan Name">
                                        </div>
                                        <!--<div class="col-xxl-3 col-md-2 mt-3">-->
                                        <!--    <label>Search Date</label>-->
                                        <!--    <input type="text" name="search_date" id="date-filter">-->
                                        <!--</div>-->
                            </div>
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered users-table" style="width:100%">
                                    <thead>
                                        <tr class="table-success">
                                            <th>Sl.no</th>
                                            <th>Plan Name </th>
                                            @foreach($categories as $cat)
                                                <th>{{$cat->category_name}}</th>
                                            @endforeach
                                            <th>Action</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach($plans as $plan)
                                             <tr class="table-success">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$plan->plan_name}}</td>
                                                @foreach($plan->planCategoryMap as $key => $val)
                                                    <td>{{$val->category_limit_name}}</td>
                                                @endforeach()
                                                <th><a href="{{url('admin/edit-plan')}}/{{$plan->plan_id}}"><i class="fas fa-edit"></i></a> </th>
                                             </tr>
                                         @endforeach
                                      
                                    </tbody>
                                </table>
                                <!--{{ $plans->links() }}-->
                                <div id="paginationContainer">
                                       {{ $plans->links() }}
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- End Table Content-->


       

            <!--end row-->


       

            <!--end row-->

        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
   
@endsection

@push('scripts')
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script src="{{ asset('assets/js/toast.js') }}"></script>
    <script>
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
        <script>
            function updateTableAndPagination(data) {
                // $('#tableContainer').html(data.table);
                 $('.users-table tbody').html(data.table);
                 $('#paginationContainer').html(data.pagination);
            }
        
            $(document).ready(function () {
                $('input[name="searchTerm"]').keyup(function () {
                    // Reset page to 1 when a new search term is entered
                    const page = 1;
                   const ajaxUrl = '{{ route("search-plans") }}'
        
                    $.ajax({
                        type: 'GET',
                        url: ajaxUrl, // Define your route here
                        data: {
                            searchTerm: $(this).val(),
                            page: page
                        },
                        
                        success: function (data) {
                            // console.log(data)
                            updateTableAndPagination(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });
        
                // Handle pagination links
                $(document).on('click', '#paginationContainer .pagination a', function (e) {
                    e.preventDefault();
        
                    const page = $(this).attr('href').split('page=')[1];
                    const searchTerm = $('input[name="searchTerm"]').val();
        
                    $.ajax({
                        type: 'GET',
                        url: '{{ route("search-plans") }}', // Define your route here
                        data: {
                            searchTerm: searchTerm,
                            page: page
                        },
                        success: function (data) {
                            updateTableAndPagination(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });
            });
        </script>


@endpush
