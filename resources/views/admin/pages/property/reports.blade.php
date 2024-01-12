@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Report Details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="t-head">
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>GIS ID</th>
                                            <th>Category of the property</th>
                                            <th>Type of property</th>
                                            <th>House No.</th>
                                            <!--<th>Plot No.</th>-->
                                            <!--<th>Street Name/No/Road No.</th>-->
                                            <th>Colony/Locality Name</th>
                                            <th>Owner Name</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                            <!--<th>Remarks</th>-->
                                            <!--<th>Capture</th>-->
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $property->gis_id }}</td>
                                                <td>{{ $property->category->title }}</td>
                                                <td>{{ $property->sub_category->title }}</td>
                                                <td>{{ $property->house_no }}</td>
                                                <!--<td>203</td>-->
                                                <!--<td>Madhuranagar</td>-->
                                                <td>{{ $property->locality_name }}</td>
                                                <td>{{ $property->owner_name }}</td>
                                                <td>{{ $property->contact_no }}</td>
                                                <td>
                                                    <a href="{{ route('admin.property.report_details', $property->id) }}">
                                                        <button class="btn btn-sm btn-primary">
                                                            View more
                                                        </button>
                                                    </a>
                                                </td>
                                                <!--<td>This house is located at madhuranagar</td>-->
                                                <!--<td>-->
                                                <!--    <img src="" class="img-fluid" />-->
                                                <!--</td>-->

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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
    <script></script>
    <script>
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
        @if (Session::has('message'))
            toastr.success("{{ Session::get('message') }}")
        @endif
    </script>
@endpush
