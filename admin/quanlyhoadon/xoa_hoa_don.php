<?php
include_once('./config/database.php');

if (isset($_GET['MaHD']) && isset($_GET['MaPhong'])) {
    $maHD = $_GET['MaHD'];
    $maPhong = $_GET['MaPhong'];

    // Truy vấn SQL để xóa hóa đơn dựa trên MaHD
    $deleteSql = "DELETE FROM hoadon WHERE MaHD = $maHD";

    if (mysqli_query($conn, $deleteSql)) {
        echo "Hóa đơn đã được xóa thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Không có thông tin MaHD để xóa.";
}
header("location: index.php?action=themhoadon&MaPhong=" . $maPhong . "");

?>
