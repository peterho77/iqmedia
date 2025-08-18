@extends('layouts.app')

@section('content')
<style>
.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}
.h-custom {
    height: calc(100% - 73px);
}
@media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
}
</style>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-10 col-lg-7 col-xl-6 offset-xl-0">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email"
              class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Nhập email " value="{{ old('email') }}" required autofocus />
            @error('email')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password"
              class="form-control form-control-lg @error('password') is-invalid @enderror"
              placeholder="Nhập mật khẩu" required />
            @error('password')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check mb-0">
            </div>
            <a href="#" class="text-body">Quên mật khẩu?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản?
              <a href="{{ route('register') }}" class="link-danger">Đăng ký</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
