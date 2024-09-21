<?php
    include_once('./config/database.php');

    if (isset($_GET['requestId'])) {
        $requestId = $_GET['requestId'];
    
        // Lấy ngày giờ hiện tại
        $ngayTraPhong = date('Y-m-d H:i:s');  // Định dạng ngày giờ YYYY-MM-DD HH:MM:SS
    
        // 1. Lấy thông tin mã phòng từ bảng đăng ký phòng
        $queryMaPhong = "SELECT MaPhong FROM dangkyphong WHERE MaDK = '$requestId'";
        $resultMaPhong = mysqli_query($conn, $queryMaPhong);
    
        if (mysqli_num_rows($resultMaPhong) > 0) {
            $rowMaPhong = mysqli_fetch_assoc($resultMaPhong);
            $maPhong = $rowMaPhong['MaPhong'];
    
            // 2. Cập nhật cột "số người hiện tại" trong bảng "phong"
            $updateSoNguoiQuery = "UPDATE phong SET SoNguoiHienTai = SoNguoiHienTai - 1 WHERE MaPhong = '$maPhong'";
            //3. xoá mã phòng của sinh viên đó trong bảng sinhvien
            $updateSinhVienQuery= " UPDATE sinhvien SET MaPhong = NULL, TenKhu = NULL WHERE MaPhong = '$maPhong'";
            
            if (mysqli_query($conn, $updateSoNguoiQuery)) {
                // 4. Cập nhật trạng thái và ngày trả phòng trong bảng "dangkyphong"
                $updateQuery = "UPDATE dangkyphong SET TinhTrang = 'đã duyệt', NgayTraPhong = '$ngayTraPhong' WHERE MaDK = '$requestId'";
                $resultUpdateSinhVienQuery = mysqli_query($conn, $updateSinhVienQuery);
                
                if (mysqli_query($conn, $updateQuery)) {
                    ?>
                <script type="text/javascript">
                    alert("Duyệt thành công!");
                </script>
    
                <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = getdate();
                $ngay = $date['year'] . '-' . $date['mon'] . '-' . ($date['mday']) . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
                $ngayhientai = $date['year'] . '/' . $date['mon'] . '/' . ($date['mday']);
                $td = 'Thông Báo Trả Phòng';
                $nd = 'Yêu cầu trả phòng của bạn đã được phê duyệt. Mọi thắc mắc vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !!!';
                $masv = $_GET['MaSV'];
                
                // $ngayTB = $ngayhientai;
                $sql2 = "INSERT INTO `thongbao`(`MaSV`, `TieuDe`, `NoiDung`) VALUES ('$masv', '$td', '$nd')";
                $rs2 = mysqli_query($conn, $sql2);
                    header("Location: index.php?action=traphong");
                } else {
                    ?>
                <script type="text/javascript">
                    alert("Duyệt không thành công!");
                </script>
                <?php
                }
            } else {
                echo "Lỗi khi cập nhật số người hiện tại trong bảng phong: " . mysqli_error($conn);
            }
        }
    }
?>