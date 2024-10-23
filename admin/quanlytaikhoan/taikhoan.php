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
                        <h3>Danh sách tài khoản</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Tài Khoản</li>
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
                                <a class='btn btn-success' href='index.php?action=xuattaikhoan'>Xuất Excel</a>
                            </div>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Tên Đăng Nhập</th>
                                    <th>Mật Khẩu</th>
                                    <th>Tên loại tài khoản</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('./config/database.php');

                                // Câu truy vấn để lấy tất cả các khu
                                $sql = "SELECT * FROM taikhoan";
                                $result = mysqli_query($conn, $sql);

                                // Kiểm tra kết quả truy vấn
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $TenDangNhap = $row['TenDangNhap'];
                                        $MatKhau = $row['MatKhau'];
                                        $TenLTK = $row['TenLTK'];
                                ?>
                                        <tr>
                                            <td><?= $TenDangNhap ?></td>
                                            <td><?= $row["MatKhau"] ?></td>
                                            <td><?= $row["TenLTK"] ?></td>
                                            <td>
                                                <a class='badge bg-warning' data-bs-toggle='modal' data-bs-target='#inlineForm2_<?= $TenDangNhap ?>' style='cursor: pointer;'>Sửa</a>
                                                <a class='badge bg-danger' style='cursor: pointer;' onclick='confirmDelete("<?= $TenDangNhap ?>")'>Xóa</a>
                                            </td>
                                        </tr>

                                        <div class='modal fade text-left' id='inlineForm2_<?= $TenDangNhap ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel33' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h4 class='modal-title' id='myModalLabel33'>Sửa thông tin <?= $TenDangNhap ?></h4>
                                                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                                                            <i data-feather='x'></i>
                                                        </button>
                                                    </div>
                                                    <form action='index.php?action=suataikhoan&TenDangNhap=<?= $TenDangNhap ?>' method='POST'>
                                                        <div class='modal-body'>
                                                            <label for='tendangnhap'>Tên Đăng Nhập: </label>
                                                            <div class='form-group'>
                                                                <input id='tendangnhap' type='text' placeholder='Tên Đăng Nhập' class='form-control' name='txtTenDangNhap' value='<?= $TenDangNhap ?>' readonly>
                                                            </div>

                                                            <label for='matkhau'>Mật khẩu: </label>
                                                            <div class='form-group'>
                                                                <input id='matkhau' type='text' placeholder='Mật Khẩu' class='form-control' name='txtMatKhau' required focuson>
                                                            </div>

                                                            <label for='tenltk'>Loại tài khoản: </label>
                                                            <div class='form-group'>
                                                                <fieldset class='form-group'>
                                                                    <select class='form-select' name='txtLTK' id='basicSelect'>
                                                                        <?php
                                                                        $sqlTaiKhoan = "SELECT DISTINCT TenLTK FROM taikhoan";
                                                                        $resultTaiKhoan = mysqli_query($conn, $sqlTaiKhoan);
                                                                        $options = []; // Mảng để lưu các option đã hiển thị

                                                                        // Giả sử bạn có biến $currentTenLTK chứa giá trị hiện tại
                                                                        $currentTenLTK = $row['TenLTK']; // Thay $row['TenLTK'] bằng giá trị tương ứng của bạn

                                                                        while ($kq = mysqli_fetch_array($resultTaiKhoan)) {
                                                                            $displayName = '';
                                                                            switch ($kq['TenLTK']) {
                                                                                case 'nv':
                                                                                    $displayName = 'Nhân viên';
                                                                                    break;
                                                                                case 'sv':
                                                                                    $displayName = 'Sinh viên';
                                                                                    break;
                                                                                case 'khac':
                                                                                    $displayName = 'Khác';
                                                                                    break;
                                                                                    // Thêm các trường hợp khác nếu cần
                                                                            }

                                                                            // Kiểm tra xem option đã có chưa và thêm thuộc tính selected nếu cần
                                                                            if ($displayName && !in_array($displayName, $options)) {
                                                                                $options[] = $displayName; // Thêm vào mảng đã hiển thị
                                                                                $selected = ($kq['TenLTK'] === $currentTenLTK) ? 'selected' : '';
                                                                        ?>
                                                                                <option value="<?= $kq['TenLTK'] ?>" <?= $selected ?>><?= $displayName ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </fieldset>
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
                                    function confirmDelete(TenDangNhap) {
                                        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
                                            window.location.href = 'index.php?action=xoataikhoan&TenDangNhap=' + TenDangNhap + '&confirm=yes';
                                            alert("Xóa thành công!");
                                        }
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Thêm tài khoản</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="index.php?action=themtaikhoan" method="POST">
                            <div class="modal-body">
                                <label for="makhu">Mã Khu: </label>
                                <div class="form-group">
                                    <input id="tendangnhap" type="text" placeholder="Tên Đăng Nhập"
                                        class="form-control" name="txtTenDangNhap">
                                </div>

                                <label for="matkhau">Mật khẩu: </label>
                                <div class="form-group">
                                    <input id="matkhau" type="text" placeholder="Mật Khẩu"
                                        class="form-control" name="txtMatKhau">
                                </div>

                                <label for="tenltk">Loại tài khoản: </label>
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <select class="form-select" name="txtLTK" id="basicSelect">
                                            <option value="" disabled selected>Loại tài khoản</option>
                                            <?php
                                            $sql = "SELECT DISTINCT TenLTK FROM taikhoan";
                                            $result = mysqli_query($conn, $sql);
                                            $options = []; // Mảng để lưu các option đã hiển thị

                                            while ($kq = mysqli_fetch_array($result)) {
                                                $displayName = '';
                                                switch ($kq['TenLTK']) {
                                                    case 'nv':
                                                        $displayName = 'Nhân viên';
                                                        break;
                                                    case 'sv':
                                                        $displayName = 'Sinh viên';
                                                        break;
                                                    case 'khac': // Ví dụ cho loại tài khoản khác
                                                        $displayName = 'Khác';
                                                        break;
                                                        // Thêm các trường hợp khác nếu cần
                                                }

                                                // Kiểm tra xem option đã có chưa
                                                if ($displayName && !in_array($displayName, $options)) {
                                                    $options[] = $displayName; // Thêm vào mảng đã hiển thị
                                                    echo "<option value=\"{$kq['TenLTK']}\">{$displayName}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <span>Đóng</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1" name="btnLuu">
                                    <span>Thêm</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>