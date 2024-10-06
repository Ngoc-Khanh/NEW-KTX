<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

<div class="content-wrapper container">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Đổi mật khẩu</h3>
                    <!-- <p class="text-subtitle text-muted">Danh sách đăng ký trả phòng => Chi tiết đăng ký</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <?php
        include_once('./config/database.php');

        if (isset($_SESSION['sv'])) {
            $sv = $_SESSION['sv'];
            $masv = $sv['MaSV'];

            // Lấy thông tin tài khoản từ cơ sở dữ liệu
            $sql1 = "SELECT * FROM taikhoan WHERE TenDangNhap = '$masv'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $currentPassword = $_POST['currentPassword'];
                $newPassword = $_POST['newPassword'];
                $confirmPassword = $_POST['confirmPassword'];

                // Kiểm tra mật khẩu hiện tại
                $currentPasswordFromDatabase = $row1['MatKhau'];

                if ($currentPassword != $currentPasswordFromDatabase) {
                    echo "<script type='text/javascript'>alert('Mật khẩu hiện tại không đúng!');</script>";
                } elseif ($newPassword != $confirmPassword) {
                    echo "<script type='text/javascript'>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!');</script>";
                } else {
                    // Cập nhật mật khẩu mới trong cơ sở dữ liệu
                    $sql = "UPDATE taikhoan SET MatKhau = '$newPassword' WHERE TenDangNhap = '$masv'";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script type='text/javascript'>alert('Đổi Mật Khẩu Thành Công!');</script>";

                        // Gửi thông báo cho người dùng về việc đổi mật khẩu thành công
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date = getdate();
                        $ngay = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
                        $ngayhientai = $date['year'] . '/' . $date['mon'] . '/' . $date['mday'];
                        $td = 'Thông Báo Đổi Mật Khẩu';
                        $nd = 'Tài khoản của bạn đã được thay đổi mật khẩu thành công vào ' . $ngay . ', nếu không phải là bạn đổi hãy lập tức liên lạc với cán bộ ký túc xá. Xin cảm ơn!';

                        $sql2 = "INSERT INTO thongbao(MaSV, TieuDe, NoiDung) VALUES ('$masv', '$td', '$nd')";
                        $rs2 = mysqli_query($conn, $sql2);
                    } else {
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra khi đổi mật khẩu!');</script>";
                    }
                }
            }
        }
        ?>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Đổi mật khẩu cho tài khoản <?php if (isset($_SESSION["sv"])) {
                                                                                    $sv = $_SESSION["sv"];
                                                                                    echo $sv["TenDangNhap"];
                                                                                } ?></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="" method="POST" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- Mật khẩu hiện tại -->
                                            <div class="col-md-6">
                                                <label for="currentPassword">Mật khẩu hiện tại</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control" placeholder="Mật khẩu hiện tại" name="currentPassword" id="currentPassword" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-shield-lock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Mật khẩu mới -->
                                            <div class="col-md-6">
                                                <label for="newPassword">Mật khẩu mới</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control" placeholder="Mật khẩu mới" name="newPassword" id="newPassword" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-lock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Xác nhận mật khẩu mới -->
                                            <div class="col-md-6">
                                                <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" name="confirmPassword" id="confirmPassword" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-lock-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Nút gửi -->
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Đổi Mật Khẩu</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>