<?php
// Bước 1: Kết nối đến cơ sở dữ liệu MySQL
$MaPhong = $_GET['MaPhong'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kytucxa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Bước 2: Sử dụng thư viện PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Bước 3: Tạo một đối tượng Spreadsheet
$spreadsheet = new Spreadsheet();

// Bước 4: Tạo một trang tính mới
$sheet = $spreadsheet->getActiveSheet();

$columnHeaders = ['Mã Hóa Đơn', 'Mã Phòng', 'Tháng', 'Tiền Điện', 'Tiền Nước', 'Tiền Mạng', 'Tình Trạng'];

// Xuất dòng tiêu đề
$col = 'A';
foreach ($columnHeaders as $header) {
    $cell = $col . '1'; // Định dạng tên ô (A1, B1, C1, ...)
    $sheet->setCellValue($col . '1', $header);
    $sheet->getStyle($cell)->getFont()->setBold(true); // Định dạng in đậm
    $col++;
}

// Bước 5: Thực hiện truy vấn để lấy dữ liệu từ MySQL
$sql = "SELECT * FROM hoadon WHERE MaPhong = '$MaPhong'";
$result = $conn->query($sql);

// Bước 6: Ghi dữ liệu từ MySQL vào trang tính Excel
$row = 2; // Bắt đầu từ hàng thứ 2 sau dòng tiêu đề
if ($result->num_rows > 0) {
    while ($row_data = $result->fetch_assoc()) {
        $col = 'A';
        foreach ($row_data as $value) {
            $sheet->setCellValue($col . $row, $value);
            $col++;
        }
        $row++;
    }
}

// Bước 7: Tạo một đối tượng Writer để xuất Excel
$writer = new Xlsx($spreadsheet);

// Bước 8: Đặt header để trình duyệt hiển thị tệp Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="danhsachhoadon.xlsx"');
header('Cache-Control: max-age=0');
ob_clean();

// Bước 9: Lưu tệp Excel vào luồng đầu ra (output stream)
$writer->save('php://output');

// Bước 10: Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
