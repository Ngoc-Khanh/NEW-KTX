<?php
include_once('./config/database.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $maHD = $_GET["MaHD"];
    $maPhong = $_GET['MaPhong'];

    // Cập nhật trạng thái của hóa đơn sang 'Đã Thu'
    $updateSql = "UPDATE hoadon SET TinhTrang = 'DaThu' WHERE MaHD = '$maHD'";
    if ($conn->query($updateSql) === TRUE) {
        ?>
        <script type="text/javascript">
        <?php 
        echo 'alert("Thu hóa đơn thành công!");';
        ?>
        </script>
    <?php
    } else {
        ?>
        <script type="text/javascript">
        <?php echo 'alert("Thu hóa đơn thất bại!");'; ?>
        </script>
        <?php
    }
    header("Location: index.php?action=themhoadon&MaPhong=" . $maPhong . "");
    $conn->close();
}
?>
