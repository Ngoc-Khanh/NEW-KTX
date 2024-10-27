<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

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
                        <h3>Danh sách sinh viên</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Sinh Viên</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <!-- <h5 class="card-title">
                            Danh sách sinh viên đã được duyệt đăng ký phòng
                        </h5> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end mb-3">
                                <button type="button" class='btn btn-primary me-2' data-bs-toggle='modal' data-bs-target='#inlineForm' style='cursor: pointer;'>Thêm</button>
                                <a class='btn btn-success' href='index.php?action=xuatsinhvien'>Xuất Excel</a>
                            </div>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Mã Sinh Viên</th>
                                    <th>Họ và Tên</th>
                                    <th>Ngày Sinh</th>
                                    <th>Giới Tính</th>
                                    <th>Địa Chỉ</th>
                                    <th>SĐT</th>
                                    <th>Mail</th>
                                    <th>Mã Phòng</th>
                                    <th>Tên Khu</th>
                                    <th>Tên Đăng Nhập</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('./config/database.php');

                                // Câu truy vấn để lấy tất cả các khu
                                $sql = "SELECT * FROM sinhvien";
                                $result = mysqli_query($conn, $sql);

                                // Kiểm tra kết quả truy vấn
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $MaSV = $row['MaSV'];
                                        $HoTen = $row['HoTen'];
                                        $NgaySinh = $row['NgaySinh'];
                                        $GioiTinh = $row['GioiTinh'];
                                        $DiaChi = $row['DiaChi'];
                                        $SDT = $row['SDT'];
                                        $Mail = $row['Mail'];
                                        $MaPhong = $row['MaPhong'];
                                        $TenKhu = $row['TenKhu'];
                                        $TenDangNhap = $row['TenDangNhap'];
                                ?>
                                        <tr>
                                            <td><?php echo $MaSV; ?></td>
                                            <td><?php echo $HoTen; ?></td>
                                            <td><?php echo $NgaySinh; ?></td>
                                            <td><?php echo $GioiTinh; ?></td>
                                            <td><?php echo $DiaChi; ?></td>
                                            <td><?php echo $SDT; ?></td>
                                            <td><?php echo $Mail; ?></td>
                                            <td><?php echo $MaPhong; ?></td>
                                            <td><?php echo $TenKhu; ?></td>
                                            <td><?php echo $TenDangNhap; ?></td>
                                            <td>
                                                <a class='badge bg-warning' data-bs-toggle='modal' data-bs-target='#inlineForm2_<?php echo $MaSV; ?>' style='cursor: pointer;'>Sửa</a>
                                                <a class='badge bg-danger' style='cursor: pointer;' onclick='confirmDelete("<?php echo $MaSV; ?>")'>Xóa</a>
                                            </td>
                                        </tr>

                                        <div class='modal fade text-left' id='inlineForm2_<?php echo $MaSV; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel33' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h4 class='modal-title' id='myModalLabel33'>Sửa thông tin sinh viên <?php echo $HoTen; ?></h4>
                                                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                                                            <i data-feather='x'></i>
                                                        </button>
                                                    </div>
                                                    <form action='index.php?action=suasinhvien&MaSV=<?php echo $MaSV; ?>' method='POST'>
                                                        <div class='modal-body'>
                                                            <label for='masv'>Mã Sinh Viên: </label>
                                                            <div class='form-group'>
                                                                <input id='masv' type='text' class='form-control' name='txtMaSV' value='<?php echo $MaSV; ?>' readonly>
                                                            </div>

                                                            <label for='hoten'>Họ và Tên: </label>
                                                            <div class='form-group'>
                                                                <input id='hoten' type='text' class='form-control' name='txtHoTen' value='<?php echo $HoTen; ?>'>
                                                            </div>

                                                            <label for='ngaysinh'>Ngày Sinh: </label>
                                                            <div class='form-group'>
                                                                <input id='ngaysinh' type='date' class='form-control' name='txtNgaySinh' value='<?php echo $NgaySinh; ?>'>
                                                            </div>

                                                            <label for='gioitinh'>Giới Tính: </label>
                                                            <div class='form-group'>
                                                                <select class='form-select' name='txtGioiTinh' id='gioitinh'>
                                                                    <option value='nam' <?php echo ($GioiTinh === 'nam' ? 'selected="selected"' : ''); ?>>nam</option>
                                                                    <option value='nữ' <?php echo ($GioiTinh === 'nữ' ? 'selected="selected"' : ''); ?>>nữ</option>
                                                                </select>
                                                            </div>

                                                            <label for='diachi'>Địa Chỉ: </label>
                                                            <div class='form-group'>
                                                                <input id='diachi' type='text' class='form-control' name='txtDiaChi' value='<?php echo $DiaChi; ?>'>
                                                            </div>

                                                            <label for='sdt'>Số Điện Thoại: </label>
                                                            <div class='form-group'>
                                                                <input id='sdt' type='text' class='form-control' name='txtSDT' value='<?php echo $SDT; ?>'>
                                                            </div>

                                                            <label for='mail'>Mail: </label>
                                                            <div class='form-group'>
                                                                <input id='mail' type='email' class='form-control' name='txtMail' value='<?php echo $Mail; ?>'>
                                                            </div>

                                                            <label for='tendangnhap'>Tên Đăng Nhập: </label>
                                                            <div class='form-group'>
                                                                <input id='tendangnhap' type='text' class='form-control' name='txtTenDangNhap' value='<?php echo $TenDangNhap; ?>'>
                                                            </div>
                                                        </div>

                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-light-secondary' data-bs-dismiss='modal'>
                                                                <span>Đóng</span>
                                                            </button>
                                                            <button type='submit' class='btn btn-primary ms-1' name='btnLuu'>
                                                                <span>Sửa</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "không có bản ghi";
                                }
                                ?>

                                <script>
                                    function confirmDelete(MaSV) {
                                        if (confirm("Bạn có chắc chắn muốn xóa sinh viên này không?")) {
                                            window.location.href = 'index.php?action=xoasinhvien&MaSV=' + MaSV + '&confirm=yes';
                                            alert("Xóa thành công!");
                                        }
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <form action="index.php?action=themsinhvien" method="POST">
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Thêm sinh viên</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <label for="masv">Mã Sinh Viên: </label>
                                <div class="form-group">
                                    <select class="form-select" name="txtMaSV" id="masv">
                                        <?php
                                            $sql = "
                                                SELECT TenDangNhap
                                                FROM taikhoan
                                                WHERE TenLTK = 'sv'
                                                AND TenDangNhap NOT IN (SELECT TenDangNhap FROM sinhvien)    
                                                ORDER BY TenDangNhap
                                            ";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $choosingMa = $row['TenDangNhap'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($choosingMa); ?>"><?php echo htmlspecialchars($choosingMa); ?></option>
                                        <?php } ?> 
                                    </select>
                                </div>

                                <label for="hoten">Họ và Tên: </label>
                                <div class="form-group">
                                    <input id="hoten" type="text" placeholder="Họ và tên" class="form-control" name="txtHoTen">
                                </div>

                                <label for="ngaysinh">Ngày Sinh: </label>
                                <div class="form-group">
                                    <input id="ngaysinh" type="date" class="form-control" name="txtNgaySinh">
                                </div>

                                <label for="gioitinh">Giới Tính: </label>
                                <div class="form-group">
                                    <select class="form-select" name="txtGioiTinh" id="gioitinh">
                                        <option value="nam">nam</option>
                                        <option value="nữ">nữ</option>
                                    </select>
                                </div>

                                <label for="diachi">Địa Chỉ: </label>
                                <div class="form-group">
                                    <input id="diachi" type="text" placeholder="Địa chỉ" class="form-control" name="txtDiaChi">
                                </div>

                                <label for="sdt">Số Điện Thoại: </label>
                                <div class="form-group">
                                    <input id="sdt" type="text" placeholder="Số điện thoại" class="form-control" name="txtSDT">
                                </div>

                                <label for="mail">Mail: </label>
                                <div class="form-group">
                                    <input id="mail" type="email" placeholder="Email" class="form-control" name="txtMail">
                                </div>

                                <!-- <label for="tendangnhap">Tên Đăng Nhập: </label>
                                <div class="form-group">
                                    <input id="tendangnhap" type="text" placeholder="Tên đăng nhập" class="form-control" name="txtTenDangNhap">
                                </div> -->
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <span>Đóng</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1" name="btnLuu">
                                    <span>Thêm</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Nhóm 6 | UTT</p>
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

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>