<?php
    include_once('./config/database.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnLuu'])) {
        $MaKhu = $_POST['txtMaKhu'];
        $TenKhu = $_POST['txtTenKhu'];
        $GioiTinh = $_POST['txtGioiTinh'];

        $sql = "INSERT INTO khu (MaKhu, TenKhu, GioiTinh) VALUES ('$MaKhu', '$TenKhu', '$GioiTinh')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Insert error";
        } else {
            // Nếu thành công, sử dụng JavaScript để thông báo và chuyển hướng
            echo "<script>
                    alert('Thêm thành công!');
                    window.location.href = 'index.php?action=khu&view=all';
                  </script>";
            exit;  // Dừng thực thi sau khi gửi JavaScript
        }
    }
?>