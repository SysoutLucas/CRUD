<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('DataTables/css/jquery.dataTables.css')}}" rel="stylesheet">
  <link href="{{url('DataTables/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('css/custom.css')}}" rel="stylesheet">
  

</head>

<body class="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">
         <!-- Content Wrapper -->
        
        @include('layout.include.sidebar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    @include('layout.include.topbar')
                    @yield('content')
                </div>


            </div>
            
    </div>
    
    
  
    
  <!-- Bootstrap core JavaScript>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  < Core plugin JavaScript>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script-->

  <!-- Custom scripts for all pages-->
  
  <script src="{{url('js/jquery/jquery.min.js')}}"></script>
  <script src="{{url('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('jquery-validation-1.19.2/dist/jquery.validate.min.js')}}"></script>
  <script src="{{url('DataTables/js/jquery.dataTables.js')}}"></script>
  <script src="{{url('DataTables/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{url('js/sb-admin-2.min.js')}}"></script>
  @yield('scripts')

</body>

</html>
