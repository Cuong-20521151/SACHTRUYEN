@extends('../layout')
@section('slide')
<head>
    <link href="{{ asset('css/Slide.css')}}" rel="stylesheet">
</head>
<body>
    <h2>Sách nên đọc</h2>
    <div class="owl-carousel owl-theme">
        @foreach ($list_truyen->take(8) as $key => $value)
        <div class="item" onclick="location.href='{{ url('xem-truyen/' . $value->TenSlugTruyen) }}'" style="height: 450px">
            <div class="carousel-item-content">
                <img src="{{ asset('public/uploads/truyen/' . $value->HinhAnh) }}" alt="{{ $value->TenTruyen }}" style="height: 350px">
                <h3>{{ $value->TenTruyen }}</h3>
                <p><i class="fa-solid fa-eye"></i> 100</p>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <script>
    $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 4, /* Số lượng items hiển thị, bạn có thể thay đổi */
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    });
    </script>

</body>
@endsection
