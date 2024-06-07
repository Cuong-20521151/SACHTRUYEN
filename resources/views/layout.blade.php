<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sách truyện</title>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/Chapter.css')}}" rel="stylesheet">
    <link href="{{ asset('css/Truyen.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="container">
        {{-- -------------- HEADER ---------------- --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href={{url('/')}}>Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Thể loại truyện
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    @foreach ($danhmuc as $key => $muc)
                                        <a class="dropdown-item" href={{url('the-loai/'.$muc->TenSlug)}}>{{$muc->TenDanhMuc}}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Phân loại theo Chương
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href='#'>Dưới 100 chương</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tùy chỉnh
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="GET" action="{{url('tim-kiem')}}">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="tukhoa" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </nav>
        {{-- -------------------- slide ----------------------- --}}
        @yield('slide')
        {{----------------------- content ------------------------}}
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center text-lg-start custom-footer">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Nội dung Footer</h5>
                    <p>
                        Đây là nơi bạn có thể thêm các thông tin về trang web, giới thiệu, hoặc các thông báo quan trọng. Hãy chắc chắn rằng nội dung ở đây ngắn gọn và dễ hiểu.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Liên kết</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Liên kết 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Liên kết 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Liên kết 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Liên kết 4</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Liên kết khác</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Liên kết 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Liên kết 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Liên kết 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Liên kết 4</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-white" href="https://yourwebsite.com/">yourwebsite.com</a>
        </div>
    </footer>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v20.0" nonce="Oe0W5cdH"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });
        });

        // Handle chapter selection
        $('.select-chapter').on('change', function() {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });

        // Set the current chapter as selected
        current_chapter();
        function current_chapter() {
            var url = window.location.href;
            $('select-chapter').find('option[value="' + url + '"]').attr("selected", true);
        }
    </script>
</body>
</html>
