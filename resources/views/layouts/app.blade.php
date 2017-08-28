<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fortinet</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.structure.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Plugins -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    

    <!-- Assets AdminLTE -->
    <link href="{{ asset('vendor/adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

    </script>
    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
  
  <!--datatables styles-->
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/css/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/css/buttons.jqueryui.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/css/buttons.dataTables.min.css') }}">

  <!--datatables scripts-->
    <script src="{{ asset('plugins/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.foundation.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.jqueryui.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.print.min.js') }}"></script>
    

    <!-- Config -->
    <script src="{{ asset('./js/config.js') }}"></script>

    <!-- Scripts AdminLTE -->
    <!-- <script src="{{ asset('vendor/adminlte/js/app.min.js') }}"></script> -->

    
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <div id="header" class="main-header">

            @include('partials.header') 

        </div>
        @if(!Auth::guest())
        <aside class="main-sidebar">
            @include('partials.sidebar')
        </aside>
        @endif
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    </div>
    @yield('scripts')
</body>

</html>
