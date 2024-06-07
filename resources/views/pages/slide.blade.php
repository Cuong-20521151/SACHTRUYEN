@extends('../layout')
@section('slide')
<h2>Sách nên đọc</h2>
<div class="owl-carousel owl-theme">
    @foreach ($list_truyen as $key => $value)
        <div class="item" onclick="location.href='{{ url('xem-truyen'. $tentruyen->TenTruyen }}'">
            <img src="{{ asset('public/uploads/truyen/' . $value->HinhAnh) }}" alt="">
            <h3>{{ $value->TenTruyen }}</h3>
            <p><i class="fa-solid fa-eye"></i> 100</p>
        </div>
    @endforeach
</div>
@endsection
