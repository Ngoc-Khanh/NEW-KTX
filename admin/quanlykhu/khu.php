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
                        <h3>Danh sách khu</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Khu</li>
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
                                <a class='btn btn-success' href='index.php?action=xuatkhu'>Xuất Excel</a>
                            </div>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Mã Khu</th>
                                    <th>Tên Khu</th>
                                    <th>Giới Tính</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('./config/database.php');

                                // Câu truy vấn để lấy tất cả các khu
                                $sql = "SELECT * FROM khu";
                                $result = mysqli_query($conn, $sql);

                                // Kiểm tra kết quả truy vấn
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $MaKhu = $row['MaKhu'];
                                        $TenKhu = $row['TenKhu'];
                                        $GioiTinh = $row['GioiTinh'];
                                ?>
                                        <tr>
                                            <td><?php echo $MaKhu; ?></td>
                                            <td><?php echo $TenKhu; ?></td>
                                            <td><?php echo $GioiTinh; ?></td>
                                            <td>
                                                <a class='badge bg-warning' data-bs-toggle='modal' data-bs-target='#inlineForm2_<?php echo $MaKhu; ?>' style='cursor: pointer;'>Sửa</a>
                                                <a class='badge bg-danger' style='cursor: pointer;' onclick='confirmDelete("<?php echo $MaKhu; ?>")'>Xóa</a>
                                            </td>
                                        </tr>

                                        <div class='modal fade text-left' id='inlineForm2_<?php echo $MaKhu; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel33' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h4 class='modal-title' id='myModalLabel33'>Sửa thông tin khu <?php echo $MaKhu; ?></h4>
                                                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                                                            <i data-feather='x'></i>
                                                        </button>
                                                    </div>
                                                    <form action='index.php?action=suakhu&MaKhu=<?php echo $MaKhu; ?>' method='POST'>
                                                        <div class='modal-body'>
                                                            <label for='makhu'>Mã Khu: </label>
                                                            <div class='form-group'>
                                                                <input id='makhu' type='text' class='form-control' name='txtMaKhu' value='<?php echo $MaKhu; ?>' readonly>
                                                            </div>
                                                            <label for='tenkhu'>Tên Khu: </label>
                                                            <div class='form-group'>
                                                                <input id='tenkhu' type='text' class='form-control' name='txtTenKhu' value='<?php echo $TenKhu; ?>'>
                                                            </div>
                                                            <label for='gioitinh'>Giới tính: </label>
                                                            <div class='form-group'>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='radio' name='txtGioiTinh' value='Nam' id='flexRadioDefault1_<?php echo $MaKhu; ?>' <?php echo ($GioiTinh == "Nam" ? "checked" : ""); ?>>
                                                                    <label class='form-check-label' for='flexRadioDefault1_<?php echo $MaKhu; ?>'>Nam</label>
                                                                </div>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='radio' name='txtGioiTinh' value='Nữ' id='flexRadioDefault2_<?php echo $MaKhu; ?>' <?php echo ($GioiTinh == "Nữ" ? "checked" : ""); ?>>
                                                                    <label class='form-check-label' for='flexRadioDefault2_<?php echo $MaKhu; ?>'>Nữ</label>
                                                                </div>
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
                                    function confirmDelete(MaKhu) {
                                        if (confirm("Bạn có chắc chắn muốn xóa khu này không?")) {
                                            window.location.href = 'index.php?action=xoakhu&MaKhu=' + MaKhu + '&confirm=yes';
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
                            <h4 class="modal-title" id="myModalLabel33">Thêm Khu</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="index.php?action=themkhu" method="POST">
                            <div class="modal-body">
                                <label for="makhu">Mã Khu: </label>
                                <div class="form-group">
                                    <input id="makhu" type="text" placeholder="Mã khu"
                                        class="form-control" name="txtMaKhu">
                                </div>
                                <label for="tenkhu">Tên Khu: </label>
                                <div class="form-group">
                                    <input id="tenkhu" type="text" placeholder="Tên khu"
                                        class="form-control" name="txtTenKhu">
                                </div>
                                <label for="gioitinh">Giới tính: </label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="txtGioiTinh" value="Nam" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">Nam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="txtGioiTinh" value="Nữ" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">Nữ</label>
                                    </div>
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