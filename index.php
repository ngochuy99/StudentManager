<!DOCTYPE html>
  <?php
    include"config.php";
    include"Check_login.php";
  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản lý đào tạo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Trang chủ</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light d-flex justify-content-center">QLĐT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="image">
        </div>
        <div class="info">
          <?php echo('<a href="#" class="d-block">'.$_SESSION["username"].'</a>'); ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý sinh viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="QLSinhvien/DSSV.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sinh viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="QLSinhvien/ScoreView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê điểm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Lớp
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="QLLop/DSLop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Lớp</p>
                </a>
              </li>
            </ul>
          </li>
          <li disabled class="nav-item">
            <a href="DKMH/DKMH.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Đăng ký môn học
              </p>
            </a>
          </li>
          <li disabled class="nav-item">
            <a href="/StudentMng/pages/login/login.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Trang chủ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6 md-2"></div>
          <div class="form-group col-4">
                  <select class="form-control select2" name="Class" style="width: 100%;">
                      <?php
                      $query="SELECT DISTINCT hocKy FROM `diem`";
                      $sql=$conn->query($query);
                      $result=$sql->fetch_row();
                      echo "<option selected='selected'>".$result[0]."</option>";
                      while($result=$sql->fetch_row()){
                        echo "<option>".$result[0]."</option>";
                      }
                     ?>
                  </select>

                </div>
          <div class="col-2"><button type="submit" id="hk-btn" name="submit" class="btn btn-primary">Xác nhận</button></div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Thống kê số lượng sinh viên theo khoa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Thống kê điểm của sinh viên</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body" id="Chart-container">
                <canvas id="pieChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col (RIGHT) -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
  $(function(){
    $.ajax({
            type: 'get',
            url: 'GetChartData.php',
            success: function (data) {
              var data_khoa=jQuery.parseJSON(data);
              if(data_khoa["Công nghệ thông tin"]==null) data_khoa["Công nghệ thông tin"]=0;
              if(data_khoa["Điện tử"]==null) data_khoa["Điện tử"]=0;
              if(data_khoa["Viễn thông"]==null) data_khoa["Viễn thông"]=0;
              if(data_khoa["Marketing"]==null) data_khoa["Marketing"]=0;
              if(data_khoa["Đa phương tiện"]==null) data_khoa["Đa phương tiện"]=0;
              if(data_khoa["Kế toán"]==null) data_khoa["Kế toán"]=0;
              var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
              var donutData        = {
              labels: [
                  'Công nghệ thông tin', 
                  'Điện tử',
                  'Viễn thông', 
                  'Marketing', 
                  'Đa phương tiện', 
                  'Kế toán', 
              ],
              datasets: [
                {
                  data: [data_khoa["Công nghệ thông tin"],data_khoa["Điện tử"],data_khoa["Viễn thông"],data_khoa["Marketing"],data_khoa["Đa phương tiện"],data_khoa["Kế toán"]],
                  backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
              ]
              }
              var donutOptions     = {
                maintainAspectRatio : false,
                responsive : true,
              }
              var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions      
              })
            }
    });
    $.ajax({
            type: 'post',
            url: 'GetPieChartData.php',
            data:{hk:""},
            success: function (data) {
              var data_diem=jQuery.parseJSON(data);
              var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
              var pieData        = {
              labels: [
                  '>8.0', 
                  '7.0-8.0',
                  '5.0-7.0', 
                  '4.0-5.0', 
                  '<4.0', 
              ],
              datasets: [
                {
                  data: [data_diem[">8"],data_diem["7-8"],data_diem["5-7"],data_diem["4-5"],data_diem["<4"]],
                  backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
                }
              ]
              }
              var pieOptions     = {
                maintainAspectRatio : false,
                responsive : true,
              }
                  var pieChart = new Chart(pieChartCanvas, {
                  type: 'pie',
                  data: pieData,
                  options: pieOptions      
                })
            }
    });
    $("#hk-btn").click(function(){
        $.ajax({
              type: 'post',
              url: 'GetPieChartData.php',
              data:{hk:$(".select2").val()},
              success: function (data) {
                var data_diem=jQuery.parseJSON(data);
                $("#pieChart").remove();
                $("#Chart-container").append("<canvas id='pieChart' style='min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;'></canvas>");
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
                var pieData2        = {
                labels: [
                    '>8.0', 
                    '7.0-8.0',
                    '5.0-7.0', 
                    '4.0-5.0', 
                    '<4.0', 
                ],
                datasets: [
                  {
                    data: [data_diem[">8"],data_diem["7-8"],data_diem["5-7"],data_diem["4-5"],data_diem["<4"]],
                    backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
                  }
                ]
                }
                var pieOptions     = {
                  maintainAspectRatio : false,
                  responsive : true,
                }
                    var pieChart = new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData2,
                    options: pieOptions      
                  })
              }
      });
    }) 
  })
</script>
</body>
</html>
