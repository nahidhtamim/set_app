<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/images/logo.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('admin/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{asset('admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/style.min.css')}}" rel="stylesheet">



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="https:////cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('admin/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.admin_includes.navbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.admin_includes.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            @yield('contents')

             <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layouts.admin_includes.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->


        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <script>
        CKEDITOR.replace( 'long_desc' );
        CKEDITOR.replace( 'place_description' );
        CKEDITOR.replace( 'locker_description' );
        CKEDITOR.replace( 'sport_description' );
    </script>

    <script src="{{asset('admin/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admin/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.9/sweetalert2.min.js"></script>
    <!--chartis chart-->
    <script src="{{asset('admin/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
    <script
        src="{{asset('admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}">
    </script>
    <script src="{{asset('admin/js/pages/dashboards/dashboard1.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
    <script> 
        $(document).ready(function(){
          let row_number = 1;
          $("#add_row").click(function(e){
          e.preventDefault();
          let new_row_number = row_number - 1;
          $('#locker_row' + row_number).html($('#locker_row' + new_row_number).html()).find('td:first-child');
          $('#influencer_table').append('<tr id="locker_row' + (row_number + 1) + '"></tr>');
          row_number++;
        });
      
          $(".delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
              $("#locker_row" + (row_number - 1)).html('');
              row_number--;
            }
          });
        });
      </script> 
      {{-- @if(session('status'))
      <script>
        swal("{{session('status')}}")
      </script>
      @elseif(session('warning'))
      <script>
        swal("{{session('warning')}}")
      </script>
      
    @endif --}}
      <script type="text/javascript">
        $('#place_id').on('change', function () {
            get_service_by_place();
        });

        function get_service_by_place() {
            var place_id = $('#place_id').val();
            $.post('{{ route('getPlaceServices') }}', {
                    _token: '{{ csrf_token() }}',
                    place_id: place_id
                },
                function (data) {
                    $('#service_id').html(null);
                    $('#service_id').append($('<option value="">SET Service</option>', {}));
                    for (var i = 0; i < data.length; i++) {
                        $('#service_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name
                        }));
                    }
                });
        }
    </script>


    
</body>

</html>