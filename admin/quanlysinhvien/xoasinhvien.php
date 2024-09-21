<?php
    // Gọi file chứa kết nối tới database
    include_once('./config/database.php');

    // Kiểm tra xem mã khu có được truyền vào và người dùng đã xác nhận xóa
    if (isset($_GET['MaSV']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Bảo mật SQL Injection bằng cách sử dụng mysqli_real_escape_string()
        $MaSV = mysqli_real_escape_string($conn, $_GET['MaSV']);

        // Câu lệnh SQL để xóa bản ghi theo MaKhu
        $sql = "DELETE FROM sinhvien WHERE MaSV = '$MaSV'";

        // Thực hiện truy vấn
        $result = mysqli_query($conn, $sql);

        // Kiểm tra kết quả của truy vấn
        if ($result) {
            // Nếu xóa thành công, hiển thị thông báo và chuyển hướng
            echo "Delete Success!";
            echo "<script>
                    window.location.href = 'index.php?action=sinhvien&view=all';
                  </script>";
        } else {
            // Nếu xóa thất bại, hiển thị thông báo lỗi
            echo "Lỗi khi xóa: " . mysqli_error($conn);
        }
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
?>
