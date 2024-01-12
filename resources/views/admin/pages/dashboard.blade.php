@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <!--
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Basic Elements</li>
                                        </ol>
                                    </div>
                -->

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-md-12">

                    <div class="card">
                        <div class="card-header align-items-center ">
                            <div>
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    ALL
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    Today
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    Week
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    Month
                                </button>
                            </div>
                        </div>
                        <!-- end card header -->

                    </div>

                </div>

            </div>

            <div class="row ">

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-bold text-dark text-truncate mb-0"> Surveyed Today</p>
                                </div>

                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                        <span class="counter-value" data-target="117">0</span>
                                    </h4>

                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-success rounded fs-3">
                                        <i class="bx bx-edit text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <div class="card card-animate bg-secondary crd_height text-center text-white" type="button">
                        <div class="card-body d-flex justify-content-center">
                            <div class="d-flex align-items-center">
                                <a class="" href="{{ route('admin.basic_details') }}" style="color:#fff;">
                                    <i class="bx bx-home la-2x"></i> <br>
                                    Add Property
                                </a>
                            </div>

                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->


            <!--end row-->










        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection
