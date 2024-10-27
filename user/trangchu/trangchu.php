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
              <!-- <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Đăng ký phòng</li> -->
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
                <h4 class="card-title">Khu vực gần ký túc xá</h4>
                <p class="card-text">
                  Địa chỉ: 54 P. Triều Khúc, Thanh Xuân Nam, Thanh Xuân, Hà Nội
                </p>
              </div>
              <img class="img-fluid w-100" src="./assets/compiled/jpg/img-1.jpg" alt="Card UTT">
            </div>
            <div class="card-footer d-flex justify-content-between">
              <span class="ms-2 mt-2">UTT - KTX</span>
              <button class="btn btn-light-primary"><a class="text-light" href="https://utt.edu.vn/" target="_blank">Read More</a></button>
            </div>
          </div>

          <div class="card collapse-icon accordion-icon-rotate">
            <div class="card-header">
              <h4 class="card-title pl-1">Các khoa - bộ môn</h4>
            </div>
            <div class="card-body">
              <div class="accordion" id="cardAccordion">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Khoa Công trình
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show"
                      aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Bộ môn Cầu</li>
                          <li>Bộ môn Đường</li>
                          <li>Bộ môn Công trình thủy</li>
                          <li>Bộ môn Đo đạc - Khảo sát công trình</li>
                          <li>Bộ môn Xây dựng dân dụng và Công nghiệp</li>
                          <li>Bộ môn Địa kỹ thuật</li>
                          <li>Bộ môn Đường sắt</li>
                          <li>Bộ môn Kết cấu - Vật liệu</li>
                          <li>Phòng thí nghiệm Công trình xây dựng</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Khoa Cơ khí
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse"
                      aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Bộ môn Ô tô</li>
                          <li>Bộ môn Máy xây dựng</li>
                          <li>Bộ môn Máy tàu thủy</li>
                          <li>Bộ môn Đầu máy toa xe</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        Khoa Kinh tế Vận tải
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse"
                      aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Bộ môn Cơ sở ngành kinh tế</li>
                          <li>Bộ môn Kế toán - Kiểm toán</li>
                          <li>Bộ môn Kinh tế xây dựng</li>
                          <li>Bộ môn Tài chính - Ngân hàng</li>
                          <li>Bộ môn Quản trị doanh nghiệp</li>
                          <li>Bộ môn Vận tải Sắt - Bộ</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">
                        Khoa Công nghệ thông tin
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse"
                      aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Bộ môn Hệ thống thông tin</li>
                          <li>Bộ môn Công nghệ mạng</li>
                          <li>Bộ môn Điện - Điện tử</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                        aria-expanded="false" aria-controls="collapseFive">
                        Khoa Khoa học cơ bản
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse"
                      aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Bộ môn Toán tin</li>
                          <li>Bộ môn Vật lý</li>
                          <li>Bộ môn Hóa học</li>
                          <li>Bộ môn Ngoại ngữ</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                        aria-expanded="false" aria-controls="collapseSix">
                        Khoa Lý luận chính trị
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse"
                      aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Bộ môn NLCB của chủ nghĩa Mác-Lê Nin</li>
                          <li>Bộ môn Tư tưởng Hồ Chí Minh</li>
                          <li>Bộ môn Đường lối cách mạng của Đảng CSVN</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                        aria-expanded="false" aria-controls="collapseSeven">
                        Khác...
                      </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse"
                      aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <ul class="ps-3">
                          <li>Khoa đào tạo tại chức</li>
                          <li>Khoa Cơ sở kỹ thuật</li>
                          <li>Bộ môn Giáo dục thể chất</li>
                          <li>Bộ môn Giáo dục Quốc phòng - An Ninh</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-content">
              <img src="./assets/compiled/jpg/img-2.jpg" class="card-img-top img-fluid"
                alt="singleminded">
              <div class="card-body">
                <h5 class="card-title">Lựa chọn đúng, Sáng tương lai</h5>
                <p class="card-text">
                  Trường Đại học Công nghệ Giao thông Vận tải là trường Đại học công lập được nâng cấp năm 2011 từ Trường Cao đẳng giao thông vận tải- trực thuộc Bộ Giao thông Vận tải. Tiền thân là trường Cao đẳng Công chính, được thành lập ngày 15/11/1945.
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h4 class="card-title mb-0">TRƯỜNG ĐẠI HỌC CÔNG NGHỆ GIAO THÔNG VẬN TẢI</h4>
              </div>
              <div class="embed-responsive embed-responsive-item embed-responsive-16by9 w-100">
                <iframe src="https://www.youtube.com/embed/IPv5pMxZHVw" style="width:100%" height="300"
                  allowfullscreen></iframe>
              </div>
              <div class="card-body">
                <p class="card-text">
                  Trường đào tạo đa ngành, đa lĩnh vực về công nghệ kỹ thuật giao thông, công nghệ kỹ thuật cơ khí, ô tô, kinh tế, vận tải, logistics, công nghệ thông tin, điện tử viễn thông, môi trường... theo định hướng ứng dụng phục vụ ngành GTVT và các ngành kinh tế quốc dân. Năm 2016, Trường được Thủ tướng Chính phủ quy hoạch phát triển thành trường đại học trọng điểm Quốc gia
                </p>
                <a href="https://utt.edu.vn/" target="_blank" class="card-link">Website</a>
                <a href="https://www.facebook.com/utt.vn" target="_blank" class="card-link">Facebook</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h4 class="card-title">Một số hình ảnh</h4>
                <h6 class="card-subtitle">Số điện thoại: 024 3854 4264</h6>
              </div>

              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./assets/compiled/jpg/trangchu-img-1.jfif" class="d-block w-100" alt="UTT-img-1">
                  </div>
                  <div class="carousel-item">
                    <img src="./assets/compiled/jpg/trangchu-img-2.jfif" class="d-block w-100" alt="UTT-img-2">
                  </div>
                  <div class="carousel-item">
                    <img src="./assets/compiled/jpg/trangchu-img-3.jfif" class="d-block w-100" alt="Image Jump">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </a>
              </div>
            </div>

            <div class="card-body">
              <p class="card-text">
                Các hệ đào tạo :
              </p>
              <p class="card-text">
              <ul class="ps-3">
                <li>Tiến sĩ</li>
                <li>Thạc sĩ</li>
                <li>Đại học: chính quy, tại chức, liên thông, văn bằng 2</li>
                <li>Cao đẳng: Chính quy</li>
                <li>Các khoá học ngắn hạn, nghề: bồi dưỡng, huấn luyện, cấp chứng chỉ,các chứng chỉ chuyên ngành giao thông vận tải và các chứng chỉ ngoại ngữ, tin học quốc gia, lái xe môtô A1, ôtô B1, B2, C, D, E...</li>
              </ul>
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h4 class="card-title">Góp ý...</h4>
                <p class="card-text">
                  Hãy góp ý thêm cho trang web...
                </p>
                <form class="form" method="post">
                  <div class="form-body">
                    <div class="form-group">
                      <!-- <label for="feedback1" class="sr-only">Họ và tên</label> -->
                      <input type="text" id="feedback1" class="form-control" placeholder="Họ và tên"
                        name="name">
                    </div>
                    <div class="form-group">
                      <!-- <label for="feedback4" class="sr-only">Mã sinh viên</label> -->
                      <input type="text" id="feedback2" class="form-control" placeholder="Mã sinh viên"
                        name="masv">
                    </div>
                    <div class="form-group">
                      <!-- <label for="feedback4" class="sr-only">Lớp</label> -->
                      <input type="text" id="feedback3" class="form-control" placeholder="Lớp"
                        name="lop">
                    </div>
                    <div class="form-group">
                      <!-- <label for="feedback2" class="sr-only">Email</label> -->
                      <input type="email" id="feedback2" class="form-control" placeholder="Email"
                        name="email">
                    </div>
                    <div class="form-group form-label-group">
                      <textarea class="form-control" id="label-textarea" rows="3"
                        placeholder="Mô tả..."></textarea>
                      <label for="label-textarea"></label>
                    </div>
                  </div>
                  <div class="form-actions d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>