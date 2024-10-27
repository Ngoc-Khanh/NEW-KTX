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
                        <h3>Chi tiết đăng ký</h3>
                        <p class="text-subtitle text-muted">Danh sách sinh viên đăng ký phòng => Chi tiết sinh viên</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="index.php?action=danhsachdaduyetqldkp">Quản lý Đăng Ký Phòng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết danh sách</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php
            include_once('./config/database.php');

            $madk = $_GET['madk'];
            $sql = "SELECT * FROM `sinhvien` WHERE MaSV = (SELECT MaSV from dangkyphong WHERE MaDK = $madk)";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $sql1 = "SELECT * FROM `phong` WHERE MaPhong = (SELECT MaPhong from dangkyphong WHERE MaDK = $madk)";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);
            $makhu = $row1['MaKhu'];
            $sql2 = "SELECT * FROM `Khu` WHERE MaKhu = '$makhu'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($result2);
            ?>


            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin sinh viên đăng ký</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="first-name-horizontal">Mã Sinh Viên</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="first-name-horizontal" class="form-control" name="fname"
                                                        value="<?php echo $row['MaSV'] ?>" disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email-horizontal">Họ và Tên</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="email-horizontal" class="form-control" name="email-id"
                                                        value="<?php echo $row['HoTen'] ?>" disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="contact-info-horizontal">Giới Tính</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="contact-info-horizontal" class="form-control" name="contact"
                                                        value="<?php echo ($row['GioiTinh'] == 'nữ') ? 'Nữ' : 'nam'; ?>" disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal">Ngày Sinh</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="password-horizontal" class="form-control" name="password"
                                                        value="<?php echo $row['NgaySinh'] ?>" disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal">Địa Chỉ</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="password-horizontal" class="form-control" name="password"
                                                        value="<?php echo $row['DiaChi'] ?>" disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal">SĐT</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="password-horizontal" class="form-control" name="password"
                                                        value="<?php echo $row['SDT'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin phòng</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="first-name-horizontal-icon">Mã Phòng</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="<?php echo $row1['MaPhong'] ?>"
                                                                id="first-name-horizontal-icon" disabled>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-house"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email-horizontal-icon">Mã Khu</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" value="<?php echo $row1['MaKhu'] . ' (Khu ' . $row2['GioiTinh'] . ')'; ?>"
                                                                id="email-horizontal-icon" disabled>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-houses"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="contact-info-horizontal-icon">Số Người Tối Đa</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="<?php echo $row1['SoNguoiToiDa'] ?>" id="contact-info-horizontal-icon" disabled>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-people-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal-icon">Số Người Hiện Tại</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="<?php echo $row1['SoNguoiHienTai']; ?>" id="password-horizontal-icon" disabled>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-people"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal-icon">Giá</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="numberic" class="form-control" value="<?php echo number_format($row1['Gia']) . ' đ' ?>" id="password-horizontal-icon" disabled>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-cash-coin"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal-icon">&emsp;</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <!-- <div class="position-relative">
                                                                <input type="numberic" class="form-control" value="&emsp;" id="password-horizontal-icon" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cash-coin"></i>
                                                                </div>
                                                            </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password-horizontal-icon">&emsp;</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <!-- <div class="position-relative">
                                                                <input type="numberic" class="form-control" value="&emsp;" id="password-horizontal-icon" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cash-coin"></i>
                                                                </div>
                                                            </div> -->
                                                    </div>
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