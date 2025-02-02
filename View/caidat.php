<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>

  <!-- phông chữ-->
  <link href="bootstraps/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- trang pluin-->
  <link href="bootstraps/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- phong cách-->
  <link href="bootstraps/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- header -->
  <?php require_once 'masster/header.php'; ?>
  <div id="wrapper">

    <!-- Thanh công cụ footer-->
    <?php require_once 'masster/footer.php'; ?>

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Cài Đặt</div>
        <?php if (isset($thatbai)) {
          echo "<span style='color:red;'>" . $thatbai . "</span>";
        } ?>
        <div class="card-body">
          <form action="#" method="POST">

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="firstName" name="txtfirstName" class="form-control" placeholder="Họ và tên" value="<?php echo $value['Hovaten'] ?>" required="required" autofocus="autofocus">
                <label for="firstName">Họ và tên</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" name="txtTen_tk" class="form-control" placeholder="Username" value="<?php echo $value['Ten_tk'] ?>" required="required">
                <label for="inputUsername">Tên đăng nhập</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="txtEmail" class="form-control" placeholder="Email" value="<?php echo $value['Emai'] ?>" required="required">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="txtMatkhau" class="form-control" placeholder="Password" value="<?php echo $value['Matkhau'] ?>" required="required">
                <label for="inputPassword">Mật khẩu</label>
              </div>
            </div>
            <input type="submit" name="Luu" class="btn btn-primary btn-block" value="Lưu lại">
            <div class="text-center">
              <a class="d-block small mt-3" href="index.php?controllers=login&action=Xoa_tk">Xóa tài khoản</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng đăng xuất?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn có chắc chắn muốn đăng xuất tài khoản không?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          <a class="btn btn-primary" href="index.php">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>

</body>
<!-- Bootstrap core JavaScript-->
<script src="bootstraps/vendor/jquery/jquery.min.js"></script>
<script src="bootstraps/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="bootstraps/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="bootstraps/vendor/chart.js/Chart.min.js"></script>
<!-- <script src="bootstraps/vendor/datatables/jquery.dataTables.js"></script>
<script src="bootstraps/vendor/datatables/dataTables.bootstrap4.js"></script> -->
<!-- Custom scripts for all pages-->
<script src="bootstraps/js/sb-admin.min.js"></script>
<!-- Demo scripts for this page-->
<script src="bootstraps/js/demo/datatables-demo.js"></script>
<script src="bootstraps/js/demo/chart-area-demo.js"></script>

</html>