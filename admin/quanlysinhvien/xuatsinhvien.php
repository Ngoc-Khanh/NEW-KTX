<?php
// Bước 1: Kết nối đến cơ sở dữ liệu MySQL
include_once('./config/database.php');

// Bước 2: Sử dụng thư viện PhpSpreadsheet
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Bước 3: Tạo một đối tượng Spreadsheet
$spreadsheet = new Spreadsheet();

// Bước 4: Tạo một trang tính mới
$sheet = $spreadsheet->getActiveSheet();

// Cột tiêu đề cho bảng sinh viên
$columnHeaders = ['Mã Sinh Viên', 'Họ và Tên', 'Ngày Sinh', 'Giới Tính', 'Địa Chỉ', 'Số Điện Thoại', 'Mail', 'Mã Phòng', 'Tên Khu', 'Tên Đăng Nhập'];

// Xuất dòng tiêu đề
$col = 'A';
foreach ($columnHeaders as $header) {
    $cell = $col . '1'; // Định dạng tên ô (A1, B1, C1, ...)
    $sheet->setCellValue($col . '1', $header);
    $sheet->getStyle($cell)->getFont()->setBold(true); // Định dạng in đậm
    $col++;
}

// Bước 5: Thực hiện truy vấn để lấy dữ liệu sinh viên từ MySQL
$sql = "SELECT * FROM sinhvien";
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
header('Content-Disposition: attachment; filename="danhsachsinhvien.xlsx"');
header('Cache-Control: max-age=0');
ob_clean(); // Xóa bộ đệm đầu ra để tránh lỗi

// Bước 9: Lưu tệp Excel vào luồng đầu ra (output stream)
$writer->save('php://output');

// Bước 10: Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
