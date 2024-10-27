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
    $TenDangNhap = $_POST['txtMaSV'];

    // Câu truy vấn thêm dữ liệu vào bảng sinh viên
    $sql = "INSERT INTO sinhvien (MaSV, HoTen, NgaySinh, GioiTinh, DiaChi, SDT, Mail, TenDangNhap) 
            VALUES ('$MaSV', '$HoTen', '$NgaySinh', '$GioiTinh', '$DiaChi', '$SDT', '$Mail', '$TenDangNhap')";

    // Kiểm tra câu truy vấn
    if (!mysqli_query($conn, $sql)) {
        // Hiển thị chi tiết lỗi
        echo "Insert error: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Thêm thành công!');
                window.location.href = 'index.php?action=sinhvien&view=all';
              </script>";
        exit;
    }
}
?>
