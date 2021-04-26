<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
        @yield('title') | Fabcart-AdminPanel
  </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('assets/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/addons/datatables.min.css')}}" rel="stylesheet">

<!--summernote css -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .sidebar-fixed{height:100vh;width:270px;
    -webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.16),
    0 2px 10px 0 rgba(0,0,0,.12);box-shadow:0 2px 5px 0 rgba(0,0,0,.16),
    0 2px 10px 0 rgba(0,0,0,.12);z-index:1050;background-color:#fff;padding:0 1.5rem 1.5rem
    }

    .sidebar-fixed .list-group .active{
            -webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);
            -webkit-border-radius:5px;border-radius:5px
            }

    .sidebar-fixed .logo-wrapper{padding:2.5rem}
    .sidebar-fixed .logo-wrapper img{
        max-height:50px}@media (min-width:1200px){
                .navbar,.page-footer,main{padding-left:270px}}
                @media (max-width:1199.98px){
                .sidebar-fixed{display:none}}
                .container-for-admin{background-color: #eee!important;}
</style>

</head>

<body>

    <!--Main Navigation-->
<header>
     @include('layouts.include.adminnavbar')
     <!--include('layouts.app')-->
     @include('layouts.include.adminsidebar')
</header>
<!--Main Navigation-->

<!-- Main Layout -->
    <main class="pt-5 mx-lg-5">
        @yield('content')
    </main>
<!-- Mian Layout-->
@include('layouts.include.adminfooter')

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('assets/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src=" asset('assets/js/mdb.min.js')}}"></script>
  <script type="text/javascript" src=" asset('assets/js/addons/datatables.min.js')}}"></script>
<!--Datatables javascript-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

<!--summernote js-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!--summernote js-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!--This yield is for summernote-->
@yield('scripts')


</body>

</html>
