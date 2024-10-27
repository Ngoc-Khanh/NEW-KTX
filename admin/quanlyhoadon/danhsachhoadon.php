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
                        <h3>Danh sách hóa đơn</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Hóa Đơn</li>
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
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Phòng</th>
                                    <th>Khu</th>
                                    <th>Số người tối đa</th>
                                    <th>Số người hiện tại</th>
                                    <th>Giá</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once('./config/database.php');

                                    if (isset($_POST['search'])) {
                                        $search = $_POST['search'];
                                        $sql = "SELECT MaPhong, MaKhu, SoNguoiToiDa, SoNguoiHienTai, Gia FROM phong WHERE MaPhong LIKE '%$search%'";
                                    } else {
                                        $sql = "SELECT MaPhong, MaKhu, SoNguoiToiDa, SoNguoiHienTai, Gia FROM phong";
                                    }

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['MaPhong'] . "</td>";
                                            echo "<td>" . $row['MaKhu'] . "</td>";
                                            echo "<td>" . $row['SoNguoiToiDa'] . "</td>";
                                            echo "<td>" . $row['SoNguoiHienTai'] . "</td>";
                                            echo "<td>" . number_format($row['Gia'], 0, ',', '.') . " đ</td>";
                                            echo "<td><a class='badge bg-secondary' href='index.php?action=themhoadon&MaPhong=" . $row['MaPhong'] . "'>Hóa đơn</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "Không có dữ liệu phòng.";
                                    }

                                    if (isset($_POST['search'])) { ?>
                                        <a href="index.php?action=hoadon"><button class="btn-xuatexcel"><b>Quay Lại</b></button></a>
                                    <?php }
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

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