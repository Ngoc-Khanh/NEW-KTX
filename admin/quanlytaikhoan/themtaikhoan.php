<?php
include_once('./config/database.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
    // Lấy giá trị từ form
    $tenDangNhap = $_POST['txtTenDangNhap'];
    $matKhau = $_POST['txtMatKhau'];
    $tenLTK = $_POST['txtLTK'];

    // Câu truy vấn để chèn dữ liệu vào bảng taikhoan
    $sql = "INSERT INTO taikhoan (TenDangNhap, MatKhau, TenLTK) VALUES ('$tenDangNhap', '$matKhau', '$tenLTK')";
    
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        echo "Insert error: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Thêm thành công!');
                window.location.href = 'index.php?action=taikhoan&view=quanlytaikhoan';
              </script>";
        exit;
    }
}
?>
