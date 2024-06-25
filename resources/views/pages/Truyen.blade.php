@extends('layout')

@section('content')
<head>
    <link href="{{ asset('css/Truyen.css')}}" rel="stylesheet">
</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url()->current() }}">{{ $truyen->TenTruyen }}</a></li>
        </ol>
    </nav>
    @php
    $mucluc = count($chapter);
    @endphp
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/'.$truyen->HinhAnh) }}" alt="{{ $truyen->TenTruyen }}" style="border: 1px solid black;">
                </div>
                <div class="col-md-9">
                    <style>
                        .infotruyen {
                            list-style: none;
                            padding: 0;
                        }
                        .infotruyen li {
                            margin-bottom: 5px;
                        }
                        .infotruyen li strong {
                            font-weight: bold;
                        }
                    </style>
                    <ul class="infotruyen">
                        <li><strong>Tác giả:</strong> {{ $truyen->TacGia }}</li>
                        <li><strong>Danh mục truyện:</strong> 
                            <a href="{{ url('the-loai/'.$truyen->danhmucTruyen->TenSlug) }}">
                                {{ $truyen->danhmucTruyen->TenDanhMuc }}
                            </a>
                        </li>
                        <li><strong>Số chapter:</strong> {{ $truyen->so_chapter }}</li>
                        <li><strong>Số lượt xem:</strong> {{ $truyen->luotxem }}</li>
                        @if ($mucluc > 0)
                            <li><a href="{{url('xem-chuong/'.$chapter_dau->TenSlugChapter)}}" class="btn btn-primary">Đọc Online</a></li>
                        @else
                            <li><a href="#" class="btn btn-primary">Đọc Online</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <h4>Nội dung truyện</h4>
                <p>{{ $truyen->NoiDungTruyen }}</p>
            </div>
            <hr>
            <h4>Mục lục</h4>
            <ul class="mucluctruyen" style="list-style: none; padding: 0;">
                @if ($mucluc > 0)
                    @foreach($chapter as $key => $chap)
                        <li style="margin-bottom: 5px;"><a href="{{ url('xem-chuong/'.$chap->TenSlugChapter) }}">{{ $chap->TieuDe }}</a></li>
                    @endforeach
                @else
                    <li>Đang cập nhật...</li>
                @endif
            </ul>
            <hr>
            <div class="col-md-12">
                <h4>Sách cùng danh mục</h4>
                <div class="row">
                    @foreach ($truyencungtheloai as $truyen)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm" style="border: 1px solid black;">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/'.$truyen->HinhAnh) }}" alt="{{ $truyen->TenTruyen }}" style="height: 300px; object-fit: cover;">
                            <div class="card-body" style="height: 220px">
                                <h5 class="card-title" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $truyen->TenTruyen }}</h5>
                                <p class="card-text">{{ Str::limit($truyen->NoiDungTruyen, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                                        <a href="{{ url('xem-truyen/'.$truyen->TenSlugTruyen) }}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="fb-comments" data-href="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v20.0" data-width="" data-numposts="5"></div>
        </div>
    </div>
</body>

@endsection
