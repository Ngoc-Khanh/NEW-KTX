<div id="app">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Chi tiết trả phòng</h3>
                        <p class="text-subtitle text-muted">Danh sách đăng ký trả phòng => Chi tiết đăng ký</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="index.php?action=traphong&view=quanlytraphong">Quản lý Trả Phòng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết danh sách</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php
                include_once('./config/database.php');

                $maSinhVien = isset($_GET['MaSV']) ? $_GET['MaSV'] : '';
                $sqlSinhVien = "SELECT * FROM sinhvien WHERE MaSV = '$maSinhVien'";
                $resultSinhVien = $conn->query($sqlSinhVien);

                if ($resultSinhVien == false) {
                    die("Lỗi truy vấn cơ sở dữ liệu: " . $conn->error);
                }

                $rowSinhVien = $resultSinhVien->fetch_assoc();

                if (!$rowSinhVien) {
                    echo "Không tìm thấy thông tin sinh viên.";
                } else {
            ?>


            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin sinh viên đăng ký</h4>
                            </div>
                                <?php
                                    echo "<div class='card-content'>
                                        <div class='card-body'>
                                            <form class='form form-horizontal'>
                                                <div class='form-body'>
                                                    <div class='row'>
                                                        <div class='col-md-4'>
                                                            <label for='first-name-horizontal'>Mã Sinh Viên</label>
                                                        </div>
                                                        <div class='col-md-8 form-group'>
                                                            <input type='text' id='first-name-horizontal' class='form-control' name='fname'
                                                                value='" . $rowSinhVien['MaSV'] . "' disabled>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <label for='email-horizontal'>Họ và Tên</label>
                                                        </div>
                                                        <div class='col-md-8 form-group'>
                                                            <input type='text' id='email-horizontal' class='form-control' name='email-id'
                                                                value='" . $rowSinhVien['HoTen'] . "' disabled>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <label for='contact-info-horizontal'>Giới Tính</label>
                                                        </div>
                                                        <div class='col-md-8 form-group'>
                                                            <input type='text' id='contact-info-horizontal' class='form-control' name='contact'
                                                                value='" . (($rowSinhVien['GioiTinh'] == 'nữ') ? 'Nữ' : 'nam') . "' disabled>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <label for='password-horizontal'>Ngày Sinh</label>
                                                        </div>
                                                        <div class='col-md-8 form-group'>
                                                            <input type='text' id='password-horizontal' class='form-control' name='password'
                                                                value='" . $rowSinhVien['NgaySinh'] . "' disabled>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <label for='password-horizontal'>Địa Chỉ</label>
                                                        </div>
                                                        <div class='col-md-8 form-group'>
                                                            <input type='text' id='password-horizontal' class='form-control' name='password'
                                                                value='" . $rowSinhVien['DiaChi'] . "' disabled>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <label for='password-horizontal'>SĐT</label>
                                                        </div>
                                                        <div class='col-md-8 form-group'>
                                                            <input type='text' id='password-horizontal' class='form-control' name='password'
                                                                value='" . $rowSinhVien['SDT'] . "' disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>";

                                    // Lấy thông tin đăng ký phòng dựa trên mã sinh viên
                                    $sqlPhong = "SELECT phong.MaPhong, phong.MaKhu, phong.Gia FROM phong INNER JOIN dangkyphong ON phong.MaPhong = dangkyphong.MaPhong WHERE dangkyphong.MaSV = '$maSinhVien'";
                                    $resultPhong = $conn->query($sqlPhong);

                                    // Kiểm tra kết quả truy vấn
                                    if ($resultPhong == false) {
                                        die("Lỗi truy vấn cơ sở dữ liệu: " . $conn->error);
                                    }

                                    $rowPhong = $resultPhong->fetch_assoc();

                                    if (!$rowPhong) {
                                        echo "Không tìm thấy thông tin phòng.";
                                    } else {                                    
                                ?>                            
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin phòng</h4>
                            </div>
                                <?php
                                        // Bảng thông tin phòng
                                        echo "<div class='card-content'>
                                            <div class='card-body'>
                                                <form class='form form-horizontal'>
                                                    <div class='form-body'>
                                                        <div class='row'>
                                                            <div class='col-md-4'>
                                                                <label for='first-name-horizontal-icon'>Mã Phòng</label>
                                                            </div>
                                                            <div class='col-md-8'>
                                                                <div class='form-group has-icon-left'>
                                                                    <div class='position-relative'>
                                                                        <input type='text' class='form-control' value='" . $rowPhong['MaPhong'] . "'
                                                                            id='first-name-horizontal-icon' disabled>
                                                                        <div class='form-control-icon'>
                                                                            <i class='bi bi-house'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-4'>
                                                                <label for='email-horizontal-icon'>Mã Khu</label>
                                                            </div>
                                                            <div class='col-md-8'>
                                                                <div class='form-group has-icon-left'>
                                                                    <div class='position-relative'>
                                                                        <input type='text' class='form-control' value='" . $rowPhong['MaKhu'] . "'
                                                                            id='email-horizontal-icon' disabled>
                                                                        <div class='form-control-icon'>
                                                                            <i class='bi bi-houses'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-4'>
                                                                <label for='password-horizontal-icon'>Giá</label>
                                                            </div>
                                                            <div class='col-md-8'>
                                                                <div class='form-group has-icon-left'>
                                                                    <div class='position-relative'>
                                                                        <input type='text' class='form-control' value='" . number_format($rowPhong['Gia']) . " đ'
                                                                            id='password-horizontal-icon' disabled>
                                                                        <div class='form-control-icon'>
                                                                            <i class='bi bi-cash-coin'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>";
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic Horizontal form layout section end -->

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 &copy; Nhóm 6 | UTT</p>
                    </div>
                    <div class="float-end">
                        <p>Design by <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            <a href="https://www.facebook.com/ngockhanh2k3" target="_blank">Krug</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>