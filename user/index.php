<?php
ob_start();
session_start();
if (!isset($_SESSION['sv'])) {
    header('location: ./xacthuc/dangnhap.php');
} else {
    include_once('config/database.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KTX-UTT</title>



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
            <div id="main" class="layout-horizontal">
                <header class="mb-5">
                    <div class="header-top">
                        <div class="container">
                            <div class="logo">
                                <!-- <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a> -->
                                <a href="index.php" class="font-bold" style="font-size: 25px">KTX - UTT</a>
                            </div>
                            <div class="header-top-right">

                                <div class="dropdown">
                                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="avatar avatar-md2">
                                            <img src="./assets/compiled/jpg/1.jpg" alt="Avatar">
                                        </div>
                                        <div class="text">
                                            <h6 class="user-dropdown-name">
                                                <?php
                                                if (isset($_SESSION["sv"])) {
                                                    $sv = $_SESSION["sv"];
                                                    echo $sv["HoTen"];
                                                }
                                                ?>
                                            </h6>
                                            <p class="user-dropdown-status text-sm text-muted">
                                                <?php
                                                if (isset($_SESSION["sv"])) {
                                                    $sv = $_SESSION["sv"];
                                                    echo $sv["TenDangNhap"];
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                        <li><a class="dropdown-item" href="index.php?action=thongtincanhan">Thông tin cá nhân</a></li>
                                        <li><a class="dropdown-item" href="index.php?action=doimatkhau">Đổi mật khẩu</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="./xacthuc/dangxuat.php">Đăng xuất</a></li>
                                    </ul>
                                </div>

                                <!-- Burger button responsive -->
                                <a href="#" class="burger-btn d-block d-xl-none">
                                    <i class="bi bi-justify fs-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php
                    $action = $_GET['action'] ?? '';

                    // Array to hold active classes
                    $active_classes = [
                        'trangchu_active' => '',
                        'dkphong_active' => '',
                        'dkchuyenphong_active' => '',
                        'dktraphong_active' => '',
                        'hoadon_active' => ''
                    ];

                    // Assign active class based on action
                    switch ($action) {
                        case '':
                            $active_classes['trangchu_active'] = 'active';
                            break;
                        case 'dkphong':
                        case 'xulydangky':
                            $active_classes['dkphong_active'] = 'active';
                            break;
                        case 'dktraphong':
                            $active_classes['dktraphong_active'] = 'active';
                            break;
                        case 'hoadon':
                            $active_classes['hoadon_active'] = 'active';
                            break;
                    }

                    // Extract variables for use in HTML
                    extract($active_classes);
                    ?>

                    <nav class="main-navbar">
                        <div class="container">
                            <ul>



                                <li
                                    class="menu-item <?php echo $trangchu_active; ?> ">
                                    <a href="index.php" class='menu-link'>
                                        <span><i class="bi bi-grid-fill"></i> Trang chủ</span>
                                    </a>
                                </li>



                                <li
                                    class="menu-item <?php echo $dkphong_active; ?> ">
                                    <a href="index.php?action=dkphong" class='menu-link'>
                                        <span><i class="bi bi-house"></i> Đăng ký phòng</span>
                                    </a>
                                </li>



                                <li
                                    class="menu-item <?php echo $dktraphong_active; ?> ">
                                    <a href="index.php?action=dktraphong" class='menu-link'>
                                        <span><i class="bi bi-journal-check"></i> Đăng ký Trả Phòng</span>
                                    </a>
                                </li>

                                <li
                                    class="menu-item <?php echo $hoadon_active; ?> ">
                                    <a href="index.php?action=hoadon" class='menu-link'>
                                        <span><i class="bi bi-wallet"></i> Xem hóa đơn</span>
                                    </a>
                                </li>


                            </ul>
                        </div>

                    </nav>

                </header>

                <!-- <div class="content-wrapper container">

                    <div class="page-heading">
                        <h3>Horizontal Layout</h3>
                    </div>

                </div> -->

                <?php
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];

                    switch ($action) {
                        case 'logout':
                            header('Location: ./taikhoan/dangxuat.php');

                            // TRANG CHỦ
                        case 'trangchu':
                            include('./trangchu/trangchu.php');
                            break;

                            // PROFILES
                        case 'thongtincanhan':
                            include('./taikhoan/thongtincanhan.php');
                            break;
                        case 'doimatkhau':
                            include('./taikhoan/doimatkhau.php');
                            break;

                            // ĐĂNG KÝ PHÒNG
                        case 'dkphong':
                            include('./dangkyphong/dangkyphong.php');
                            break;
                        case 'xulydangky':
                            include_once('./dangkyphong/xulydangky.php');
                            break;

                            // ĐĂNG KÝ CHUYỂN PHÒNG
                        case 'dkchuyenphong':
                            include('./dangkychuyenphong/dangkychuyenphong.php');
                            break;

                            // ĐĂNG KÝ TRẢ PHÒNG
                        case 'dktraphong':
                            include('./dangkytraphong/dangkytraphong.php');
                            break;

                            // HÓA ĐƠN
                        case 'hoadon':
                            include('./hoadon/xemhoadon.php');
                            break;

                        default:
                            break;
                    }
                } else {
                }
                ?>

                <footer>
                    <div class="container">
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                <p>2025 &copy; Nhóm 6 | UTT</p>
                            </div>
                            <div class="float-end">
                                <p>Design by <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                    <a href="https://www.facebook.com/ngockhanh2k3" target="_blank">Krug</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


        <script src="assets/static/js/components/dark.js"></script>
        <script src="assets/static/js/pages/horizontal-layout.js"></script>
        <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <script src="assets/compiled/js/app.js"></script>


        <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="assets/static/js/pages/dashboard.js"></script>

    </body>

    </html>

<?php } ?>