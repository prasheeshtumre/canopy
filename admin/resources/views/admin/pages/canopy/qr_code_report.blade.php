@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            background-color: orangered !important;
        }

        .toast-success {
            background-color: green !important;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start display-->
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1 ">
                                <!--<h5>Department Wise </h5>-->
                                <!--<div>-->
                                <!--    <button class="btn btn-warning btn-sm ms-1 export-btn" data-export="buttons-print"><i-->
                                <!--            class="fa-solid fa-print"></i>-->
                                <!--        Print</button>-->
                                <!--    <button class="btn btn-secondary btn-sm ms-1 export-btn"-->
                                <!--        data-export="buttons-excel"><i class="fa-solid fa-file-excel me-1"></i>-->
                                <!--        Excel</button>-->
                                <!--    <button class="btn btn-primary btn-sm ms-1 export-btn" data-export="buttons-pdf"> <i-->
                                <!--            class="fa-regular fa-file-pdf me-1"></i>-->
                                <!--        PDF</button>-->
                                <!--    <button class="btn btn-info btn-sm ms-1 export-btn" data-export="buttons-csv"><i-->
                                <!--            class="fa-solid fa-file-csv me-1"></i>-->
                                <!--        CSV</button>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--    <div class="form-group search-icon-main">-->
                                <!--        <input type="search" placeholder="Search... " class="form-control"-->
                                <!--            id="fltr_search">-->
                                <!--        <div class="search-icon">-->
                                <!--            <i class="fa-solid fa-magnifying-glass fa-beat"></i>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                            </div>
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-xxl-3 col-md-2 mt-3">
                                        <label>Search Plan</label>
                                        <input class="form-control" type="text" name="plan_name" id="plan-filter">
                                    </div>
                                    <div class="col-xxl-3 col-md-2 mt-3">
                                        <label>Search Card Number</label>
                                        <input class="form-control" type="text" name="card_no" id="card-no">
                                    </div>
                                    <div class="col-xxl-3 col-md-2 mt-3">
                                        <label>Search Created Date</label>
                                        <input class="form-control" type="date" name="search_date" id="date-filter">
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-success " id=" "><i class="fa fa-check"></i>
                                            Submit</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered users-tabled" style="width:100%">
                                    <thead>
                                        <tr class="table-success">
                                            <th>Sl.no</th>
                                            <th>Plan </th>
                                            <th>Card Number</th>
                                            <th>Date of Birth</th>
                                            <th>Effective Date</th>
                                            <th>Termination date</th>
                                            <th>Created At</th>
                                            <th>Edit</th>
                                            <th class="noExport">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php
                                            $sno = 1;
                                        @endphp
                                        @foreach ($qr_codes as $key => $qr_code)
                                            <tr>
                                                <td>{{ $sno++ }}</td>
                                                <td>{{ $qr_code->plan->plan_name }}</td>
                                                <td>{{ $qr_code->card_no }}</td>
                                                {{-- <td>{{ $qr_code->dob }}</td>
                                                <td>{{ $qr_code->effective_date }}</td>
                                                <td>{{ $qr_code->terminatiion_date }}</td> --}}

                                                <td>{{ date('d-M-Y', strtotime($qr_code->dob)) }}</td>
                                                <td>{{ date('d-M-Y', strtotime($qr_code->effective_date)) }}</td>
                                                <td>{{ date('d-M-Y', strtotime($qr_code->terminatiion_date)) }}</td>



                                                <td>{{ date('d-m-Y', strtotime($qr_code->created_at)) }}</td>
                                                <td><a target="__blank" href="{{ route('admin.edit', $qr_code->uuid) }}">
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                                            Edit</button>
                                                    </a></td>
                                                <td>
                                                    <a target="__blank" href="{{ url('public/' . $qr_code->qr_path) }}">
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-download"></i>
                                                            Download QR
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $qr_codes->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection
@push('scripts')
    <script>
        $('.users-tabled').DataTable({
            "bFilter": false, // hide search input
            "bPaginate": false // hide pagination
        });
    </script>
@endpush
