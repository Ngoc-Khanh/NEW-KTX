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
                        <h3>Danh sách trả phòng</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Trả Phòng</li>
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
                                    <th>Mã Đăng Ký</th>
                                    <th>Mã Sinh Viên</th>
                                    <th>Phòng Đang Ở</th>
                                    <th>Ngày Trả Phòng</th>
                                    <th>Tình Trạng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('./config/database.php');

                                if (isset($_GET['requestId'])) {
                                    $requestId = $_GET['requestId'];
                                    if (isset($_GET['action']) && $_GET['action'] == 'cancel') {
                                        // Xóa dòng dữ liệu nếu ấn nút huỷ
                                        $deleteQuery = "DELETE FROM dangkyphong WHERE MaDK = '$requestId'";
                                        if (mysqli_query($conn, $deleteQuery)) {
                                ?>
                                            <script type="text/javascript">
                                                alert("Xóa thành công!");
                                            </script>

                                        <?php
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $date = getdate();
                                            $ngay = $date['year'] . '-' . $date['mon'] . '-' . ($date['mday']) . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
                                            $ngayhientai = $date['year'] . '/' . $date['mon'] . '/' . ($date['mday']);
                                            $td = 'Thông Báo Trả Phòng';
                                            $nd = 'Yêu cầu trả phòng của bạn không được phê duyệt. Mọi thắc mắc vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !';
                                            $masv = $_GET['MaSV'];

                                            $ngayTB = $ngayhientai;
                                            $sql2 = "INSERT INTO `thongbao`(`MaSV`, `TieuDe`, `NoiDung`) VALUES ('$masv', '$td', '$nd')";
                                            $rs2 = mysqli_query($conn, $sql2);
                                        } else {
                                        ?>
                                            <script type="text/javascript">
                                                alert("Xóa không thành công!");
                                            </script>
                                <?php
                                        }
                                    }
                                }

                                $query = "SELECT MaDK, MaSV, MaPhong, NgayTraPhong, TinhTrang FROM dangkyphong where TinhTrang='chờ duyệt trả'or TinhTrang='đã trả'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['MaDK'] . "</td>";
                                        echo "<td>" . $row['MaSV'] . "</td>";
                                        echo "<td>" . $row['MaPhong'] . "</td>";
                                        echo "<td>" . $row['NgayTraPhong'] . "</td>";
                                        echo "<td>";
                                        if ($row['TinhTrang'] == 'chưa duyệt') {
                                            echo '<span class="badge bg-danger">' . $row['TinhTrang'] . '</span>';
                                        } elseif ($row['TinhTrang'] == 'đã duyệt') {
                                            echo '<span class="badge bg-success">' . $row['TinhTrang'] . '</span>';
                                        } else {
                                            echo $row['TinhTrang'];
                                        }
                                        echo "</td>";

                                      echo "<td class='action-buttons'>
                                        <a class='badge bg-info' href='index.php?action=chitietdangkyquanlytraphong&requestId=" . $row['MaDK'] . "&MaSV=" . $row['MaSV'] . "'>Chi tiết</a>";

                                        if ($row['TinhTrang'] != 'đã trả') {
                                       echo "<a class='badge bg-primary' href='index.php?action=xulyduyetquanlytraphong&requestId=" . $row['MaDK'] . "&MaSV=" . $row['MaSV'] . "'>Duyệt</a>";
                                        } else {
                                             echo "<a class='badge bg-secondary disabled' href='#' aria-disabled='true'>Duyệt</a>"; // Hiển thị nút bị khoá
                                        }

                                        echo "<a class='badge bg-danger' href='index.php?action=xoadangkytraphong&requestId=" . $row['MaDK'] . "&MaSV=" . $row['MaSV'] . "'>Xóa</a>
                                         </td>";
                                        echo "</tr>";

                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Không có đăng ký nào.</td></tr>";
                                }
                             //   <a class='badge bg-danger' href='#' onclick='confirmDelete(" . $row['MaDK'] . ")'>Xóa</a>
                             //<a class='badge bg-primary' href='index.php?action=xulyduyetquanlytraphong&requestId=" . $row['MaDK'] . "&MaSV=" . $row['MaSV'] . "'>Duyệt</a>

                            //     <script>
                            //     function confirmDelete(MaDK) {
                            //         if (confirm("Bạn có chắc chắn muốn xóa đăng ký trả phòng của sinh viên này không?")) {
                            //             window.location.href = 'index.php?action=xoadangkytraphong&MaDK=' + MaDK + '&confirm=yes';
                            //         }
                            //     }
                            // </script>

                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

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