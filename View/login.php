<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Đăng nhập</title>

  <!-- Custom fonts for this template-->
  <link href="bootstraps/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="bootstraps/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <style>
    body {
      background-image: url(https://images.unsplash.com/photo-1487088678257-3a541e6e3922?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80);
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>

  <div class="container">
    <div class="card card-login mx-auto" style="margin-top: 15%;">
      <div class="row justify-content-center">
        <h2 class="heading-section">Đăng nhập</h2>
      </div>
      <div class="card-body">
        <form action="index.php?controllers=login&action=Admin" method="POST">
          <div class="form-group">
            <?php if (isset(($thatbai))) {
              echo ($thatbai);
            } ?>
            <div><label for="username">Tên đăng nhập</label></div>
            <input type="text" name="username" id="inputtext" class="form-control" required="required">
          </div>
          <div class="form-group">
            <div><label for="password">Mật khẩu</label></div>
            <input type="password" name="password" id="inputPassword" class="form-control" required="required">
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Lưu mật khẩu
              </label>
            </div>
          </div>
          <input type="submit" name="login" class="btn btn-primary btn-block" value="Đăng nhập">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php?controllers=login&action=dang_ky">Đăng ký tài khoản</a>
          <a class="d-block small" href="index.php?controllers=login&action=quen_mk">Quên mật khẩu?</a>
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

<script>
  const getInput = document.getElementById("inputtext")

  function handleOnload() {
    getInput.focus()
  }
  onload(handleOnload())
</script>

</html>