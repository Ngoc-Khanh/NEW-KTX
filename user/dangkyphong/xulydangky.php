<?php
    session_start(); // Bắt buộc khởi động session ở đầu file

    if (!isset($_SESSION['sv'])) {
        $_SESSION['message'] = 'Bạn chưa đăng nhập!';
        header('location: index.php'); // Điều hướng về trang đăng nhập
        exit(); // Dừng việc thực thi mã PHP sau khi điều hướng
    }

    $sv = $_SESSION['sv'];
    $maSV = $sv['MaSV'];

    $sql1 = "SELECT MaPhong FROM sinhvien WHERE MaSV = '$maSV'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

    if ($row1['MaPhong'] != NULL) {
        $_SESSION['message'] = 'Đăng ký phòng không thành công! Bạn đã có phòng!';
    } else {
        if (isset($_POST['SoNguoi'], $_POST['khu'])) {
            $soNguoiChon = $_POST['SoNguoi'];
            $maKhu = $_POST['khu'];

            $sql = "SELECT MaPhong FROM phong WHERE SoNguoiToiDa = $soNguoiChon AND MaKhu = '$maKhu' AND SoNguoiHienTai < SoNguoiToiDa LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $maPhong = $row['MaPhong'];

                $ngayDangKy = date("Y-m-d");
                $tinhTrang = "chưa duyệt";

                $sqlInsert = "INSERT INTO dangkyphong (MaPhong, MaSV, NgayDangKy, TinhTrang) VALUES ('$maPhong', '$maSV', '$ngayDangKy', '$tinhTrang')";
                if ($conn->query($sqlInsert) === TRUE) {
                    $_SESSION['message'] = 'Đăng ký phòng thành công!';
                } else {
                    $_SESSION['message'] = 'Đăng ký phòng không thành công!';
                }
            } else {
                $_SESSION['message'] = 'Không có phòng phù hợp!';
            }
        } else {
            $_SESSION['message'] = 'Vui lòng chọn số người và khu phòng!';
        }
    }
    if (isset($_POST['huydangkyPhong'])) {
        $cancelQuery = "DELETE FROM dangkyphong WHERE MaSV = '$maSV'"; // Xóa yêu cầu đăng ký phòng 
        if (mysqli_query($conn, $cancelQuery)) {
            echo '<script>alert("Bạn đã hủy đăng ký phòng thành công.");</script>';
            echo "<script>
                    window.location.href = 'index.php?action=dkphong';
                  </script>";
        } else {
            echo "Lỗi khi huỷ đăng ký phòng: " . mysqli_error($conn);
        }
    }
    $conn->close();
    header('location: index.php?action=dkphong');
    exit(); // Dừng việc thực thi mã PHP sau khi điều hướng
?>