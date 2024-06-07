@extends('layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">{{ $tentruyen->TenTruyen }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $chapter->TieuDe }}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <h4>{{ $chapter->truyen->tentruyen }}</h4>
        <p>Chương hiện tại: {{ $chapter->TieuDe }}</p>

        <div class="col-md-5">
            <div class="form-group">
                <label for="selectChapter">Chọn chương</label>
                <p>
                    @if ($previous_chapter)
                        <a class="btn btn-primary" href="{{ url('xem-chuong/'.$previous_chapter) }}">Tập Trước</a>
                    @else
                        <a class="btn btn-primary isDisabled">Tập Trước</a>
                    @endif
                </p>
                <select name="select-chapter" class="select-chapter custom-select">
                    @foreach($all_chapter as $key => $chap)
                        <option value="{{ url('xem-chuong/'.$chap->TenSlugChapter) }}">{{ $chap->TieuDe }}</option>
                    @endforeach
                </select>
                <p class="mt-4">
                    @if ($next_chapter)
                        <a class="btn btn-primary {{ $chapter->id == optional($max_id)->id ? 'isDisabled' : '' }}" href="{{ url('xem-chuong/'.$next_chapter) }}">Tập Sau</a>
                    @else
                        <a class="btn btn-primary isDisabled">Tập Sau</a>
                    @endif
                </p>
            </div>
        </div>

        <div class="noidungchuong">
            {!! nl2br(e($chapter->NoiDung)) !!}
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="selectChapter">Chọn chương</label>
                <select name="select-chapter" class="select-chapter custom-select">
                    @foreach($all_chapter as $key => $chap)
                        <option value="{{ url('xem-chuong/'.$chap->TenSlugChapter) }}">{{ $chap->TieuDe }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <h3>Lưu và chia sẻ truyện:</h3>
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var selectChapterElements = document.querySelectorAll('.select-chapter');

        selectChapterElements.forEach(function(selectElement) {
            selectElement.addEventListener('change', function() {
                var url = this.value;
                if (url) {
                    window.location.href = url;
                }
            });

            // Set the current chapter as selected
            var currentUrl = window.location.href;
            var options = selectElement.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value === currentUrl) {
                    options[i].selected = true;
                    break;
                }
            }
        });
    });
</script>

@endsection
