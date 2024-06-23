@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Sách mới</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($truyen->take(6) as $key => $value)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="image-wrapper">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $value->HinhAnh) }}" alt="{{ $value->TenTruyen }}" style="height: 400px">
                </div>

                <div class="card-body d-flex flex-column">
                    <h3 class="card-title">{{ $value->TenTruyen }}</h3>
                    <p class="card-text">{{ $value->NoiDungTruyen }}</p>
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ url('xem-truyen/' . $value->TenSlugTruyen) }}">Đọc ngay</a>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4 text-center">
        <a class="btn btn-success" href="#">Xem tất cả</a>
    </div>
</div>

<div class="container my-4">
    <h2 class="mb-4">Sách hay</h2>
    <div class="text-center">
        <a class="btn btn-success" href="#">Xem tất cả</a>
    </div>
</div>
@endsection
