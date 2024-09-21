<?php
include_once('./config/database.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
    // Lấy dữ liệu từ form
    $MaKhu = $_POST['txtMaKhu'];
    $MaPhong = $_POST['txtMaPhong'];
    $SoNguoiToiDa = $_POST['txtSoNguoiToiDa'];
    $SoNguoiHienTai = $_POST['txtSoNguoiHienTai'];
    $Gia = str_replace(array('.', ','), '', $_POST['txtGia']);

    // Câu truy vấn cập nhật
    $sql = "UPDATE phong SET MaKhu='$MaKhu', SoNguoiToiDa='$SoNguoiToiDa', SoNguoiHienTai='$SoNguoiHienTai', Gia='$Gia' WHERE MaPhong='$MaPhong'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Update error: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Sửa thành công!');
                window.location.href = 'index.php?action=phong&view=quanlyphong';
              </script>";
        exit; // Dừng thực thi sau khi gửi JavaScript
    }
}
?>
