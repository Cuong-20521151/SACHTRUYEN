@extends('../layout')
@section('content')
<body>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url()->current() }}">Truyện mới</a></li>
        </ol>
    </nav>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" style="margin-bottom: 20px">
        @foreach ($truyen as $key => $value)
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
</body>
@endsection
