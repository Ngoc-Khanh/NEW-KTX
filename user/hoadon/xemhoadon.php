<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
<link rel="stylesheet" href="./assets/compiled/css/iconly.css">

<div class="content-wrapper container">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Hóa đơn</h3>
          <p class="text-subtitle text-muted">
            Của tài khoản "<?php if (isset($_SESSION["sv"])) {
                              $sv = $_SESSION["sv"];
                              echo $sv["TenDangNhap"];
                            } ?>"
          </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Hóa đơn</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Hóa đơn của
              "<?php
                  if (isset($_SESSION['sv'])) {
                    $sv = $_SESSION['sv'];
                    echo $sv['HoTen'];
                ?>"
            </h4>
            <div class="content">
              <!-- <div class="card-body">
                <p></p>
              </div> -->
              <div class="table-responsive">
                <table class="table table-hover mb-0 mt-4">
                  <thead>
                    <tr>
                      <th>Tháng</th>
                      <th>Tiền điện</th>
                      <th>Tiền nước</th>
                      <th>Tiền mạng</th>
                      <th>Tổng tiền</th>
                      <th>Tình trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $maPhong = $sv["MaPhong"];

                      $query = "
                            SELECT hoadon.Thang, hoadon.TienDien, hoadon.TienNuoc, hoadon.TienMang, 
                                  (hoadon.TienDien + hoadon.TienNuoc + hoadon.TienMang) AS TongTien, hoadon.TinhTrang
                            FROM hoadon
                            JOIN sinhvien ON hoadon.MaPhong = sinhvien.MaPhong
                            WHERE sinhvien.MaPhong = '$maPhong'
                        ";

                      $result = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <style>
                          .chua-thu-bg {
                            background-color: #fcd2d7;
                            color: white;
                          }
                          .da-thu-bg {
                            background-color: #d3fcd2;
                            color: white;
                          }
                        </style>

                        <tr class="<?php echo ($row['TinhTrang'] == 'ChuaThu') ? 'chua-thu-bg' : 'da-thu-bg'; ?>">
                          <td><?php echo $row['Thang']; ?></td>
                          <td><?php echo $row['TienDien']; ?></td>
                          <td><?php echo $row['TienNuoc']; ?></td>
                          <td><?php echo $row['TienMang']; ?></td>
                          <td><?php echo $row['TongTien']; ?></td>
                          <td><?php echo ($row['TinhTrang'] == 'ChuaThu') ? 'Chưa thu' : 'Đã nộp'; ?></td>
                        </tr>
                    <?php
                      }
                      mysqli_close($conn);
                    } else {
                      header('location: index.php?action=login');
                      exit();
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="assets/static/js/pages/horizontal-layout.js"></script>
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/dashboard.js"></script>