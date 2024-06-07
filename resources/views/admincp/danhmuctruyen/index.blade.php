@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh mục truyện</div>
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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Tên slug</th>
                            <th scope="col">Nội dung danh mục</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhmucTruyen as $key => $danhmuc)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$danhmuc->TenDanhMuc}}</td>
                                    <td>{{$danhmuc->TenSlug}}</td>
                                    <td>{{$danhmuc->NoiDungDanhMuc}}</td>
                                    <td>
                                        @if ($danhmuc->KichHoat==0)
                                            <span class="text text-success">Kích Hoạt</span>
                                        @else
                                            <span class="text text-danger">Không kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('danhmuc.edit',[$danhmuc->id])}}">Chỉnh sửa</a>
                                        <form method="POST" action="{{route('danhmuc.destroy',['danhmuc' => $danhmuc->id])}}">
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
