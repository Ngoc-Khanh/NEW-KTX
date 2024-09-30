<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

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

            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li
                        class="sidebar-item">
                        <a href="index.php" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Trang chủ</span>
                        </a>


                    </li>

                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Tài khoản</span>
                        </a>

                        <ul class="submenu ">
                            <li class="submenu-item  ">
                                <a href="index.php?action=thongtincanhan" class="submenu-link">Thông tin cá nhân</a>
                            </li>

                            <li class="submenu-item  ">
                                <a href="index.php?action=doimatkhau&view=doimatkhau" class="submenu-link">Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="sidebar-item  ">
                        <a href="./xacthuc/dangxuat.php" class='sidebar-link'>
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Quản lý</li>

                    <li
                        class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Quản lý Đăng Ký Phòng</span>
                        </a>

                        <ul class="submenu ">

                            <li class="submenu-item ">
                                <a href="index.php?action=dangkyphong&view=quanlydangkyphong" class="submenu-link">Xử lý đăng ký</a>

                            </li>

                            <li class="submenu-item ">
                                <a href="index.php?action=danhsachdaduyetqldkp" class="submenu-link">Danh sách đã xử lý</a>

                            </li>


                        </ul>


                    </li>

                    <li
                        class="sidebar-item ">
                        <a href="index.php?action=traphong&view=quanlytraphong" class='sidebar-link'>
                            <i class="bi bi-journal-check"></i>
                            <span>Quản lý Trả Phòng</span>
                        </a>


                    </li>

                    <li
                        class="sidebar-item  ">
                        <a href="index.php?action=hoadon&view=quanlyhoadon" class='sidebar-link'>
                            <i class="bi bi-pen-fill"></i>
                            <span>Quản lý Hóa Đơn</span>
                        </a>


                    </li>

                    <li
                        class="sidebar-item active">
                        <a href="index.php?action=khu&view=all" class='sidebar-link'>
                            <i class="bi bi-houses"></i>
                            <span>Quản lý Khu</span>
                        </a>


                    </li>

                    <li
                        class="sidebar-item  ">
                        <a href="index.php?action=phong&view=quanlyphong" class='sidebar-link'>
                            <i class="bi bi-house"></i>
                            <span>Quản lý Phòng</span>
                        </a>


                    </li>

                    <li
                        class="sidebar-item  ">
                        <a href="index.php?action=taikhoan&view=taikhoan" class='sidebar-link'>
                            <i class="bi bi-person-circle"></i>
                            <span>Quản lý Tài Khoản</span>
                        </a>


                    </li>

                    <li
                        class="sidebar-item  ">
                        <a href="index.php?action=sinhvien&view=all " class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Quản lý Sinh Viên</span>
                        </a>


                    </li>


                </ul>
            </div>
        </div>
    </div>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Danh sách khu</h3>
                        <!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý Khu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <!-- <h5 class="card-title">
                            Danh sách sinh viên đã được duyệt đăng ký phòng
                        </h5> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Mã Khu</th>
                                    <th>Tên Khu</th>
                                    <th>Giới Tính</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once('./config/database.php');

                                    // Câu truy vấn để lấy tất cả các khu
                                    $sql = "SELECT * FROM khu";
                                    $result = mysqli_query($conn, $sql);

                                    // Kiểm tra kết quả truy vấn
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $MaKhu = $row['MaKhu'];
                                            $TenKhu = $row['TenKhu'];
                                            $GioiTinh = $row['GioiTinh'];

                                            echo "<tr>";
                                            echo "<td>" . $MaKhu . "</td>";
                                            echo "<td>" . $row["TenKhu"] . "</td>";
                                            echo "<td>" . $row["GioiTinh"] . "</td>";
                                            echo "<td>
                                                    <a class='badge bg-primary' data-bs-toggle='modal' data-bs-target='#inlineForm' style='cursor: pointer;'>Thêm</a>
                                                    <a class='badge bg-warning' data-bs-toggle='modal' data-bs-target='#inlineForm2_$MaKhu' style='cursor: pointer;'>Sửa</a>
                                                    <a class='badge bg-danger' style='cursor: pointer;' onclick='confirmDelete(\"" . $MaKhu . "\")'>Xóa</a>
                                                    <a class='badge bg-success' href='index.php?action=xuatkhu'>Excel</a>
                                                </td>";
                                            echo "</tr>";

                                            echo "
                                                <div class='modal fade text-left' id='inlineForm2_$MaKhu' tabindex='-1' role='dialog' aria-labelledby='myModalLabel33' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h4 class='modal-title' id='myModalLabel33'>Sửa thông tin khu $MaKhu</h4>
                                                                <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                                                                    <i data-feather='x'></i>
                                                                </button>
                                                            </div>
                                                            <form action='index.php?action=suakhu&MaKhu=$MaKhu' method='POST'>
                                                                <div class='modal-body'>
                                                                    <label for='makhu'>Mã Khu: </label>
                                                                    <div class='form-group'>
                                                                        <input id='makhu' type='text' class='form-control' name='txtMaKhu' value='$MaKhu' readonly>
                                                                    </div>
                                                                    <label for='tenkhu'>Tên Khu: </label>
                                                                    <div class='form-group'>
                                                                        <input id='tenkhu' type='text' class='form-control' name='txtTenKhu' value='$TenKhu'>
                                                                    </div>
                                                                    <label for='gioitinh'>Giới tính: </label>
                                                                    <div class='form-group'>
                                                                        <div class='form-check'>
                                                                            <input class='form-check-input' type='radio' name='txtGioiTinh' value='Nam' id='flexRadioDefault1_$MaKhu' ".($GioiTinh == "Nam" ? "checked" : "").">
                                                                            <label class='form-check-label' for='flexRadioDefault1_$MaKhu'>Nam</label>
                                                                        </div>
                                                                        <div class='form-check'>
                                                                            <input class='form-check-input' type='radio' name='txtGioiTinh' value='Nữ' id='flexRadioDefault2_$MaKhu' ".($GioiTinh == "Nữ" ? "checked" : "").">
                                                                            <label class='form-check-label' for='flexRadioDefault2_$MaKhu'>Nữ</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-light-secondary' data-bs-dismiss='modal'>
                                                                        <span>Đóng</span>
                                                                    </button>
                                                                    <button type='submit' class='btn btn-primary ms-1' name='btnLuu'>
                                                                        <span>Sửa</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";

                                        }
                                    } else {
                                        echo "không có bản ghi";
                                    }
                                ?>

                                <script>
                                    function confirmDelete(MaKhu) {
                                        if (confirm("Bạn có chắc chắn muốn xóa khu này không?")) {
                                            window.location.href = 'index.php?action=xoakhu&MaKhu=' + MaKhu + '&confirm=yes';
                                            alert("Xóa thành công!");
                                        }
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Thêm Khu</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="index.php?action=themkhu" method="POST">
                            <div class="modal-body">
                                <label for="makhu">Mã Khu: </label>
                                <div class="form-group">
                                    <input id="makhu" type="text" placeholder="Mã khu"
                                        class="form-control" name="txtMaKhu">
                                </div>
                                <label for="tenkhu">Tên Khu: </label>
                                <div class="form-group">
                                    <input id="tenkhu" type="text" placeholder="Tên khu"
                                        class="form-control" name="txtTenKhu">
                                </div>
                                <label for="gioitinh">Giới tính: </label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="txtGioiTinh" value="Nam" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">Nam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="txtGioiTinh" value="Nữ" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <span>Đóng</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1" name="btnLuu">
                                    <span>Thêm</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer>
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
            </footer>
        </div>
    </div>
</div>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>