<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

<div class="content-wrapper container">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Đăng ký phòng ký túc xá</h3>
                    <p class="text-subtitle text-muted">
                        <code>*Lưu ý: <br>Hệ thống sẽ tự động chọn phòng cho bạn theo yêu cầu trên.<br> Hệ thống sẽ gửi thông báo sau!</code>
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng ký phòng</li>
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
                            <h4 class="card-title"> Xin chào,
                                <?php
                                if (isset($_SESSION['sv'])) {
                                    $sv = $_SESSION['sv'];
                                    echo $sv['HoTen'];
                                } else {
                                    header('location: index.php?action=login');
                                    exit();
                                }

                                $maSV = $sv['MaSV'];
                                $query = "SELECT * FROM sinhvien WHERE sinhvien.MaSV = '$maSV'";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $hoTen = $row['HoTen'];
                                    $gioiTinh = $row['GioiTinh'];
                                    // $currentRoom = $row['CurrentRoom'];
                                    // $tinhTrang = $row['TinhTrang'];
                                }

                                // Xác định danh sách khu dựa vào giới tính
                                if ($gioiTinh == 'nam') {
                                    $danhSachKhu = array('A', 'B');
                                } else if ($gioiTinh == 'nữ') {
                                    $danhSachKhu = array('C', 'D');
                                } else {
                                    $danhSachKhu = array(); // Không xác định giới tính, không hiển thị khu nào
                                }

                                // Chọn ngẫu nhiên 1 khu từ danh sách khu
                                if (!empty($danhSachKhu)) {
                                    $khuNgauNhien = $danhSachKhu[array_rand($danhSachKhu)];
                                } else {
                                    $khuNgauNhien = null; // Không có khu nào để chọn
                                }

                                // Kiểm tra xem có thông báo nào trong session hay không
                                if (isset($_SESSION['message'])) {
                                    echo "<script type='text/javascript'>alert('" . $_SESSION['message'] . "');</script>";
                                    unset($_SESSION['message']); // Xóa thông báo sau khi đã hiển thị
                                }
                                ?>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="index.php?action=xulydangky" method="post"
                                    data-parsley-validate>
                                    <input type="hidden" name="khu" value="<?php echo $khuNgauNhien; ?>" />
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="ma-sinh-vien" class="form-label">Mã sinh viên</label>
                                                <input type="text" id="ma-sinh-vien" class="form-control" name="txtMaSV"
                                                    value="<?php echo $maSV; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="gioi-tinh" class="form-label">Giới tính</label>
                                                <input type="text" id="gioi-tinh" class="form-control"
                                                    name="txtGioiTinh" value="<?php echo $gioiTinh; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mandatory">
                                                <fieldset>
                                                    <label class="form-label">Chọn số người trong phòng</label>
                                                    <?php
                                                    // Điều chỉnh truy vấn dựa trên giới tính
                                                    $gioiTinh = $gioiTinh == "nam" ? "nam" : "nữ";
                                                    $sql = "SELECT phong.SoNguoiToiDa, phong.Gia
                                                                FROM phong
                                                                INNER JOIN khu ON phong.MaKhu = khu.MaKhu
                                                                WHERE khu.GioiTinh = '$gioiTinh'";
                                                    $result = $conn->query($sql);

                                                    $roomChoices = array(); // Mảng để lưu các lựa chọn đã được hiển thị
                                                    while ($row = $result->fetch_assoc()) {
                                                        $soNguoiToiDa = $row['SoNguoiToiDa'];
                                                        $gia = $row['Gia'];
                                                        $choice = "$soNguoiToiDa người - Giá: $gia VND";

                                                        if (!in_array($choice, $roomChoices)) {
                                                            echo "<div class='form-check'>
                                                                        <input class='form-check-input' type='radio' name='SoNguoi' value='$soNguoiToiDa' data-parsley-required='true' />
                                                                        <label class='form-check-label form-label'>$choice</label>
                                                                    </div>";
                                                            $roomChoices[] = $choice;
                                                        }
                                                    }
                                                    ?>
                                                    <label for="khu">Chọn Khu:</label>
                                                    <?php foreach ($danhSachKhu as $khu): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="khu"
                                                                value="<?php echo htmlspecialchars($khu); ?>"> Khu
                                                            <?php echo htmlspecialchars($khu); ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">

                                            <button type="submit" class="btn btn-primary me-1 mb-1">Đăng ký phòng</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

<script src="assets/extensions/jquery/jquery.min.js"></script>
<script src="assets/extensions/parsleyjs/parsley.min.js"></script>
<script src="assets/static/js/pages/parsley.js"></script>