<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Bootstrap Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <style>
      .hover-gold:hover {
        color: gold !important;
      }

      li:hover {
        list-style-type: none;
      }
    </style>
  </head>
  <body>
    <footer class="bg-black text-white pt-5 pb-3">
      <div class="container">
        <div class="row ps-5">
          <div class="col-md-4">
            <h5>Thông tin chung</h5>
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 80px" class="my-2" />
            <p>
              <strong>Địa chỉ: </strong>M18-19 Tôn Đức Thắng, P. Xuân An, TP.
              Phan Thiết, Tỉnh Bình Thuận
            </p>
            <p><strong>Mã số thuế: </strong>3401154242</p>
            <p><strong>Điện thoại: </strong>09333 4 8885</p>
            <p><strong>Email: </strong>iqmedia.pt@gmail.com</p>
          </div>
          <div class="col-md-2">
            <h5>Về chúng tôi</h5>
            <ul>
              <li>
                <a href="/" class="text-white text-decoration-none hover-gold"
                  >Trang chủ</a
                >
              </li>
              <li>
                <a href="/gioi-thieu" class="text-white text-decoration-none hover-gold"
                  >Giới thiệu</a
                >
              </li>
              <li>
                <a href="/dich-vu" class="text-white text-decoration-none hover-gold"
                  >Dịch vụ</a
                >
              </li>
              <li>
                <a href="/tin-tuc" class="text-white text-decoration-none hover-gold"
                  >Tin tức</a
                >
              </li>
              <li>
                <a href="/lien-he" class="text-white text-decoration-none hover-gold"
                  >Liên hệ</a
                >
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>Chính sách khách hàng</h5>
            <ul>
              <li>
                <a href="#" class="text-white text-decoration-none hover-gold"
                  >Chính sách nhân viên</a
                >
              </li>
              <li>
                <a href="#" class="text-white text-decoration-none hover-gold"
                  >Chính sách thanh toán</a
                >
              </li>
              <li>
                <a href="#" class="text-white text-decoration-none hover-gold"
                  >Hướng dẫn mua hàng</a
                >
              </li>
              <li>
                <a href="#" class="text-white text-decoration-none hover-gold"
                  >Chính sách đổi sản phẩm</a
                >
              </li>
              <li>
                <a href="#" class="text-white text-decoration-none hover-gold"
                  >Bảo mật thông tin cá nhân</a
                >
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>Liên kết xã hội</h5>
            <div class="mb-2">
              <a href="#" class="btn btn-primary btn-sm me-1"
                ><i class="bi bi-facebook"></i
              ></a>
              <a href="#" class="btn btn-primary btn-sm me-1"
                ><i class="bi bi-twitter"></i
              ></a>
              <a href="#" class="btn btn-danger btn-sm me-1"
                ><i class="bi bi-youtube"></i
              ></a>
              <a href="#" class="btn btn-dark btn-sm me-1"
                ><i class="bi bi-instagram"></i
              ></a>
            </div>
            <img src="{{ asset('img/facebook-widget.png') }}" alt="Facebook Widget" class="img-fluid" />
          </div>
        </div>
      </div>
      <hr class="bg-secondary" />
      <p class="text-center mt-3">
        Copyright © 2025 Bản quyền thuộc về iqmedia.com.vn | Designed by IQ Media
      </p>
    </footer>
  </body>
</html>