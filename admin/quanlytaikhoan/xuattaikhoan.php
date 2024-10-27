<?php
// Kết nối đến cơ sở dữ liệu MySQL
include_once('./config/database.php');

// Sử dụng thư viện PhpSpreadsheet
require './vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Tạo một đối tượng Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Tiêu đề các cột
$columnHeaders = ['Tên đăng nhập', 'Mật khẩu', 'Tên loại tài khoản'];
$col = 'A';
foreach ($columnHeaders as $header) {
    $sheet->setCellValue($col . '1', $header);
    $sheet->getStyle($col . '1')->getFont()->setBold(true); // Định dạng in đậm
    $col++;
}

// Thực hiện truy vấn để lấy dữ liệu từ MySQL
$sql = "SELECT * FROM taikhoan";
$result = $conn->query($sql);

// Ghi dữ liệu vào file Excel
$row = 2;
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

// Xuất file Excel
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="danhsachtaikhoan.xlsx"');
header('Cache-Control: max-age=0');
ob_clean();
$writer->save('php://output');

// Đóng kết nối cơ sở dữ liệu
$conn->close();

