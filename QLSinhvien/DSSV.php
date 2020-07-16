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
        <div class="info">
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
                <a href="DSSV.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sinh viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ScoreView.php" class="nav-link">
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
            <h3 class="card-title">Thêm mới sinh viên</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" id="add-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="Username">Tên tài khoản</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập">
                  </div>
                <div class="form-group">
                    <label for="Password">Mật khẩu</label>
                    <input type="text" class="form-control" name="Password" placeholder="Nhập mật khẩu">
                  </div>
                <div class="form-group">
                    <label for="FullName">Họ và tên</label>
                    <input type="text" class="form-control"  name="FullName" placeholder="Nhập họ và tên">
                  </div>
                <div class="form-group">
                  <label>Ngày sinh</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="dob" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ">
                  </div>
                <div class="form-group">
                    <label for="SDT">Số điện thoại</label>
                    <input type="text" class="form-control" name="SDT" placeholder="Nhập số điện thoại">
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="CMT">Số CMT</label>
                    <input type="text"  name="CMT" class="form-control" id="CMT" placeholder="Nhập số CMT">
                  </div>
                <div class="form-group">
                  <label>Khoa</label>
                  <select class="form-control select2" name="Khoa"  style="width: 100%;">
                    <option selected="selected">Công nghệ thông tin</option>
                    <option>Điện tử</option>
                    <option>Viễn Thông</option>
                    <option>Marketing</option>
                    <option>Đa phương tiện</option>
                    <option>Kế toán</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Niên khóa:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="nienkhoa" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>Vai trò</label>
                  <select class="form-control select2" name="role" style="width: 100%;">
                    <option selected="selected">Sinh viên</option>
                    <option>Giảng viên</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Lớp</label>
                  <select class="form-control select2" name="Class" style="width: 100%;">
                      <?php
                      $query="SELECT tenLop FROM lop";
                      $sql=$conn->query($query);
                      $result=$sql->fetch_row();
                      echo "<option selected='selected'>".$result[0]."</option>";
                      while($result=$sql->fetch_row()){
                        echo "<option>".$result[0]."</option>";
                      }
                     ?>
                  </select>

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <button type="submit" id="sub-btn" name="submit" class="btn btn-primary">Thêm mới</button>
          </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Danh sách sinh viên</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Họ và tên  </th>
                    <th>Địa chỉ       </th>
                    <th>Ngày sinh   </th>
                    <th>Khoa   </th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                    <th>Xem</th>
                  </tr>
                  </thead>
                  <tbody id="table">
                    <?php
                      $sql="SELECT id,hoTen,diaChi,dob,khoa FROM user";
                      $query=$conn->query($sql);
                      while($result=$query->fetch_row()){
                        echo "<tr id=".$result[0].">
                                  <td data-target='username'>".$result[1]."</td>
                                  <td data-target='address'>".$result[2]."</td>
                                  <td data-target='dob'>".$result[3]."</td>
                                  <td data-target='khoa'>".$result[4]."</td>
                                  <td><button class='btn btn-primary delete' id=".$result[0]."><i class='fas fa-times-circle'></i></button></td>
                                  <td><a href='Edit.php?id=".$result[0]."'><button class='btn btn-primary'><i class='far fa-edit'></i></button><a></td>
                                  <td><button class='btn btn-primary show' id=".$result[0]."><i class='fas fa-eye'></i></button></td>";
                      }
                    ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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

  <!-- Detail infomation Modal -->
<div class="modal fade" id="detail_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="Username">Tên tài khoản</label>
                    <input disabled="" type="text" class="form-control" id="username">
                  </div>
                <div class="form-group">
                    <label for="FullName">Họ và tên</label>
                    <input disabled="" type="text" class="form-control" id="fullname">
                  </div>
                <div class="form-group">
                    <label for="FullName">Ngày sinh</label>
                    <input disabled="" type="text" class="form-control" id="dob">
                  </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input disabled="" type="text" class="form-control" id="address">
                  </div>
                <div class="form-group">
                    <label for="SDT">Số điện thoại</label>
                    <input disabled="" type="text" class="form-control" id="SDT">
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="CMT">Số CMT</label>
                    <input disabled="" type="text" class="form-control" id="CMT">
                  </div>
                <div class="form-group">
                    <label for="Khoa">Khoa</label>
                    <input disabled="" type="text" class="form-control" id="Khoa">
                  </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="NienKhoa">Niên khóa</label>
                    <input disabled="" type="text" class="form-control" id="nienkhoa">
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

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
  $(function () {
    // Ajax-submit-add
     $('#add-form').on('submit', function (e) {
          e.preventDefault();
          $("#add").collapse('hide');
          $.ajax({
            type: 'post',
            url: 'Add.php',
            data: $('form').serialize(),
            success: function (data) {
              var res=jQuery.parseJSON(data); 
              var t=$("#example1").DataTable();
              t.row.add([
                "<tr id="+res[0]+"><td data-target='username'>"+res[1]+"</td>",
                "<td data-target='address'>"+res[2]+"</td>",
                "<td data-target='dob'>"+res[3]+"</td>",
                "<td data-target='khoa'>"+res[4]+"</td>",
                "<button class='btn btn-primary delete' id="+res[0]+"><i class='fas fa-times-circle'></i></button>",
                "<a href='Edit.php?id="+res[0]+"'><button class='btn btn-primary'><i class='far fa-edit'></i></button></a>",
                "<button class='btn btn-primary show' id="+res[0]+"><i class='fas fa-eye'></i></button>"
                ]).draw(false);
            }
          });
      });


     // Delete Function
     $('.delete').click(function(){
          var table = $('#example1').DataTable();
          table.row($(this).parents('tr')).remove().draw();
        $.ajax({
            type: 'post',
            url: 'Delete.php',
            data: {id:this.id},
            success: function (data) {
              if (data=="true") {
                var table = $('#example1').DataTable();
                table.row($(this).parents('tr')).remove().draw();
              }
              else{
                alert("Xóa không thành công!");
              }
            }
          });
     })


     // Get Function
     $('.show').click(function(){   
      console.log(this.id);
        // console.log($("#"+this.id).children("td[data-target=username]").text());
        $.ajax({
            type: 'post',
            url: 'Get.php',
            data: {id:this.id},
            success: function (data) {
              var res=jQuery.parseJSON(data); 
              $("#detail_info #username").val(res[1]);
              $("#detail_info #fullname").val(res[3]);
              $("#detail_info #dob").val(res[4]);
              $("#detail_info #address").val(res[5]);
              $("#detail_info #CMT").val(res[6]);
              $("#detail_info #SDT").val(res[7]);
              $("#detail_info #Khoa").val(res[8]);
              $("#detail_info #nienkhoa").val(res[9]);
            }
          });
        $("#detail_info").modal("show");
        $("#detail_info #username").val("abc")
     })
    $('#reservation').daterangepicker()
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  });
</script>
</body>
</html>
