<?php
ob_start();
session_start();
if (!isset($_SESSION['nv'])) {
    header('location: ./xacthuc/dangnhap.php');
} else {
    include_once('config/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý KTX | KTX - UTT</title>



    <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">



    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="./assets/compiled/css/iconly.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }
    </style>
</head>

<body>
    <script src="./assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <!-- <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo" srcset=""></a> -->
                            <a href="index.php" class="font-bold" style="font-size: 25px">KTX-UTT</a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                role="img" class="iconify iconify--system-uicons" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <?php
                    $action = isset($_GET['action']) ? $_GET['action'] : '';
                    $view = isset($_GET['view']) ? $_GET['view'] : '';

                    // Khai báo các biến để chứa class active
                    $trangchu_active = '';
                    $taikhoan_active = '';
                    $thongtincanhan_active = '';
                    $doimatkhau_active = '';
                    $dangkyphong_active = '';
                    $quanlydangkyphong_active = '';
                    $danhsachdaduyet_active = '';
                    $traphong_active = '';
                    $hoadon_active = '';
                    $khu_active = '';
                    $phong_active = '';
                    $taikhoanql_active = '';
                    $sinhvien_active = '';

                    // Xử lý gán class active dựa trên action và view
                    if ($action == '') {
                        $trangchu_active = 'active';
                    } elseif ($action == 'thongtincanhan') {
                        $taikhoan_active = 'active';
                        $thongtincanhan_active = 'active';
                    } elseif ($action == 'doimatkhau' && $view == 'doimatkhau') {
                        $taikhoan_active = 'active';
                        $doimatkhau_active = 'active';
                    } elseif ($action == 'dangkyphong' && $view == 'quanlydangkyphong' || $action == 'chitietdangkyqldkp') {
                        $dangkyphong_active = 'active';
                        $quanlydangkyphong_active = 'active';
                    } elseif ($action == 'danhsachdaduyetqldkp' || $action == 'chitietdangkyqldkp2') {
                        $dangkyphong_active = 'active';
                        $danhsachdaduyet_active = 'active';
                    } elseif ($action == 'traphong' && $view == 'quanlytraphong' || $action == 'chitietdangkyquanlytraphong') {
                        $traphong_active = 'active';
                    } elseif ($action == 'hoadon' && $view == 'quanlyhoadon' || $action == 'themhoadon') {
                        $hoadon_active = 'active';
                    } elseif ($action == 'khu' && $view == 'all') {
                        $khu_active = 'active';
                    } elseif ($action == 'phong' && $view == 'quanlyphong') {
                        $phong_active = 'active';
                    } elseif ($action == 'taikhoan' && $view == 'taikhoan') {
                        $taikhoanql_active = 'active';
                    } elseif ($action == 'sinhvien' && $view == 'all') {
                        $sinhvien_active = 'active';
                    }
                    ?>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php echo $trangchu_active; ?>">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Trang chủ</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub <?php echo $taikhoan_active; ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Tài khoản</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item <?php echo $thongtincanhan_active; ?>">
                                    <a href="index.php?action=thongtincanhan" class="submenu-link">Thông tin cá nhân</a>
                                </li>
                                <li class="submenu-item <?php echo $doimatkhau_active; ?>">
                                    <a href="index.php?action=doimatkhau&view=doimatkhau" class="submenu-link">Đổi mật khẩu</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="./xacthuc/dangxuat.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Quản lý</li>

                        <li class="sidebar-item has-sub <?php echo $dangkyphong_active; ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Quản lý Đăng Ký Phòng</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item <?php echo $quanlydangkyphong_active; ?>">
                                    <a href="index.php?action=dangkyphong&view=quanlydangkyphong" class="submenu-link">Xử lý đăng ký</a>
                                </li>
                                <li class="submenu-item <?php echo $danhsachdaduyet_active; ?>">
                                    <a href="index.php?action=danhsachdaduyetqldkp" class="submenu-link">Danh sách đã xử lý</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo $traphong_active; ?>">
                            <a href="index.php?action=traphong&view=quanlytraphong" class='sidebar-link'>
                                <i class="bi bi-journal-check"></i>
                                <span>Quản lý Trả Phòng</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $hoadon_active; ?>">
                            <a href="index.php?action=hoadon&view=quanlyhoadon" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Quản lý Hóa Đơn</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $khu_active; ?>">
                            <a href="index.php?action=khu&view=all" class='sidebar-link'>
                                <i class="bi bi-houses"></i>
                                <span>Quản lý Khu</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $phong_active; ?>">
                            <a href="index.php?action=phong&view=quanlyphong" class='sidebar-link'>
                                <i class="bi bi-house"></i>
                                <span>Quản lý Phòng</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $taikhoanql_active; ?>">
                            <a href="index.php?action=taikhoan&view=taikhoan" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>Quản lý Tài Khoản</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $sinhvien_active; ?>">
                            <a href="index.php?action=sinhvien&view=all" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Quản lý Sinh Viên</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            
            switch ($action) {
                case 'logout':
                    header('Location: ./taikhoan/dangxuat.php');

                // PROFILES
                case 'thongtincanhan':
                    include('./taikhoan/thongtincanhan.php');
                    break;
                case 'doimatkhau':
                    include('./taikhoan/doimatkhau.php');
                    break;

                // QUẢN LÝ ĐĂNG KÝ PHÒNG
                case 'dangkyphong':
                    include('./quanlydangkyphong/danhsachdangky.php');
                    break;
                case 'duyetdangkyqldkp':
                    include('./quanlydangkyphong/duyetdangky.php');
                    break;
                case 'danhsachdaduyetqldkp':
                    include('./quanlydangkyphong/danhsachdaduyet.php');
                    break;  
                case 'chitietdangkyqldkp':
                    include('./quanlydangkyphong/chitietdangky.php');
                    break;
                case 'chitietdangkyqldkp2':
                    include('./quanlydangkyphong/chitietdangky2.php');
                    break;

                // QUẢN LÝ TRẢ PHÒNG
                case 'traphong':
                    include('./quanlytraphong/danhsachtraphong.php');
                    break;  
                case 'xulyduyetquanlytraphong':
                    include('./quanlytraphong/xulyduyet.php');
                    break;  
                case 'chitietdangkyquanlytraphong':
                    include('./quanlytraphong/chitiettraphong.php');
                    break;  
                case 'xoadangkytraphong':
                    include('./quanlytraphong/xoadangkytraphong.php');
                    break;     
                case 'cancel':
                    include('./quanlytraphong/danhsachtraphong.php');
                    break;  
                    
                // QUẢN LÝ HÓA ĐƠN
                case 'hoadon':
                    include('./quanlyhoadon/danhsachhoadon.php');
                    break;
                case 'themhoadon':
                    include('./quanlyhoadon/themhoadon.php');
                    break;
                case 'thuhoadon':
                    include('./quanlyhoadon/thu_hoa_don.php');
                    break;
                case 'xemhoadon':
                    include('./quanlyhoadon/xemhoadon.php');
                    break;
                case 'xoahoadon':
                    include('./quanlyhoadon/xoa_hoa_don.php');
                    break;
                case 'xuathoadon':
                    include('./quanlyhoadon/xuathoadon.php');
                    break;
                
                // QUẢN LÝ KHU
                case 'khu':
                    include('./quanlykhu/khu.php');
                    break;                     
                case 'suakhu':
                    include('./quanlykhu/suakhu.php');
                    break;                     
                case 'themkhu':
                    include('./quanlykhu/themkhu.php');
                    break;                     
                case 'xoakhu':
                    include('./quanlykhu/xoakhu.php');
                    break;                     
                case 'xuatkhu':
                    include('./quanlykhu/xuatkhu.php');
                    break;               

                // QUẢN LÝ PHÒNG
                case 'phong':
                    include('./quanlyphong/phong.php');
                    break;
                case 'suaphong':
                    include('./quanlyphong/suaphong.php');
                    break; 
                case 'themphong':
                    include('./quanlyphong/themphong.php');
                    break; 
                case 'timkiemquanlyphong':
                    include('./quanlyphong/timkiemphong.php');
                    break; 
                case 'xoaphong':
                    include('./quanlyphong/xoaphong.php');
                    break; 
                case 'xuatquanlyphong':
                    include('./quanlyphong/xuatphong.php');
                    break; 
                
                // QUẢN LÝ TÀI KHOẢN
                case 'taikhoan':
                    include('./quanlytaikhoan/taikhoan.php');
                    break;
                case 'themtaikhoan':
                    include('./quanlytaikhoan/themtaikhoan.php');
                    break;
                case 'suataikhoan':
                    include('./quanlytaikhoan/suataikhoan.php');
                    break;
                case 'xoataikhoan':
                    include('./quanlytaikhoan/xoataikhoan.php');
                    break;
                case 'xuattaikhoan':
                    include('./quanlytaikhoan/xuattaikhoan.php');
                    break;    

                // QUẢN LÝ SINH VIÊN
                case'sinhvien':
                    include('./quanlysinhvien/sinhvien.php');
                    break; 
                case 'themsinhvien':
                    include('./quanlysinhvien/themsinhvien.php');
                    break;
                case 'suasinhvien':
                    include('./quanlysinhvien/suasinhvien.php');
                    break;
                case 'timsinhvien':
                    include('./quanlysinhvien/timkiemsinhvien.php');
                    break;
                case 'xoasinhvien':
                    include('./quanlysinhvien/xoasinhvien.php');
                    break;  
                case 'xuatsinhvien':
                    include('./quanlysinhvien/xuatsinhvien.php');
                    break;

                default:
                    break;
            } 
        } else {
            echo '
                <div id="main">
                    <header class="mb-3">
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </header>

                    <div class="page-heading">
                        <h3>Đây là ADMIN của Ký Túc Xá - UTT</h3>
                    </div>

                    <div class="page-content">
                        <section class="row">
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-4 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                        <div class="stats-icon purple mb-2">
                                                            <i class="iconly-boldShow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                        <h6 class="text-muted font-semibold">Phòng</h6>
                                                        <h6 class="font-extrabold mb-0">112.000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-4 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                        <div class="stats-icon blue mb-2">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                        <h6 class="text-muted font-semibold">Sinh viên</h6>
                                                        <h6 class="font-extrabold mb-0">183.000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-4 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                        <div class="stats-icon green mb-2">
                                                            <i class="iconly-boldAdd-User"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                        <h6 class="text-muted font-semibold">Còn trống</h6>
                                                        <h6 class="font-extrabold mb-0">80.000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-4 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                        <div class="stats-icon red mb-2">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                        <h6 class="text-muted font-semibold">Đã thuê</h6>
                                                        <h6 class="font-extrabold mb-0">112</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="card">
                                    <div class="card-body py-4 px-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img src="" alt="avt">
                                            </div>
                                            <div class="ms-3 name">
                                                <h5 class="font-bold">';

                                                if (isset($_SESSION["nv"])) {
                                                    $nv = $_SESSION["nv"];
                                                    echo $nv["HoTen"];
                                                }

                                                echo '</h5>
                                                <h6 class="text-muted mb-0">';

                                                if (isset($_SESSION["nv"])) {
                                                    $nv = $_SESSION["nv"];
                                                    echo "@" . $nv["TenDangNhap"];
                                                }

                                                echo '</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <footer>
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                <p>2025 &copy; Nhóm 6 | UTT</p>
                            </div>
                            <div class="float-end">
                                <p>Design by <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                <a href="https://www.facebook.com/ngockhanh2k3" target="_blank">Krug</a></p>
                            </div>
                        </div>
                    </footer>
                </div>';
        }
    ?>

    <script src="./assets/static/js/components/dark.js"></script>
    <script src="./assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="./assets/compiled/js/app.js"></script>



    <!-- Need: Apexcharts -->
    <script src="./assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="./assets/static/js/pages/dashboard.js"></script>

</body>

</html>

<?php }?>