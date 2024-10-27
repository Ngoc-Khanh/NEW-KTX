<?php
if (isset($_SESSION['sv'])) {
    $sv = $_SESSION['sv'];
    $maSV = $sv['MaSV'];

    // Truy vấn lấy thông tin sinh viên và trạng thái phòng
    $query = "SELECT s.HoTen, 
                 IFNULL(d.MaPhong, 'Không có phòng') AS MaPhong, 
                 IFNULL(d.TinhTrang, 'Chưa đăng ký') AS TinhTrang
          FROM sinhvien AS s
          LEFT JOIN dangkyphong AS d ON s.MaSV = d.MaSV
          WHERE s.MaSV = '$maSV'
          ORDER BY d.NgayDangKy DESC, d.MaDK DESC
          LIMIT 1";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hoTen = $row['HoTen'];
        $maPhong = $row['MaPhong'];
        $tinhTrang = $row['TinhTrang'];
    } else {
        header('location: index.php?action=login');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['traPhong'])) {
            // Xử lý đăng ký trả phòng
            if ($maPhong == 'Không có phòng') {
                $_SESSION['message'] = "Bạn đang không có phòng, vui lòng đăng ký phòng!";
            } else {
                $updateQuery = "UPDATE dangkyphong SET TinhTrang = 'chờ duyệt trả', NgayTraPhong = CURDATE() WHERE MaSV = '$maSV'";
                if (mysqli_query($conn, $updateQuery)) {
                    $_SESSION['message'] = "Bạn đã đăng ký trả phòng thành công. Hãy chờ ban quản lý ktx duyệt yêu cầu của bạn.";
                } else {
                    $_SESSION['message'] = "Lỗi khi cập nhật thông tin trả phòng: " . mysqli_error($conn);
                }
            }
            header('Location: index.php?action=dktraphong');
            exit();
        }
    
        if (isset($_POST['huyTraPhong'])) {
            // Xử lý huỷ đăng ký trả phòng
            $cancelQuery = "UPDATE dangkyphong SET TinhTrang = 'đã duyệt' WHERE MaSV = '$maSV'";
            if (mysqli_query($conn, $cancelQuery)) {
                $_SESSION['message'] = "Bạn đã hủy đăng ký trả phòng thành công.";
                $tinhTrang = 'đã duyệt';
            } else {
                $_SESSION['message'] = "Lỗi khi huỷ đăng ký trả phòng: " . mysqli_error($conn);
            }
            header('Location: index.php?action=dktraphong');
            exit();
        }
    }
    
    // Hiển thị thông báo nếu có
    if (isset($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        unset($_SESSION['message']);
    }
} else {
    header('location: index.php?action=login'); //ktra đăng nhập
    exit();
}
?>

<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

<div class="content-wrapper container">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Đăng ký trả phòng ký túc xá</h3>
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

        <section class="section">
            <div class="row match-height">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin sinh viên trả phòng</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item active">Mã sinh viên: <b><?php echo $maSV; ?></b></li>
                                    <li class="list-group-item">Họ tên: <b><?php echo $hoTen; ?></b></li>
                                    <li class="list-group-item">Phòng đang ở:
                                        <b>
                                            <?php
                                            // Kiểm tra trạng thái, nếu đã trả thì hiển thị "Không có phòng"
                                            if ($tinhTrang == 'đã trả') {
                                                echo 'Không có phòng';
                                            } else {
                                                echo $maPhong; // Nếu chưa trả, hiển thị Mã phòng
                                            }
                                            ?>
                                        </b>
                                    </li>
                                    <li class="list-group-item">Trạng thái: <b><?php echo $tinhTrang; ?></b></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <code>*Lưu ý: <br> Bạn sẽ không được nhận lại tiền dư khi trả phòng trước thời hạn. Nhân viên ký túc xá sẽ kiểm tra lại tài sản trước khi cho bạn trả phòng. Hệ thống sẽ gửi thông báo sau !</code>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?php if ($tinhTrang != 'chờ duyệt trả' && $tinhTrang != 'đã trả') { ?>
                                    <form action="" method="post">
                                        <button type="submit" name="traPhong" class="btn btn-primary me-1 mb-1">Đăng ký trả
                                            phòng</button>
                                    </form>
                                <?php } elseif ($tinhTrang == 'chờ duyệt trả') { ?>
                                    <form action="" method="post">
                                        <button type="submit" name="huyTraPhong" class="btn btn-danger me-1 mb-1">Huỷ đăng
                                            ký trả phòng</button>
                                    </form>
                                <?php } elseif ($tinhTrang == 'đã trả') { ?>
                                    <p><b>Bạn đã trả phòng thành công.</b></p>
                                <?php } else { ?>
                                    <p><b>Bạn đã đăng ký trả phòng, vui lòng chờ xét duyệt.</b></p>
                                <?php } ?>
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