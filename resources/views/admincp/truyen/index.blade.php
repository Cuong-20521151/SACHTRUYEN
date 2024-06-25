@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"  style="width: 1000px">
            <div class="card">
                <div class="card-header">Danh sách truyện</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table" >
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên truyện</th>
                            <th scope="col">Tên slug truyện</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Tóm tắt truyện</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_truyen as $key => $truyen)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$truyen->TenTruyen}}</td>
                                    <td>{{$truyen->TenSlugTruyen}}</td>
                                    <td>{{$truyen->TacGia}}</td>
                                    <td>{{$truyen->NoiDungTruyen}}</td>
                                    <td><img src="{{ asset('public/uploads/truyen/' . $truyen->HinhAnh) }}" alt="" height="250" width="100"></td>
                                    <td>{{$truyen->danhmucTruyen->TenDanhMuc}}</td>
                                    <td>
                                        @if ($truyen->KichHoat==0)
                                            <span class="text text-success">Kích Hoạt</span>
                                        @else
                                            <span class="text text-danger">Không kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$truyen->created_at}}
                                    </td>
                                    <td>
                                        @if ($truyen->updated_at != '' )
                                            {{$truyen->updated_at}}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('Truyen.edit',[$truyen->id])}}">Chỉnh sửa</a>
                                        <form method="POST" action="{{route('Truyen.destroy',['Truyen' => $truyen->id])}}">
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
