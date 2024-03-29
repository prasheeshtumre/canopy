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
            background-color: orangered !important;
        }

        .toast-success {
            background-color: green !important;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit QR Code</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <h4 class="mb-sm-0">Edit QR Codes</h4>

                    <div class="card">
                        <div class="card-body">
                            <form action="" id="qr_code" name="qr_code_form" method="post">
                                @csrf
                                <input type="hidden" class="form-control  " id="uuid" name="uuid" required readonly
                                    value="{{ $user->uuid }}">
                                <div class="row">
                                    <div class="col-xxl-3 col-md-2 mt-3">
                                        <div>
                                            <label for="" class="form-label">Select Client</label>
                                            <select class="form-select" name="client_id" id="client_id" required>
                                                <option value="">-Select-</option>
                                                @forelse($clients as $key=>$client)
                                                    <option
                                                        {{ $client->client_name == $user->client_name ? ' selected="selected"' : '' }}
                                                        value="{{ $client->client_id }}">{{ $client->client_name }}
                                                    </option>
                                                @empty
                                                    {{-- <option>-no options are available-</option> --}}
                                                @endforelse
                                            </select>
                                            {{-- <input type="text" class="form-control  " id="client_id" name="client_id"
                                                required readonly value="{{ $user->client_name }}"> --}}

                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-2 mt-3">
                                        <div>
                                            <label for="" class="form-label">Select Plan</label>
                                            <select class="form-select" name="plan_id" id="plan_id" required>
                                                <option value="">--Select Plan--</option>
                                                @forelse($plans as $key=>$plan)
                                                    <option
                                                        {{ $plan->plan_name == $user->plan_name ? ' selected="selected"' : '' }}
                                                        value="{{ $plan->plan_id }}">{{ $plan->plan_name }}
                                                    </option>
                                                @empty
                                                    {{-- <option>-no options are available-</option> --}}
                                                @endforelse
                                            </select>
                                            <input type="hidden" class="form-control  " id="plan_id_select"
                                                name="plan_id_select" required readonly value="{{ $user->plan_name }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-3 mt-3">
                                        <div>
                                            <label for="" class="form-label ">Enter Card Number </label>
                                            <input type="text" class="form-control  " id="card_number" name="card_number"
                                                required readonly value="{{ $user->card_no }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-3 mt-3">
                                        <div>
                                            <label for="" class="form-label">Date of Birth </label>
                                            <input type="date" class="form-control  " id="dob" name="dob"
                                                required value="{{ date('Y-m-d', strtotime($user->dob)) }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4 mt-3">
                                        <div>
                                            <label for="" class="form-label">Effective Date </label>
                                            <input type="date" class="form-control  " id="effective_date"
                                                name="effective_date"
                                                value="{{ date('Y-m-d', strtotime($user->effective_date)) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-3 mt-3">
                                        <div>
                                            <label for="" class="form-label">Termination date </label>
                                            <input type="date" class="form-control filter_input" id="termination_date"
                                                name="termination_date"
                                                value="{{ date('Y-m-d', strtotime($user->terminatiion_date)) }}" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button class="btn btn-success " id=" "><i class="fa fa-check"></i>
                                        Update QR Code</button>
                                </div>
                            </form>
                            <div class="">
                                <a target="__blank" href="{{ url('public/' . $user->qr_path) }}">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-download"></i>
                                        Download QR
                                    </button>
                                </a>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection

@push('scripts')
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <script src="{{ asset('public/assets/js/toast.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Initialize select2 plugin
        $(document).ready(function() {
            $('#client_id').select2();
            $('#plan_id').select2();
        });
    </script>



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

        $(document).ready(function() {
            // $(document).on('load', '#client_id', function(e) {
            let c_id = $('#client_id').val();
            let selectedPlanId = $('#plan_id_select').val();
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
                            var selected = (value.plan_name === selectedPlanId) ? true : false;
                            $('#plan_id').append($("<option/>", {
                                value: value.plan_id,
                                text: value.plan_name,
                                selected: selected
                            }));
                        });
                    }
                }
            });
        });
    </script>





    <script>
        $('.users-tabled').DataTable({
            "bFilter": false, // hide search input
            "bPaginate": false // hide pagination
        });


        $(function() {
            var table = $('.users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.users') }}",
                    data: function(d) {
                        d.plan_name = $('#plan-filter').val(),
                            d.search_date = $('#date-filter').val()
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'plan_name',
                        name: 'plan_name'
                    },
                    {
                        data: 'card_no',
                        name: 'card_no'
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'effective_date',
                        name: 'effective_date'
                    },
                    {
                        data: 'termination_date',
                        name: 'termination_date'
                    },
                    {
                        data: 'created_att',
                        name: 'created_att'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],

                "order": [
                    [0, "desc"]
                ]
            });

            $('#plan-filter')
                .keyup(
                    function() {
                        $.fn.dataTable.ext.errMode = 'throw';
                        table.draw();
                    });
            $('#date-filter')
                .change(
                    function() {
                        $.fn.dataTable.ext.errMode = 'throw';
                        table.draw();
                    });
        });





        // form submission
        $('form[name=qr_code_form]').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            //   console.log(formData);
            $.ajax({
                url: ' {{ route('admin.update') }} ',
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

                    } else {
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
@section('toastr')
    @if (Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message') }}")
        </script>
    @endif
@endsection
