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

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

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
        <div class="info">
          <?php echo '<a class="d-block">'.$_SESSION["username"].'</a>'; ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <a href="../QLSinhvien/DSSV.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sinh viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../QLSinhvien/ScoreView.php" class="nav-link">
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
            <a href="DKMH.php" class="nav-link active">
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

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Đăng ký môn học</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Chọn môn học đăng ký</label>
                  <select class="duallistbox" multiple="multiple">
                    <?php 
                        $query="SELECT tenMonhoc FROM monhoc WHERE id not IN(select b.id from diem a inner join monhoc b WHERE a.MonHocid=b.id and a.Sinhvienid=".$_SESSION["id"].")";
                        $result=$conn->query($query);
                        while ($arr=$result->fetch_row()) {
                        echo "<option>".$arr[0]."</option>";
                      }
                     ?>
                  </select>
                </div>
                <div class="form-group md-6">
                    <label for="FullName">Học kỳ</label>
                    <input type="text" class="form-control"  id="hk" placeholder="Nhập học kỳ" required>
                  </div>
                <button type="button" id="add-btn" name="submit" class="btn btn-primary">Đăng ký</button>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
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

<!-- AdminLTE App -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
         $('.duallistbox').bootstrapDualListbox({infoTextEmpty:"",filterPlaceHolder:"Lọc"})
         $('#add-btn').click(function(){
            var arr=$('.duallistbox').val();
            var hk=$('#hk').val();
            console.log(arr);
            if(hk==""||arr.length<0){
              alert("Xin hãy nhập đủ kì học và môn học");
            }
            else{
            $.ajax({
            type: 'post',
            url: 'DangKy.php',
            data: {data:arr,hk:hk},
            success: function (data) {
              if(data=="success"){
                alert("Đăng ký thành công");
              }
            }
          });
          }
         })
  });
</script>
</body>
</html>
