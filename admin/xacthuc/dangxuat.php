<?php
    session_start();
    if (isset($_SESSION['nv'])) {
        unset($_SESSION['nv']);
        header('Location: ../xacthuc/dangnhap.php');
    }
?>