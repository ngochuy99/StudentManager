<!DOCTYPE html>
<?php 
  include"../config.php";
  include"../Check_login.php";
 ?>
 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QLSV</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Trang chủ</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link d-flex justify-content-center">
      <span class="brand-text font-weight-light">QLĐT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="info ">
          <?php echo '<a class="d-block">'.$_SESSION["username"].'</a>'; ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý sinh viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="DSSV.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sinh viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ScoreView.php" class="nav-link  active">
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
                <a href="../QLLop/DSLop.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách lớp</p>
                </a>
              </li>
            </ul>
          </li>
          <li disabled class="nav-item">
            <a href="../DKMH/DKMH.php" class="nav-link">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sinh viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">DSSV</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary" id="add">
          <div class="card-header">
            <h3 class="card-title">Xem điểm sinh viên</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" id="add-form">
            <div class="row">
                <div class="form-group md-6">
                    <label for="FullName">Họ và tên</label>
                    <input type="text" class="form-control"  name="FullName" placeholder="Nhập họ và tên">
                  </div>
                <!-- /.form-group -->
            </div>
            <div class="row">
                <div class="form-group">
                  <label>Ngày sinh</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="dob" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="sub-btn" name="submit" class="btn btn-primary">Xem điểm</button>
          </form>
          <?php
          if(isset($_POST["submit"])){
            $query="SELECT id from user where hoTen='".$_POST["FullName"]."' AND dob='".$_POST["dob"]."'";
            $result=$conn->query($query);
            $maSV=$result->fetch_assoc();
            }
           ?>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
        <div class="card card-success" id="add">
          <div class="card-header">
            <h3 class="card-title">Bảng điểm</h3>
          </div>
        <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Học kỳ</th>
                    <th>Điểm CC</th>
                    <th>Điểm TH</th>
                    <th>Điểm KT</th>
                    <th>Điểm BTL</th>
                    <th>Điểm Thi</th>
                    <th>Điểm TB</th>
                    <th>Môn học</th>
                  </tr>
                  </thead>
                  <tbody id="table">
                    <?php
                    if(isset($maSV)){
                      $sql="SELECT * FROM diem a INNER JOIN monhoc b on a.MonHocid=b.id where a.Sinhvienid='".$maSV["id"]."'";
                      $query=$conn->query($sql);
                      while($result=$query->fetch_assoc()){
                        $diemtb=($result["diemCC"]*$result["trongSoCC"]+$result["diemKT"]*$result["trongSoKT"]
                        +$result["diemTH"]*$result["trongSoTH"]+$result["diemBTL"]*$result["trongSoBTL"]+
                        $result["diemThi"]*$result["trongSoThi"])/100;
                        echo "<tr>
                                  <td>".$result["hocKy"]."</td>
                                  <td>".$result["diemCC"]."</td>
                                  <td>".$result["diemTH"]."</td>
                                  <td>".$result["diemKT"]."</td>
                                  <td>".$result["diemBTL"]."</td>
                                  <td>".$result["diemThi"]."</td>
                                  <td>".$diemtb."</td>
                                  <td>".$result["tenMonHoc"]."</td>
                                  ";
                      }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>

  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>

<!-- page script -->
<script>
  $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
</body>
</html>
