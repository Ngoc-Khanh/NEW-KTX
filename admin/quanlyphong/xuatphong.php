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

// Sắp xếp lại các tiêu đề cột với "Còn Trống" trước "Giá Phòng"
$columnHeaders = ['Mã Khu', 'Mã Phòng', 'Số Người Tối Đa', 'Số Người Hiện Tại', 'Còn Trống', 'Giá Phòng'];

// Xuất dòng tiêu đề
$col = 'A';
foreach ($columnHeaders as $header) {
    $cell = $col . '1'; // Định dạng tên ô (A1, B1, C1, ...)
    $sheet->setCellValue($cell, $header);
    $sheet->getStyle($cell)->getFont()->setBold(true); // Định dạng in đậm
    $col++;
}

// Bước 5: Thực hiện truy vấn để lấy dữ liệu từ MySQL
$sql = "SELECT * FROM phong";
$result = $conn->query($sql);

// Bước 6: Ghi dữ liệu từ MySQL vào trang tính Excel
$row = 2; // Bắt đầu từ hàng thứ 2 sau dòng tiêu đề
if ($result->num_rows > 0) {
    while ($row_data = $result->fetch_assoc()) {
        $col = 'A';

        // Điền các giá trị "Mã Khu", "Mã Phòng", "Số Người Tối Đa", "Số Người Hiện Tại"
        $sheet->setCellValue($col++ . $row, $row_data['MaKhu']);
        $sheet->setCellValue($col++ . $row, $row_data['MaPhong']);
        $sheet->setCellValue($col++ . $row, $row_data['SoNguoiToiDa']);
        $sql1 = "SELECT COUNT(*) AS SoNguoiHienTai FROM sinhvien WHERE MaPhong = $row_data[MaPhong]";
        $result1 = $conn->query($sql);
        $row_data1 = $result1->fetch_assoc();
        $sheet->setCellValue($col++ . $row, $row_data1['SoNguoiHienTai']);

        // Tính giá trị "Còn Trống" và thêm vào trang tính
        $conTrong = $row_data['SoNguoiToiDa'] - $row_data['SoNguoiHienTai'];
        $sheet->setCellValue($col++ . $row, $conTrong);

        // Điền giá trị "Giá Phòng"
        $sheet->setCellValue($col . $row, $row_data['Gia']);

        $row++;
    }
}

// Bước 7: Tạo một đối tượng Writer để xuất Excel
$writer = new Xlsx($spreadsheet);

// Bước 8: Đặt header để trình duyệt hiển thị tệp Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="danhsachphong.xlsx"');
header('Cache-Control: max-age=0');
ob_clean();

// Bước 9: Lưu tệp Excel vào luồng đầu ra (output stream)
$writer->save('php://output');

// Bước 10: Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
