@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')
    

<div>
    <h2>Sách mới</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($truyen as $key => $value)
        <div class="col">
            <div class="card shadow-sm">
                <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->HinhAnh)}}" alt="">

                <div class="card-body">
                    <h3>{{$value->TenTruyen}} </h3>
                <p class="card-text">{{$value->NoiDungTruyen}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url('xem-truyen/'.$value->TenSlugTruyen)}}">Đọc ngay</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <div>
        <a type="button" class="btn btn-success">Xem tất cả</a>
    </div>

</div>
<div>
    <h2>Sách hay</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
        <div class="card shadow-sm">
            <img class="card-img-top" src="public\uploads\truyen\1709797920_ảnh-tay-du-ky.jpg" alt="">

            <div class="card-body">
                <h3>Tây du ký </h3>
            <p class="card-text">Câu chuyện xoay quanh hành trình phiêu lưu của Đường Tăng và ba đồ đệ - Tôn Ngộ Không, Trư Bát Giới và Sa Tăng - trong việc đi tìm kinh sách và học thêm pháp bảo để cứu giúp nhân loại.</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                <a type="button" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                </div>
                <small class="text-muted">9 mins</small>
            </div>
            </div>
        </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <img class="card-img-top" src="public\uploads\truyen\1709797920_ảnh-tay-du-ky.jpg" alt="">

            <div class="card-body">
                <h3>Tây du ký </h3>
                <p class="card-text">Câu chuyện xoay quanh hành trình phiêu lưu của Đường Tăng và ba đồ đệ - Tôn Ngộ Không, Trư Bát Giới và Sa Tăng - trong việc đi tìm kinh sách và học thêm pháp bảo để cứu giúp nhân loại.</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                    <a type="button" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img class="card-img-top" src="public\uploads\truyen\1709797920_ảnh-tay-du-ky.jpg" alt="">
    
                <div class="card-body">
                    <h3>Tây du ký </h3>
                <p class="card-text">Câu chuyện xoay quanh hành trình phiêu lưu của Đường Tăng và ba đồ đệ - Tôn Ngộ Không, Trư Bát Giới và Sa Tăng - trong việc đi tìm kinh sách và học thêm pháp bảo để cứu giúp nhân loại.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                    <a type="button" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card shadow-sm">
                <img class="card-img-top" src="public\uploads\truyen\1709797920_ảnh-tay-du-ky.jpg" alt="">
    
                <div class="card-body">
                    <h3>Tây du ký </h3>
                <p class="card-text">Câu chuyện xoay quanh hành trình phiêu lưu của Đường Tăng và ba đồ đệ - Tôn Ngộ Không, Trư Bát Giới và Sa Tăng - trong việc đi tìm kinh sách và học thêm pháp bảo để cứu giúp nhân loại.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                    <a type="button" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img class="card-img-top" src="public\uploads\truyen\1709797920_ảnh-tay-du-ky.jpg" alt="">
    
                <div class="card-body">
                    <h3>Tây du ký </h3>
                <p class="card-text">Câu chuyện xoay quanh hành trình phiêu lưu của Đường Tăng và ba đồ đệ - Tôn Ngộ Không, Trư Bát Giới và Sa Tăng - trong việc đi tìm kinh sách và học thêm pháp bảo để cứu giúp nhân loại.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                    <a type="button" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a type="button" class="btn btn-success">Xem tất cả</a>
    </div>
</div>
@endsection