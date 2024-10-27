<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
<link rel="stylesheet" href="./assets/compiled/css/app.css">
<link rel="stylesheet" href="./assets/compiled/css/app-dark.css">

<div class="content-wrapper container">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Xin chào,
            <?php if (isset($_SESSION['sv'])) {
              $sv = $_SESSION['sv'];
              echo $sv['HoTen']; 
            } ?>
          </h3>
          <p class="text-subtitle text-muted">
            Chào mừng bạn đến với trang quản lý của chúng tôi
          </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Đăng ký phòng</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <section id="content-types">
      <div class="row">
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h3 class="card-title">Trang chủ</h3>
                <p class="card-text">
                  Chào mừng bạn đến với trang quản lý của chúng tôi
                </p>
              </div>
              <img class="img-fluid w-100" src="./assets/compiled/jpg/img-1.jpg" alt="Card UTT">
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
</div>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>