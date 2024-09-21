<?php
    // Gọi file chứa kết nối tới database
    include_once('./config/database.php');

    // Kiểm tra xem mã khu có được truyền vào và người dùng đã xác nhận xóa
    if (isset($_GET['MaPhong']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Bảo mật SQL Injection bằng cách sử dụng mysqli_real_escape_string()
        $MaPhong = mysqli_real_escape_string($conn, $_GET['MaPhong']);

        // Câu lệnh SQL để xóa bản ghi theo MaKhu
        $sql = "DELETE FROM phong WHERE MaPhong = '$MaPhong'";

        // Thực hiện truy vấn
        $result = mysqli_query($conn, $sql);

        // Kiểm tra kết quả của truy vấn
        if ($result) {
            // Nếu xóa thành công, hiển thị thông báo và chuyển hướng
            echo "Delete Success!";
            echo "<script>
                    window.location.href = 'index.php?action=phong&view=quanlyphong';
                  </script>";
        } else {
            // Nếu xóa thất bại, hiển thị thông báo lỗi
            echo "Lỗi khi xóa: " . mysqli_error($conn);
        }
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
?>
