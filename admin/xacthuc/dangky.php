<?php
    include_once('../config/database.php');

    if (isset($_POST['register'])) {
        $ma = mysqli_real_escape_string($conn, $_POST['ma']);
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $HoTen = mysqli_real_escape_string($conn, $_POST['HoTen']);
        $NgaySinh = mysqli_real_escape_string($conn, $_POST['NgaySinh']);
        $DiaChi = mysqli_real_escape_string($conn, $_POST['DiaChi']);
        $SDT = mysqli_real_escape_string($conn, $_POST['SDT']);
        $tenltk = mysqli_real_escape_string($conn, $_POST['tenltk']);

        // Kiểm tra tài khoản đã tồn tại
        $select = "SELECT * FROM taikhoan WHERE TenDangNhap = '$ma'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("Tài khoản đã tồn tại!")</script>';
        } else {
            // Kiểm tra mật khẩu và mật khẩu xác nhận có trùng khớp
            if  ($pass != $cpass) {
                echo '<script>alert("Mật khẩu không trùng khớp!")</script>';
            } else {
                // Kiểm tra loại tài khoản và thêm vào cơ sở dữ liệu
                if ($tenltk == 'nv') {
                    $insert1 = "INSERT INTO taikhoan(TenDangNhap, MatKhau, TenLTK) VALUES('$ma', '$pass', '$tenltk')";
                    $insert2 = "INSERT INTO nhanvien(MaNV, HoTen, NgaySinh, DiaChi, SDT, TenDangNhap) VALUES('$ma', '$HoTen', '$NgaySinh', '$DiaChi', '$SDT', '$ma')";
                    mysqli_query($conn, $insert1);
                    mysqli_query($conn, $insert2);
                    echo '<script>alert("Đăng kí tài khoản thành công!")</script>';
                    header('Location: ../xacthuc/dangnhap.php');
                    exit();
                } elseif ($tenltk == 'sv') {
                    $insert1 = "INSERT INTO taikhoan(TenDangNhap, MatKhau, TenLTK) VALUES('$ma', '$pass', '$tenltk')";
                    $insert2 = "INSERT INTO sinhvien(MaSV, HoTen, NgaySinh, DiaChi, SDT, TenDangNhap) VALUES('$ma', '$HoTen', '$NgaySinh', '$DiaChi', '$SDT', '$ma')";
                    mysqli_query($conn, $insert1);
                    mysqli_query($conn, $insert2);
                    echo '<script>alert("Đăng kí tài khoản thành công!")</script>';
                    header('Location: ../xacthuc/dangnhap.php');
                    exit();
                } else {
                    echo '<script>alert("Loại tài khoản không hợp lệ!")</script>';
                }
            } 
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    
    <link rel="shortcut icon" href="../assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,..." type="image/png">
    <link rel="stylesheet" href="../assets/compiled/css/app.css">
    <link rel="stylesheet" href="../assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="../assets/compiled/css/auth.css">
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
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">
        
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <!-- <a href="dangnhap.php"><img src="../assets/compiled/svg/logo.svg" alt="Logo"></a> -->
                    </div>
                    <h1 class="auth-title">Đăng ký</h1>
                    <p class="auth-subtitle mb-5">Trang web quản lý Ký Túc Xá của nhóm 6.</p>

                    <!-- Form đăng ký -->
                    <form action="dangky.php" method="POST"> <!-- Thay đổi action đến file PHP xử lý -->
                        
                        <!-- Nhập tên người dùng (username) -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="ma" class="form-control form-control-xl" placeholder="Mã nhân viên" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        
                        <!-- Nhập họ tên -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="HoTen" class="form-control form-control-xl" placeholder="Họ và tên" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person-circle"></i>
                            </div>
                        </div>

                        <!-- Ngày sinh -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="date" name="NgaySinh" class="form-control form-control-xl" placeholder="Ngày sinh" required>
                            <div class="form-control-icon">
                                <i class="bi bi-calendar"></i>
                            </div>
                        </div>

                        <!-- Địa chỉ -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="DiaChi" class="form-control form-control-xl" placeholder="Địa chỉ" required>
                            <div class="form-control-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        </div>

                        <!-- Số điện thoại -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="SDT" class="form-control form-control-xl" placeholder="SĐT" required>
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="pass" class="form-control form-control-xl" placeholder="Mật khẩu" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <!-- Xác nhận mật khẩu -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="cpass" class="form-control form-control-xl" placeholder="Nhập lại mật khẩu" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <!-- Loại tài khoản -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <select name="tenltk" class="form-control form-control-xl" required>
                                <option value="" disabled selected>Loại tài khoản</option>
                                <option value="nv">Nhân viên</option>
                                <option value="sv">Sinh viên</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>
                        </div>

                        <button type="submit" name="register" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng ký</button>
                    </form>
                    
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Đã có tài khoản? <a href="dangnhap.php" class="font-bold">Đăng ký</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <!-- Placeholder cho phần hình ảnh nếu có -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
