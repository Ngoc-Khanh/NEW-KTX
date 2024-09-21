<?php
include_once('./config/database.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
    // Lấy dữ liệu từ form
    $TenDangNhap = $_POST['txtTenDangNhap'];
    $MatKhau = $_POST['txtMatKhau'];
    $TenLTK = $_POST['txtLTK'];

    // Câu truy vấn cập nhật
    $sql = "UPDATE taikhoan SET MatKhau='$MatKhau', TenLTK='$TenLTK' WHERE TenDangNhap='$TenDangNhap'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Update error: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Sửa thành công!');
                window.location.href = 'index.php?action=taikhoan&view=quanlytaikhoan';
              </script>";
        exit; // Dừng thực thi sau khi gửi JavaScript
    }
}
?>
