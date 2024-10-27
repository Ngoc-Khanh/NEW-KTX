<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
<link rel="stylesheet" href="./assets/compiled/css/iconly.css">

<div class="content-wrapper container">

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Chi tiết thông tin</h3>
                    <p class="text-subtitle text-muted">
                        Tài khoản "<?php if (isset($_SESSION["sv"])) {
                                        $sv = $_SESSION["sv"];
                                        echo $sv["TenDangNhap"];
                                    } ?>"
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tài khoản <?php if (isset($_SESSION["sv"])) {
                                                                    $sv = $_SESSION["sv"];
                                                                    echo $sv["HoTen"];
                                                                } ?></h4>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <form action="" method="POST" class="form form-horizontal" id="updateForm">
                                    <div class="form-body">
                                        <div class="row">
                                            <?php
                                            include_once('./config/database.php');

                                            // Kiểm tra session tồn tại và lấy mã nhân viên
                                            if (isset($_SESSION["sv"]["MaSV"])) {
                                                $masv = $_SESSION["sv"]["MaSV"];

                                                // Truy vấn lấy thông tin nhân viên
                                                $sql = "SELECT * FROM sinhvien WHERE MaSV = '$masv'";
                                                $rs = $conn->query($sql);

                                                if ($rs && $rs->num_rows > 0) {
                                                    $row = $rs->fetch_assoc();
                                                } else {
                                                    echo "Không tìm thấy thông tin nhân viên.";
                                                    exit;
                                                }
                                            } else {
                                                echo "Bạn chưa đăng nhập!";
                                                exit;
                                            }
                                            ?>

                                            <!-- Mã nhân viên -->
                                            <div class="col-md-6">
                                                <label for="maNhanVien">Mã sinh viên</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" value="<?php echo $row['MaSV'] ?>" name="maNhanVien" id="maNhanVien" disabled>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person-badge"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Họ tên -->
                                            <div class="col-md-6">
                                                <label for="hoTen">Họ tên</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" value="<?php echo $row['HoTen'] ?>" name="hoTen" id="hoTen" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Ngày sinh -->
                                            <div class="col-md-6">
                                                <label for="ngaySinh">Ngày sinh</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="date" class="form-control" value="<?php echo $row['NgaySinh'] ?>" name="ngaySinh" id="ngaySinh" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Giới tính -->
                                            <div class="col-md-6">
                                                <label for="gioiTinh">Giới tính</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select class='form-select' name='gioiTinh' id='gioiTinh'>
                                                            <option value='nam' <?php echo ($row['GioiTinh'] === 'nam') ? 'selected' : ''; ?>>nam</option>
                                                            <option value='nữ' <?php echo ($row['GioiTinh'] === 'nữ') ? 'selected' : ''; ?>>nữ</option>
                                                        </select>
                                                        <!-- <div class="form-control-icon">
                                                            <i class="bi bi-gender-ambiguous"></i>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Địa chỉ -->
                                            <div class="col-md-6">
                                                <label for="diaChi">Địa chỉ</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" value="<?php echo $row['DiaChi'] ?>" name="diaChi" id="diaChi" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-house"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Số điện thoại -->
                                            <div class="col-md-6">
                                                <label for="soDienThoai">Số điện thoại</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="tel" class="form-control" value="<?php echo $row['SDT'] ?>" name="soDienThoai" id="soDienThoai" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-telephone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Nút gửi -->
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1" name="btnLuu" onclick="return confirmUpdate()">Lưu thông tin</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <?php
                                    // Xử lý cập nhật thông tin sinh viên
                                    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
                                        $hoTen = $_POST['hoTen'];
                                        $ngaySinh = $_POST['ngaySinh'];
                                        $gioiTinh = $_POST['gioiTinh'];
                                        $diaChi = $_POST['diaChi'];
                                        $soDienThoai = $_POST['soDienThoai'];

                                        // Xây dựng câu lệnh SQL để cập nhật thông tin sinh viên
                                        $sql = "UPDATE sinhvien 
                                            SET HoTen = '$hoTen', NgaySinh = '$ngaySinh', GioiTinh = '$gioiTinh', DiaChi = '$diaChi', SDT = '$soDienThoai' 
                                            WHERE MaSV = '$masv'";

                                        $result = $conn->query($sql);

                                        if ($result) {
                                            echo "<script>alert('Cập nhật thành công!'); window.location.href = 'index.php?action=thongtincanhan';</script>";
                                        } else {
                                            echo "Cập nhật thất bại: " . $conn->error;
                                        }
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function confirmUpdate() {
                return confirm('Bạn có chắc chắn muốn lưu các thay đổi này không?');
            }
        </script>
    </div>
</div>

<script src="assets/static/js/pages/horizontal-layout.js"></script>
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/dashboard.js"></script>