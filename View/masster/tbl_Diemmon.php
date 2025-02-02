<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Bảng điểu kiểm</a>
      </li>
      <li class="breadcrumb-item active">Điểm Môn học</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Bảng điểm lớp
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>Điểm Giữa kỳ</th>
                <th>Diểm Cuối kỳ</th>
                <th>Điểm môn học</th>
                <th>Học kỳ</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // echo "<pre>";
              // print_r($dHP);
              if (isset($dHP)) {
                $STT = 0;
                if ($dHP == null) { ?>
                  <h3>Học sinh chưa có điểm</h3>
                  <?php } else {
                  foreach ($dHP as $value) {
                    $STT++;
                    $TBHP = ($value['diem_giua_ky'] * 0.3) + ($value['diem_thi_hp'] * 0.7);
                  ?>
                    <tr>
                      <td><?php echo $STT; ?></td>
                      <td><?php echo $value['ma_mon']; ?></td>
                      <td><?php echo $value['ten_mon']; ?></td>
                      <td><?php echo $value['diem_giua_ky']; ?></td>
                      <td><?php echo $value['diem_thi_hp']; ?></td>
                      <td><?php echo round($TBHP, 1); ?></td>
                      <td><?php echo $value['ten_hk']; ?></td>
                    </tr>
              <?php
                  }
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <!-- <?php include 'footer.php'; ?> -->

</div>