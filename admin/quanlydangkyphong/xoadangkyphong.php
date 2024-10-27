<?php
include_once('./config/database.php');

// Kiểm tra hành động xóa
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    $sql = "DELETE FROM dangkyphong WHERE MaDK ='".$_GET['MaDK']."'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "Delete error" .mysqli_error($conn);
    }else{
        echo "<script> alert('Xóa thành công!'); 
             </script>";
        echo "<script> window.location.href = 'index.php?action=dangkyphong&view=quanlydangkyphong';</script>";
    }
    // $requestId = $_GET['requestId'];

    // Câu truy vấn xóa
    // $deleteQuery = "DELETE FROM dangkyphong WHERE MaDK = ?";
    // if ($stmt = $conn->prepare($deleteQuery)) {
    //     $stmt->bind_param("s", $requestId);

    //     if ($stmt->execute()) {
    //         echo "<script> alert('Xóa thành công!'); 
    //        </script>";
    //     } else {
    //         echo "Lỗi khi xóa: " . mysqli_error($conn);
    //     }
    //     $stmt->close();
    // } else {
    //     echo "Lỗi chuẩn bị truy vấn: " . mysqli_error($conn);
    // }
}
// header("location: index.php?action=dangkyphong&view=quanlydangkyphong");

mysqli_close($conn);
?>
