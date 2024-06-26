@extends('../layout')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('resources/css/Danhmuc.css') }}">
</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url()->current() }}">Danh mục</a></li>
        </ol>
    </nav>
    @php
        $count = count($list_truyen);
    @endphp
    @if ($count > 0)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($list_truyen as $key => $truyen)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="image-wrapper">
                        <img class="card-img-top" src="{{ asset('public/uploads/truyen/'.$truyen->HinhAnh) }}" alt="{{ $truyen->TenTruyen }}" style="height: 400px">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">{{ $truyen->TenTruyen }}</h3>
                        <p class="card-text">{{ $truyen->NoiDungTruyen }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ url('xem-truyen/'.$truyen->TenSlugTruyen) }}">Đọc ngay</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div>{{ $list_truyen->links() }}</div>
    @else
        truyện đang được cập nhật
    @endif
</body>
@endsection