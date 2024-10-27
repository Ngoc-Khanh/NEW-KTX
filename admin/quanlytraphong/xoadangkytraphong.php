<?php
include_once('./config/database.php');
if (isset($_GET['action']) && $_GET['action'] == 'xoadangkytraphong' && isset($_GET['MaDK']) && isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    $requestId = $_GET['MaDK']; // Đảm bảo rằng biến này được lấy từ tham số GET
    
    // Kiểm tra trạng thái hiện tại của đăng ký
    $checkQuery = "SELECT TinhTrang FROM dangkyphong WHERE MaDK = ?";
    if ($stmt = $conn->prepare($checkQuery)) {
        $stmt->bind_param("s", $requestId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tinhTrang = $row['TinhTrang'];
            
            if ($tinhTrang == 'chờ duyệt trả') {
                $updateQuery = "UPDATE dangkyphong SET TinhTrang='đã duyệt' WHERE MaDK = ?";
                if ($updateStmt = $conn->prepare($updateQuery)) {
                    $updateStmt->bind_param("s", $requestId);
                    if ($updateStmt->execute()) {
                        echo "<script>alert('Xóa thành công!'); window.location.href = 'index.php?action=traphong';</script>";
                    } else {
                        echo "Lỗi khi cập nhật: " . mysqli_error($conn);
                    }
                    $updateStmt->close();
                }
            } elseif ($tinhTrang == 'đã trả') {
                $deleteQuery = "DELETE FROM dangkyphong WHERE MaDK = ?";
                if ($deleteStmt = $conn->prepare($deleteQuery)) {
                    $deleteStmt->bind_param("s", $requestId);
                    if ($deleteStmt->execute()) {
                        echo "<script>alert('Xóa thành công!'); window.location.href = 'index.php?action=traphong';</script>";
                    } else {
                        echo "Lỗi khi xóa: " . mysqli_error($conn);
                    }
                    $deleteStmt->close();
                }
            } else {
                echo "<script>alert('Trạng thái không hợp lệ!'); window.location.href = 'index.php?action=traphong';</script>";
            }
        } else {
            echo "<script>alert('Không tìm thấy đăng ký!'); window.location.href = 'index.php?action=traphong';</script>";
        }
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị truy vấn: " . mysqli_error($conn);
    }
} else {
    // Nếu không có hành động hợp lệ hoặc không xác nhận
    echo "<script> window.location.href = 'index.php?action=traphong';</script>";
}

mysqli_close($conn); // Đóng kết nối cơ sở dữ liệu
?>
