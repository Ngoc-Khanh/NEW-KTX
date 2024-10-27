<?php
    session_start();
    if (isset($_SESSION['sv'])) {
        // Xóa session người dùng
        unset($_SESSION['sv']);
        
        // Xóa cookie
        setcookie('masv', '', time() - 3600, "/");
        setcookie('pass', '', time() - 3600, "/");

        // Chuyển hướng về trang đăng nhập
        header('Location: ../xacthuc/dangnhap.php');
        exit();
    }
?>
