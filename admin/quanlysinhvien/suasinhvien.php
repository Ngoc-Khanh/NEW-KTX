<?php
    include_once('./config/database.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
        // Lấy dữ liệu từ form
        $MaSV = $_POST['txtMaSV'];
        $HoTen = $_POST['txtHoTen'];
        $NgaySinh = $_POST['txtNgaySinh'];
        $GioiTinh = $_POST['txtGioiTinh'];
        $DiaChi = $_POST['txtDiaChi'];
        $SDT = $_POST['txtSDT'];
        $Mail = $_POST['txtMail'];
        $TenDangNhap = $_POST['txtTenDangNhap'];

        // Câu truy vấn cập nhật thông tin sinh viên
        $sql = "UPDATE sinhvien SET HoTen='$HoTen', NgaySinh='$NgaySinh', GioiTinh='$GioiTinh', DiaChi='$DiaChi', SDT='$SDT', Mail='$Mail', TenDangNhap='$TenDangNhap' WHERE MaSV='$MaSV'";

        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            echo "Update error: " . mysqli_error($conn);  // In ra lỗi nếu có
        } else {
            echo "<script>
                    alert('Sửa thành công!');
                    window.location.href = 'index.php?action=sinhvien&view=all';
                </script>";
            exit; // Dừng thực thi sau khi gửi JavaScript
        }
    }
?>
