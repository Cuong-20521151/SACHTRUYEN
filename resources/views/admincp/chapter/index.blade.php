@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh sách truyện</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Chapter</th>
                            <th scope="col">Tên slug chapter</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thuộc truyện</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_chapter as $key => $Chapter)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$Chapter->TieuDe}}</td>
                                    <td>{{$Chapter->TenSlugChapter}}</td>
                                    <td>{{$Chapter->TomTat}}</td>
                                    <td>{{$Chapter->NoiDung}}</td>
                                    <td>{{$Chapter->Truyen->TenTruyen}}</td>
                                    <td>
                                        @if ($Chapter->KichHoat==0)
                                            <span class="text text-success">Kích Hoạt</span>
                                        @else
                                            <span class="text text-danger">Không kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('Chapter.edit',[$Chapter->id])}}">Chỉnh sửa</a>
                                        <form method="POST" action="{{route('Chapter.destroy',['Chapter' => $Chapter->id])}}">
                                            @method('DELETE')
                                            @csrf

                                            <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa danh mục truyện này không?');">Xóa danh mục</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
