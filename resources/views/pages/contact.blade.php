@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Thông tin công ty -->
        <div class="col-md-6">
            <h5><strong>CÔNG TY CP TRUYỀN THÔNG VÀ SỰ KIỆN IQ</strong></h5>
            <p><strong>Địa chỉ:</strong> M18-19 Tôn Đức Thắng, P. Xuân An, TP. Phan Thiết, Bình Thuận</p>
            <p><strong>Hotline:</strong> <a href="tel:0933348885" class="text-success">09333 4 8885</a></p>
            <p><strong>Email:</strong> <a href="mailto:iqmedia.pt@gmail.com" class="text-info">iqmedia.pt@gmail.com</a></p>

            <!-- Form liên hệ -->
            <h5 class="mt-4"><strong>LIÊN HỆ VỚI CHÚNG TÔI</strong></h5>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" placeholder="Họ và tên">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" placeholder="Điện thoại">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="5" placeholder="Nội dung"></textarea>
                </div>
                <button type="submit" class="btn btn-dark">Gửi thông tin</button>
            </form>
        </div>

        <!-- Bản đồ -->
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3585.7351017870537!2d108.10906977457691!3d10.942562256108257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31768316eb600eaf%3A0x4153283065f43d8!2zTTE4LTE5IFTDtG4gxJDhu6ljIFRo4bqvbmcsIFh1w6JuIEFuLCBUaMOgbmggcGjhu5EgUGhhbiBUaGnhur90LCBCw6xuaCBUaHXhuq1uIDgwMDAwMCwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1750305886668!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection