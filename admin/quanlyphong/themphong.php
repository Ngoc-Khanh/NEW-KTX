<?php
    include_once('./config/database.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
        $sql = "INSERT INTO phong (MaKhu, MaPhong, SoNguoiToiDa, SoNguoiHienTai, Gia) VALUES ('" . $_POST['txtMaKhu'] . "','" . $_POST['txtMaPhong'] . "','" . $_POST['txtSoNguoiToiDa'] . "','" . $_POST['txtSoNguoiHienTai'] . "','" . $_POST['txtGia'] . "')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Insert error";
        } else {
            echo "<script>
                    alert('Thêm thành công!');
                    window.location.href = 'index.php?action=phong&view=quanlyphong';
                </script>";
            exit;
        }
    }
?>