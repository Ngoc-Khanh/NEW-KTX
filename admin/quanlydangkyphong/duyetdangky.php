<?php
    include_once('./config/database.php');

    if (isset($_SESSION['nv'])) {
        $nv = $_SESSION['nv'];
    }

    $madk = $_GET['madk'];
    $manv = $nv['MaNV'];
    $MaSV = $_GET['MaSV'];
    $sql = "UPDATE dangkyphong SET MaNV = '$manv', TinhTrang = 'đã duyệt' WHERE MaDK = '$madk'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $query = "SELECT MaPhong FROM dangkyphong WHERE MaDK = '$madk'";
        $result = mysqli_query($conn, $query);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            $sql9 = "UPDATE phong SET SoNguoiHienTai = SoNguoiHienTai + 1 WHERE MaPhong = '" . $row['MaPhong'] . "'";
            $query9 = mysqli_query($conn, $sql9);
            $maPhong = $row['MaPhong'];

            //thêm mã phòng vào cột phòng trong bảng sinh viên
            $firstLetter = substr($maPhong, 0, 1); // Lấy chữ cái đầu tiên của $maPhong
            $sql1 = "UPDATE sinhvien SET MaPhong = '$maPhong', TenKhu = CONCAT('Khu ', '$firstLetter') WHERE MaSV = '$MaSV'";
            $result1 = mysqli_query($conn, $sql1);
            header("location: index.php?action=dangkyphong");
        }
    }
?>