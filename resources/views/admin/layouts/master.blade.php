<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Shree Ratna Pustakalaya</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets/frontend/img/calender.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets/backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets/backend/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets/backend/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/backend/css/themes/all-themes.css')}}" rel="stylesheet" />

   <!--summernote -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
</head>

<body class="theme-red">
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

@include('admin.layouts.topnav')
@include('admin.layouts.aside')

@yield('main-content')

<!-- Jquery Core Js -->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets/backend/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('assets/backend/js/admin.js')}}"></script>
<script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>

<!--- fontawesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $('#description').summernote({
        height:150
    });
</script>
<!-- Demo Js -->
<script src="{{asset('assets/backend/js/demo.js')}}"></script>
</body>

</html>
