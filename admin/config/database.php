<?php
    include_once '../../localhost.php';
    header("Content-type: text/html; charset=utf-8");

    $tenmaychu = $localhost_name;
    $tentaikhoan = 'root';
    $matkhau = '';
    $csdl = 'kytucxa';

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect($tenmaychu, $tentaikhoan, $matkhau, $csdl);

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Thiết lập mã hóa UTF-8
    mysqli_set_charset($conn, "utf8");
    
    // mysqli_select_db($conn, $csdl);
    // mysqli_query($conn, "SET NAMES 'UTF8'");
