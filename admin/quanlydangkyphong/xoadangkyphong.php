<?php
include_once('./config/database.php');

// Kiểm tra hành động xóa
if (isset($_GET['action']) && $_GET['action'] == 'xoadangkyphong' && isset($_GET['requestId'])) {
    $requestId = $_GET['requestId'];

    // Câu truy vấn xóa
    $deleteQuery = "DELETE FROM dangkyphong WHERE MaDK = ?";
    if ($stmt = $conn->prepare($deleteQuery)) {
        $stmt->bind_param("s", $requestId);

        if ($stmt->execute()) {
            echo "<script>alert('Xóa thành công!'); 
            window.location.href = 'index.php?action=dangkyphong&view=quanlydangkyphong';</script>";
        } else {
            echo "Lỗi khi xóa: " . mysqli_error($conn);
        }
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị truy vấn: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
