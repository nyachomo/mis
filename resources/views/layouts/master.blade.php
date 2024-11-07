<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TTI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--Google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">

  <!--Google fonts-->

</head>
  
  <style>

  body{
    font-family: "Afacad Flux", sans-serif !important;
    font-optical-sizing: auto;
    font-weight: weight;
    font-style: normal;
    font-variation-settings:
      "slnt" 0;
  }


    .supLeed{
      color:red !important;
    }


    ul,ol{
    list-style-type: none;
    }

    .cad-header-border{
        border-right:1px solid red;
    }
    .btn{
        border-radius:3px;
    }
    
    .modal-xl{
      width:100%;
      left:44px
    }

    a {
            text-decoration: none;
    }

    .card{
    border:1px solid white !important;
    }
    sup{
        color:red;
    }
    .btn-group{
    float:right !important;
    }
    .modal-footer{
        border:1px solid #ffffff !important;
    }
    .darkBlue{
        background-color:#000033 !important;
        color:#ffffff !important;
        border:1px solid #000033 !important;
    }

    .orange{
        background-color:#fe730c !important;
        color:#ffffff !important;
        border:1px solid #fe730c !important;
    }

    .lightColor{
        background-color:#33cccc !important;
        color:#ffffff !important;
        border:1px solid #33cccc !important;
    }

    thead{
        background-color:#000033 !important;
        color:white;
    }

    .addButton{
        background-color:#000033 !important;
        color:white;
    }

    .themecolor{
        background-color:#000033 !important;
    }

  
    .las1{
        color:#39ac73 !important;
    }

    .las2{
        color:#ffa31a !important;
    }

    .las3{
        color:#ff0000 !important;
    }

    .btn-warning{
        color:white !important;
    }

   label{
    color: #527a7a;
   }




    #sidebar {
        width: 250px;
        background: #f4f4f4;
        padding: 20px;
        border-right: 1px solid #ccc;
    }

    #search {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    #nav-links {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }


    #nav-links li.hidden {
        display: none;
    }

    #nav-links li.active a {
        background-color: red;
        color: white; /* Ensure text is readable on the red background */
    }

    .card-header{
      background-color:white !important;
      border:1px solid white !important;
    }

    sup{
      color:black !important;
    }

    .downloadScholarshipLetterBtn{
      border-radius:50px !important;
    }



    table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /*box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);*/
        }
        th, td {
            padding: 2px;
            text-align: left;
            border: 1px solid #ddd;
        }
        thead {
            background-color: #000033;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }


 </style>

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
     
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @auth
             Hello ! {{ Auth::user()->user_firstname }} {{Auth::user()->user_secondname}}{{Auth::user()->user_lastname}}
          @else
              Hello, Guest!
          @endauth
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center" style="padding-left:20px;">
             <p class="text-sm" ><a href="{{route('showUserProfile')}}" style="color: #75a3a3"><i class="fa fa-user"></i> My Account</a></p><br>

              <p class="text-sm">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  <a href="{{ route('logout') }}" style="color: #75a3a3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  {{ __('Logout') }} </a>
                    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </p>

          <a href="#" class="dropdown-item">
            
          </a>
         
         
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center> <a href="#" class="brand-link" style="background-color:white;">
      <img src="{{asset('logo/logo1.jpeg')}}"
           alt="TechSphere" style="width:100%;height:45px">
      <span class="brand-text font-weight-light">TECHSPHERE</span>
    </a>
    </center>

    <!-- Sidebar -->

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!-- <img src="{{asset('images/user_profile/profile.png')}}" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          @if(Auth::check())
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          @else
          <a href="#" class="d-block">Guest</a>
          @endif
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @if(Auth::check()&&Auth::user()->is_admin=='Yes')
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- <input type="text" id="search" placeholder="Search...">-->
            <li class="nav-header">HOME</li>
          
            <li class="nav-item">
              <a href="{{route('adminViewLeeds')}}" class="nav-link">
                <i class="nav-icon fas fa-tree text-warning"></i>
                <p>Leeds<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('showApplicants')}}" class="nav-link">
                <i class="nav-icon fas fa-tree text-warning"></i>
                <p>Applicants <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('feePayments')}}" class="nav-link">
                <i class="nav-icon fas fa-tree text-warning"></i>
                <p>Fee Payments <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            

           

           

            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-tree text-warning"></i>
                <p>Dashboard <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('showUserProfile')}}" class="nav-link">
                <i class="nav-icon fas fa-tree text-warning"></i>
                <p>My Account<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>
          
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users text-info"></i>
                <p>
                  Institutional Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="padding-left:30px">
                

                <li class="nav-item has-treeview">
                  <a href="{{route('adminShowManagement')}}" class="nav-link"> <p> Management</p> </a>
                </li>

                <li class="nav-item" >
                  <a href="{{route('adminShowUsers')}}" class="nav-link">
                  
                    <p>Users</p>
                  </a>
                </li>

                <li class="nav-item has-treeview">
                  <a href="{{route('adminShowTrainers')}}" class="nav-link"> <p> Trainers</p> </a>
                </li>

                <li class="nav-item has-treeview">
                  <a href="{{route('adminShowTrainees')}}" class="nav-link"> <p> Trainees</p> </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="{{route('adminShowDepartments')}}" class="nav-link">
                <i class="nav-icon fas fa-tree text-warning"></i>
                <p>Department <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('adminShowCourses')}}" class="nav-link">
                <i class="nav-icon fas fa-copy text-success"></i>
                <p>Training Programs <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('adminShowClas')}}" class="nav-link">
                <i class="fas fa-home nav-icon text-danger"></i>
                <p>Training Clases <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

          

          
          
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit text-warning"></i>
                <p>
                  Training Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('adminShowSubjects')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Units</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{route('adminShowTopics')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Manage Topics
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit text-warning"></i>
                <p>
                  Student Assesment
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('adminShowStudentAssignments')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assignment</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('adminShowStudentCats')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cats</p>
                  </a>
                </li>

                <li class="nav-item has-treeview">
                  <a href="{{route('adminShowStudentFinalExam')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Final Exam
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="{{route('adminShowSchools')}}" class="nav-link">
                <i class="fas fa-home nav-icon text-danger"></i>
                <p>Schools<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('adminShowHighSchoolTeachers')}}" class="nav-link">
                <i class="fas fa-home nav-icon text-danger"></i>
                <p>High School Teachers<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            

          </ul>
        @endif

        @if(Auth::check()&&Auth::user()->is_trainee=='Yes' &&Auth::user()->has_paid_reg_fee=='Yes')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">HOME</li>
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="fa fa-tachometer text-danger" aria-hidden="true"></i>
                <p>Dashboard <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('showUserProfile')}}" class="nav-link">
              <i class="fa fa-map-o text-success" aria-hidden="true"></i>
                <p>My Account<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

           

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="fa fa-hourglass-o text-danger" aria-hidden="true"></i>
                <p>
                  My Courses
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="padding-left:25px">
              <li class="nav-item">
                  <a href="{{route('traineeViewAllCourses')}}" class="nav-link">
                  
                    <p>All Courses</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('trainee_View_his_her_course')}}" class="nav-link">
                   
                    <p>My Courses</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="fa fa-flag-o text-info" aria-hidden="true"></i>
                <p>
                  My Assesments
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="padding-left:35px">
                <li class="nav-item">
                  <a href="{{route('traineeViewAssignments')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assignment</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('traineeViewCats')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cats</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{route('traineeViewFinalExam')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Final Exam
                    </p>
                  </a>
                </li>

                <!--<li class="nav-item has-treeview">
                  <a href="{{route('traineeViewFinalExam')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      My Project
                    </p>
                  </a>
                </li>-->

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
               <i class="fa fa-calendar text-success" aria-hidden="true"></i>
                <p>Timetable<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-money text-info" aria-hidden="true"></i>
                <p>Payments<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

           
           

            <li class="nav-item">
              <a href="#" class="nav-link">
                 <i class="fa fa-envelope-o text-danger" aria-hidden="true"></i>
                <p>Communication<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                 <i class="fa fa-file-text-o text-warning" aria-hidden="true"></i>
                <p>News and Events<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-folder-open-o text-info" aria-hidden="true"></i>
                <p>Documentation<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>
        

        </ul>
        @endif


        @if(Auth::check()&&Auth::user()->is_trainee=='Yes' &&Auth::user()->has_paid_reg_fee!='Yes')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">HOME</li>

           <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="fa fa-tachometer text-danger" aria-hidden="true"></i>
                <p>Dashboard <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>
            
            <li class="nav-item">

              <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-map-o text-success" aria-hidden="true"></i>
                <p>LogOut<i class="right fas fa-angle-right"></i></p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
            </li>

           


        

        </ul>
        @endif


        @if(Auth::check()&&Auth::user()->is_high_school_teacher=='Yes')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">HOME</li>
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="fa fa-tachometer text-danger" aria-hidden="true"></i>
                <p>Dashboard <i class="right fas fa-angle-right"></i></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('showUserProfile')}}" class="nav-link">
              <i class="fa fa-map-o text-success" aria-hidden="true"></i>
                <p>My Account<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

           

            <li class="nav-item">
              <a href="{{route('showLeeds')}}" class="nav-link">
                <i class="fa fa-users text-info" aria-hidden="true"></i>
                <p>Students<i class="right fas fa-angle-right"></i></p>
              </a>
            </li>

        </ul>
        @endif


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('sweetalert::alert')
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="#">TECHSPHERE TRAINING INSTITUTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- DataTables -->

<!-- ChartJS -->
<script src="{{asset('admin/plugins/chartjs/Chart.min.js')}}"></script>

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })

  $(function () {
    // Summernote
    $('.addTopic').summernote()
  })

  $(function () {
    // Summernote
    $('.question').summernote()
  })

  $(function () {
    // Summernote
    $('.answer').summernote()
  })
</script>

<script>
  $(function () {
    $("#workExperience").DataTable();
    $("#educationExperience").DataTable();
    $("#educationAchievements").DataTable();
    $("#example1").DataTable();
    $("#showUsersTable").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>




<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

</body>
</html>
