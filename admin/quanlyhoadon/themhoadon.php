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
                        <h3>Danh sách hóa đơn cho phòng <?php echo $_GET['MaPhong']; ?></h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">    
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="index.php?action=hoadon&view=quanlyhoadon">Quản lý hóa đơn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hóa đơn phòng <?php echo $_GET['MaPhong']; ?></li>
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
                                <h4 class="card-title">Thêm hóa đơn</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="" class="form">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tienDien">Tiền điện</label>
                                                    <input type="number" id="tienDien" class="form-control" name="tienDien" placeholder="Tiền điện" min="10000" step="10000">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tienNuoc">Tiền nước</label>
                                                    <input type="number" id="tienNuoc" class="form-control" name="tienNuoc" placeholder="Tiền nước" min="10000" step="10000">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="tienMang">Tiền mạng</label>
                                                    <input type="number" id="tienMang" class="form-control" name="tienMang" placeholder="Tiền mạng" min="10000" step="10000">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <fieldset class="form-group">
                                                    <label for="thang">Tháng</label>
                                                    <select class="form-select" name="thang" id="thang">
                                                        <option value="1">Tháng 1</option>
                                                        <option value="2">Tháng 2</option>
                                                        <option value="3">Tháng 3</option>
                                                        <option value="4">Tháng 4</option>
                                                        <option value="5">Tháng 5</option>
                                                        <option value="6">Tháng 6</option>
                                                        <option value="7">Tháng 7</option>
                                                        <option value="8">Tháng 8</option>
                                                        <option value="9">Tháng 9</option>
                                                        <option value="10">Tháng 10</option>
                                                        <option value="11">Tháng 11</option>
                                                        <option value="12">Tháng 12</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" name='submit' class="btn btn-primary me-1 mb-1">Thêm</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include_once('./config/database.php');

                    if (isset($_GET['MaPhong'])) {
                        $maPhong = $_GET['MaPhong'];
                    
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            var_dump($_POST);
                            if (!empty($_POST['tienDien']) && !empty($_POST['tienNuoc']) && !empty($_POST['tienMang']) && !empty($_POST['thang'])) {
                                $tienDien = $_POST['tienDien'];
                                $tienNuoc = $_POST['tienNuoc'];
                                $tienMang = $_POST['tienMang'];
                                $thang = $_POST['thang'];
                    
                                // Use prepared statement to avoid SQL injection
                                $insertSql = $conn->prepare("INSERT INTO hoadon (MaPhong, TienDien, TienNuoc, TienMang, Thang, TinhTrang) VALUES (?, ?, ?, ?, ?, 'ChuaThu')");
                                $insertSql->bind_param("sssss", $maPhong, $tienDien, $tienNuoc, $tienMang, $thang);
                    
                                if ($insertSql->execute()) {
                                    echo "Dữ liệu mới đã được thêm thành công.";
                                    // Redirect to the same page to prevent form resubmission
                                    header("Location: {$_SERVER['REQUEST_URI']}");
                                } else {
                                    echo "Lỗi: " . $conn->error;
                                }
                            } else {
                                echo "Vui lòng nhập đầy đủ thông tin tiền điện, tiền nước, tiền mạng và tháng.";
                            }
                        }
                ?>
                
            </section>


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
                                    <th>Mã hóa đơn</th>
                                    <th>Mã phòng</th>
                                    <th>Tháng</th>
                                    <th>Tiền điện</th>
                                    <th>Tiền nước</th>
                                    <th>Tiền mạng</th>
                                    <th>Tổng tiền</th>
                                    <th>Tình trạng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT MaHD, MaPhong, Thang, TienDien, TienNuoc, TienMang, TinhTrang, (TienDien + TienNuoc + TienMang) AS TongTien FROM hoadon WHERE MaPhong = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("s", $maPhong);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['MaHD'] . "</td>";
                                            echo "<td>" . $row['MaPhong'] . "</td>";
                                            echo "<td>" . $row['Thang'] . "</td>";
                                            echo "<td>" . $row['TienDien'] . "</td>";
                                            echo "<td>" . $row['TienNuoc'] . "</td>";
                                            echo "<td>" . $row['TienMang'] . "</td>";
                                            echo "<td>" . $row['TongTien'] . "</td>";
                                            echo "<td>";
                                            if ($row['TinhTrang'] == 'ChuaThu') {
                                                echo "<button class='badge bg-danger' style='border: none; background-color: transparent;' onclick='thuHoaDon(" . $row['MaHD'] . ")'>Chưa Thu</button>";
                                            } elseif ($row['TinhTrang'] == 'DaThu') {
                                                echo "<span class='badge bg-success'>Đã thu</span>";
                                            } else {
                                                echo $row['TinhTrang'];
                                            }
                                            echo "</td>";
                                            echo "<td>
                                                    <a href='index.php?action=xuathoadon&MaPhong=" . $maPhong . "' class='badge bg-success'>Excel</a>
                                                    <a href='index.php?action=xoahoadon&MaPhong=" . $maPhong . "&MaHD=" . $row['MaHD'] . "' class='badge bg-danger'>Xóa</a>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "Không có dữ liệu hóa đơn cho phòng này.";
                                    }
                                
                                } else {
                                    echo "Không có thông tin MaPhong.";
                                }
                                
                                $conn->close();
                                ?>

                                <script>
                                    var updatedHDs = {}; // Để theo dõi các hóa đơn đã được cập nhật

                                    function thuHoaDon(maHD) {
                                        updatedHDs[maHD] = true; // Đánh dấu hóa đơn này là đã được cập nhật

                                        // Gửi yêu cầu cập nhật trạng thái hóa đơn sang 'Đã Thu'
                                        fetch('index.php?action=thuhoadon&MaHD=' + maHD, { method: 'POST' })
                                            .then(function(response) {
                                                if (response.status === 200) {
                                                    alert('Hóa đơn đã được thu.');
                                                    window.location.reload();
                                                } else {
                                                    alert('Có lỗi xảy ra khi thu hóa đơn.');
                                                }
                                            });
                                    }
                                </script>
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