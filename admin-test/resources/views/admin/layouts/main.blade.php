<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">







<head>



    <meta charset="utf-8" />

    <title>:: Canopy | QR Code Generation </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- App favicon -->

    <!--<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}">-->



    <!-- Layout config Js -->

    <script src="{{ asset('public/assets/js/layout.js') }}"></script>

    <!-- Bootstrap Css -->

    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->

    <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->

    <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- custom Css-->

    <link href="{{ asset('public/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('public/assets/css/animation_check.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        
        <style>
        
        #back-to-top{
                    display:none;
                }
            
            @media only screen and (max-width: 768px) {
                
                .text-end{
                    margin-top:20px;
                }
                
                .text-end button{
                    width:100%;
                }
                
                .card-body .d-flex{
                    flex-direction:column;
                }
                
                #back-to-top{
                    display:none;
                }
}   

            
        </style>
        
        

</head>



<body>





















    <!-- Begin page -->

    <div id="layout-wrapper">



        @include('admin.includes.header')



        <!-- removeNotificationModal -->

        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>

                    </div>

                    <div class="modal-body">

                        <div class="mt-2 text-center">

                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">

                            </lord-icon>

                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">

                                <h4>Are you sure ?</h4>

                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>

                            </div>

                        </div>

                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">

                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete

                                It!</button>

                        </div>

                    </div>



                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->

        <!-- Logout Confirmation Modal-->



        <!-- ========== App Menu ========== -->

        @include('admin.includes.sidebar')

        <!-- Left Sidebar End -->

        <!-- Vertical Overlay-->

        <div class="vertical-overlay"></div>



        <!-- ============================================================== -->

        <!-- Start right Content here -->

        <!-- ============================================================== -->

        <div class="main-content">



            @yield('content')

            <!-- End Page-content -->



            @include('admin.includes.footer')

        </div>

        <!-- end main content-->

        <div class="modal fade" id="logout-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modamodal-md ">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        Are you sure you want to logout ?
                    </div>
                    <div class="modal-footer pb-0 d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary"
                            onclick="event.preventDefault();document.getElementById('logout-form1').submit();">Logout</button>
                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- END layout-wrapper -->



    <!--start back-to-top-->

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">

        <i class="ri-arrow-up-line"></i>

    </button>

    <!--end back-to-top-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JAVASCRIPT -->

    <script src="{{ asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('public/assets/libs/simplebar/simplebar.min.js') }}"></script>

    <script src="{{ asset('public/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('public/assets/libs/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('public/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

    <script src="{{ asset('public/assets/js/plugins.js') }}"></script>



    <!-- prismjs plugin -->

    <script src="{{ asset('public/assets/libs/prismjs/prism.js') }}"></script>



    <script src="{{ asset('public/assets/js/app.js') }}"></script>





    <script src="{{ asset('public/assets/js/pages/modal.init.js') }}"></script>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <!--datatable export buttons scripts starts-->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <!--datatable export buttons scripts ends-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        toastr.options = {

            "closeButton": true,

            "debug": false,

            "newestOnTop": false,

            "progressBar": true,

            "positionClass": "toast-top-right",

            "preventDuplicates": false,

            "onclick": null,

            "showDuration": "300",

            "hideDuration": "1000",

            "timeOut": "5000",

            "extendedTimeOut": "1000",

            "showEasing": "swing",

            "hideEasing": "linear",

            "showMethod": "fadeIn",

            "hideMethod": "fadeOut"

        }
    </script>

    @stack('scripts')


    @yield('toastr')


</body>







</html>
