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

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label>Location</label>
                                    <p>{{ $property->city }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>GIS ID</label>
                                    <p>{{ $property->gis_id }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Category of the property</label>
                                    <p>{{ $property->category->title }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Type of property</label>
                                    <p>{{ $property->sub_category->title }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>House No</label>
                                    <p>{{ $property->house_no }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Plot No</label>
                                    <p>{{ $property->plot_no }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Street Name/No/Road No</label>
                                    <p>{{ $property->street_details }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Colony/Locality Name</label>
                                    <p>{{ $property->locality_name }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Owner Name</label>
                                    <p>{{ $property->owner_name }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Contact No</label>
                                    <p>{{ $property->contact_no }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Remarks</label>
                                    <p>{{ $property->remarks }}</p>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label><b>Apartments Images</b></label>
                                    <div class="apart-images">
                                        @foreach ($property->images as $image)
                                            <img src="{{ asset('public/uploads/property/images/' . $image->file_url) }}"
                                                class="img-fluid">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 text-end">
                                    <button class="btn btn-warning me-2"><span class="mdi mdi-layers-edit me-2"></span>
                                        EDIT</button>
                                    <button class="btn btn-primary"><span class="mdi mdi-sync me-2"></span> UPDATE</button>
                                </div>
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
