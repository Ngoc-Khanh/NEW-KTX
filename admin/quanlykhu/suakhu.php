<?php
    include_once('./config/database.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnLuu'])) {
        $TenKhu = $_POST['txtTenKhu'];
        $MaKhu = $_POST['txtMaKhu'];
        $GioiTinh = $_POST['txtGioiTinh'];

        $conn = mysqli_connect("localhost", "root", "", "kytucxa");
        if (!$conn) {
            die("Kết nối thất bại");
        }
        $sql= "UPDATE khu SET TenKhu = '".$TenKhu."', GioiTinh='".$GioiTinh."' WHERE MaKhu = '".$MaKhu."'";
        
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Update error" . mysqli_error($conn);
        } else {
            echo "<script>
                    alert('Sửa thành công!');
                    window.location.href = 'index.php?action=khu&view=all';
                  </script>";
            exit;  // Dừng thực thi sau khi gửi JavaScript
        }
    }
?>