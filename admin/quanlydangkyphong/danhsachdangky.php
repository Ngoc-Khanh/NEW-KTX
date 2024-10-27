<?php
	include_once('./config/database.php');

	$sql = "SELECT * FROM dangkyphong WHERE TinhTrang = 'chưa duyệt'";
	$result = mysqli_query($conn, $sql);
?>

<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

<div id="app">
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
						<h3>Xử lý đăng ký phòng</h3>
						<!-- <p class="text-subtitle text-muted">Who does not love tables?</p> -->
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
								<li class="breadcrumb-item active" aria-current="page">Quản lý Đăng Ký Phòng</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<section class="section">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">
							Danh sách sinh viên đăng ký phòng
						</h5>
					</div>
					<div class="card-body">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>Mã Đăng Ký</th>
									<th>Mã Sinh Viên</th>
									<th>Mã Nhân Viên</th>
									<th>Mã Phòng</th>
									<th>Ngày Đăng Ký</th>
									<th>Tình Trạng</th>
									<th>Chi tiết</th>
									<th colspan="2" class="badge-danger">Thao tác</th>
									<!-- <span class="badge bg-success">Active</span> 
										<span class="badge bg-danger">Inactive</span> -->
								</tr>
							</thead>
							<tbody>
								<?php
								$so = 0;
								while ($row = mysqli_fetch_array($result)) {
									$masv = $row['MaSV'];
									$maphong = $row['MaPhong'];
									$sql2 = "SELECT * FROM sinhvien WHERE MaSV = '$masv'";
									$result2 = mysqli_query($conn, $sql2);
									$row2 = mysqli_fetch_array($result2);
									$sql12 = "SELECT * FROM phong WHERE MaPhong = '$maphong'";
									$result12 = mysqli_query($conn, $sql12);
									$row12 = mysqli_fetch_array($result12);
								?>

									<tr>
										<td><?php echo $row['MaDK']; ?></td>
										<td><?php echo $row['MaSV']; ?></td>
										<td><?php echo $row['MaNV']; ?></td>
										<td><?php echo $row['MaPhong']; ?></td>
										<td><?php echo $row['NgayDangKy']; ?></td>
										<td><?php if ($row['TinhTrang'] == 'chưa duyệt') : ?>
												<span class="badge bg-danger"><?php echo $row['TinhTrang']; ?></span>
											<?php elseif ($row['TinhTrang'] == 'đã duyệt') : ?>
												<span class="badge bg-success"><?php echo $row['TinhTrang']; ?></span>
											<?php else : ?>
												<?php echo $row['TinhTrang']; ?>
											<?php endif; ?>
										</td>
										<td><a class='badge bg-info' href="index.php?action=chitietdangkyqldkp2&madk=<?php echo $row['MaDK']; ?>">Chi tiết</a></td>
										<td><a class='badge bg-primary' href="index.php?action=duyetdangkyqldkp&madk=<?php echo  $row['MaDK'] ?>&MaSV=<?php echo $masv; ?>">Duyệt<i class="fas fa-check"></i> </a></td>
										<td><a class='badge bg-danger' onClick='confirmDelete(<?php echo $row['MaDK']; ?>)'>Xóa</a></td>
										<!--<td><a href="danhmuc/main.php?view=ctdh&mahd=<?php echo $row['MaDK']; ?>" ><i class="fas fa-backspace"></i></a></td> -->
									</tr>

								<?php } ?>

								<script>
                                    function confirmDelete(MaDK) {
                                        if (confirm("Bạn có chắc chắn muốn xóa đăng ký phòng của sinh viên này không?")) {
                                            window.location.href = 'index.php?action=xoadangkyphong&MaDK=' + MaDK + '&confirm=yes';
                                        }
                                    }
                                </script>
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<footer>
				<div class="footer clearfix mb-0 text-muted">
					<div class="float-start">
						<p>2024 &copy; Nhóm 6 | UTT</p>
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