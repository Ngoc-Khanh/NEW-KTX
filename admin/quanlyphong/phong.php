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
                        <h3>Danh sách phòng</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Phòng</li>
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
                                <a class='btn btn-success' href='index.php?action=xuatphong'>Xuất Excel</a>
                            </div>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Mã Khu</th>
                                    <th>Mã Phòng</th>
                                    <th>Số Người Tối Đa</th>
                                    <th>Số Người Hiện Tại</th>
                                    <th>Còn Trống</th>
                                    <th>Giá Phòng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('./config/database.php');

                                // Câu truy vấn để lấy tất cả các khu
                                $sql = "SELECT * FROM phong";
                                $result = mysqli_query($conn, $sql);

                                // Kiểm tra kết quả truy vấn
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $MaKhu = $row['MaKhu'];
                                        $MaPhong = $row['MaPhong'];
                                        $SoNguoiToiDa = $row['SoNguoiToiDa'];

                                        // Sử dụng prepared statement để tránh SQL Injection
                                        $stmt = $conn->prepare("SELECT COUNT(*) AS SoNguoiHienTai FROM sinhvien WHERE MaPhong = ?");
                                        $stmt->bind_param("s", $MaPhong); // 'i' chỉ định rằng $MaPhong là kiểu integer
                                        $stmt->execute();
                                        $result_SoNguoiHienTai = $stmt->get_result();
                                        $row_SoNguoiHienTai = $result_SoNguoiHienTai->fetch_assoc();

                                        $SoNguoiHienTai = $row_SoNguoiHienTai['SoNguoiHienTai'];
                                        $ConTrong = $SoNguoiToiDa - $SoNguoiHienTai;
                                        $Gia = $row['Gia'];

                                        // Đóng statement sau khi sử dụng
                                        $stmt->close();
                                ?>
                                        <tr>
                                            <td><?php echo $MaKhu; ?></td>
                                            <td><?php echo $MaPhong; ?></td>
                                            <td><?php echo $SoNguoiToiDa; ?></td>
                                            <td><?php echo $SoNguoiHienTai; ?></td>
                                            <td><?php echo $ConTrong; ?></td>
                                            <td><?php echo number_format($Gia, 0, ',', '.'); ?> đ</td>
                                            <td>
                                                <a class='badge bg-warning' data-bs-toggle='modal' data-bs-target='#inlineForm2_<?php echo $MaPhong; ?>' style='cursor: pointer;'>Sửa</a>
                                                <a class='badge bg-danger' style='cursor: pointer;' onclick='confirmDelete("<?php echo $MaPhong; ?>")'>Xóa</a>
                                            </td>
                                        </tr>

                                        <div class='modal fade text-left' id='inlineForm2_<?php echo $MaPhong; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel33' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h4 class='modal-title' id='myModalLabel33'>Sửa thông tin phòng <?php echo $MaPhong; ?></h4>
                                                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                                                            <i data-feather='x'></i>
                                                        </button>
                                                    </div>
                                                    <form action='index.php?action=suaphong&MaPhong=<?php echo $MaPhong; ?>' method='POST'>
                                                        <div class='modal-body'>
                                                            <label for='makhu'>Mã Khu: </label>
                                                            <div class='form-group'>
                                                                <fieldset class='form-group'>
                                                                    <select class='form-select' name='txtMaKhu' id='basicSelect'>
                                                                        <?php
                                                                        $sqlKhu = "SELECT * FROM khu";
                                                                        $resultKhu = mysqli_query($conn, $sqlKhu);

                                                                        while ($kq = mysqli_fetch_array($resultKhu)) {
                                                                        ?>
                                                                            <option <?php if ($kq['MaKhu'] === $MaKhu) echo 'selected="selected"'; ?> value="<?php echo $kq['MaKhu']; ?>"><?php echo $kq['MaKhu'] . " (" . $kq['GioiTinh'] . ")"; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                            <label for='maphong'>Mã Phòng: </label>
                                                            <div class='form-group'>
                                                                <input id='maphong' type='text' class='form-control' name='txtMaPhong' value='<?php echo $MaPhong; ?>' readonly>
                                                            </div>
                                                            <label for='songuoitoida'>Số người tối đa: </label>
                                                            <div class='form-group'>
                                                                <input id='songuoitoida' type='number' class='form-control' name='txtSoNguoiToiDa' value='<?php echo $SoNguoiToiDa; ?>'>
                                                            </div>
                                                            <label for='gia'>Giá: </label>
                                                            <div class='form-group'>
                                                                <input id='gia' type='text' class='form-control' name='txtGia' value='<?php echo number_format($Gia, 0, ',', '.'); ?>'>
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
                                    function confirmDelete(MaPhong) {
                                        if (confirm("Bạn có chắc chắn muốn xóa phòng này không?")) {
                                            window.location.href = 'index.php?action=xoaphong&MaPhong=' + MaPhong + '&confirm=yes';
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
                            <h4 class="modal-title" id="myModalLabel33">Thêm phòng</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="index.php?action=themphong" method="POST">
                            <div class="modal-body">
                                <label for="makhu">Mã Khu: </label>
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <select class="form-select" name="txtMaKhu" id="basicSelect">
                                            <?php
                                            $MaKhu = $row['MaKhu'];
                                            $sql = "SELECT * FROM khu";
                                            $result = mysqli_query($conn, $sql);
                                            while ($kq = mysqli_fetch_array($result)) {
                                            ?>
                                                <option <?php if ($kq['MaKhu'] === $MaKhu) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?php echo $kq['MaKhu']; ?>">
                                                    <?php echo $kq['MaKhu'] . ' (' . $kq['GioiTinh'] . ')'; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </fieldset>
                                </div>

                                <label for="maphong">Mã Phòng: </label>
                                <div class="form-group">
                                    <input id="maphong" type="text" placeholder="Mã phòng"
                                        class="form-control" name="txtMaPhong">
                                </div>

                                <label for="songuoitoida">Số người tối đa: </label>
                                <div class="form-group">
                                    <input id="songuoitoida" type="number" placeholder="Số người tối đa"
                                        class="form-control" name="txtSoNguoiToiDa">
                                </div>

                                <label for="songuoihientai">Số người hiện tại: </label>
                                <div class="form-group">
                                    <input id="songuoihientai" type="number" placeholder="Số người hiện tại"
                                        class="form-control" name="txtSoNguoiHienTai">
                                </div>

                                <label for="gia">Giá: </label>
                                <div class="form-group">
                                    <input id="gia" type="text" placeholder="Giá"
                                        class="form-control" name="txtGia">
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