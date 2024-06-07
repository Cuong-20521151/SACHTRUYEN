@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
    </ol>
</nav>

@foreach ($list_truyen as $key => $truyen)
    
        @php
            $count = count($list_truyen);
        @endphp
        @if ($count > 0)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->HinhAnh)}}" alt="">

                        <div class="card-body">
                            <h3>{{$truyen->TenTruyen}} </h3>
                        <p class="card-text">{{$truyen->NoiDungTruyen}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 100</a>
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url($truyen->TenSlugTruyen)}}">Đọc ngay</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            truyện đang được cập nhật
        @endif
@endforeach



@endsection