@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</a></li>
    </ol>
</nav>

<h3>TÌM TRUYỆN VỚI TỪ KHOÁ: {{$tukhoa}}</h3>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($truyen as $truyenItem)
        <div class="col">
            <div class="card shadow-sm">
                <img class="card-img-top" src="{{ asset('public/uploads/truyen/'.$truyenItem->HinhAnh) }}" alt="{{ $truyenItem->TenTruyen }}">
                <div class="card-body">
                    <h3>{{ $truyenItem->TenTruyen }}</h3>
                    <p class="card-text">{{ $truyenItem->NoiDungTruyen }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ url('xem-truyen/'.$truyenItem->TenSlugTruyen) }}">Đọc ngay</a>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
