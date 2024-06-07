@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật truyện</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action={{route('Truyen.update',[$list_truyen->id])}} enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                          <input type="text" class="form-control"  aria-describedby="emailHelp" name="TenTruyen" value="{{$list_truyen->TenTruyen}}" placeholder="Tên truyện..." id="slug" onkeyup="ChangeToSlug();">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên slug truyện</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" name="TenSlugTruyen" id="convert_slug" value="{{$list_truyen->TenSlugTruyen}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" name="TacGia" value="{{$list_truyen->TacGia}}" placeholder="Tác giả truyện..." id="slug" onkeyup="ChangeToSlug();">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt nội dung</label>
                            <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="NoiDungTruyen" placeholder="Tóm tắt nội dung..." rows="5" style="resize: none">{{$list_truyen->TenTruyen}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="HinhAnh">
                            <img src="{{ asset('public/uploads/truyen/' . $list_truyen->HinhAnh) }}" alt="" height="250" width="100">

                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Danh mục</label>
                            <select id="disabledSelect" class="form-select" name="DanhMuc">
                                @foreach ($danhmuc as $key => $muc)
                                    <option {{$muc->id==$list_truyen->DanhMuc ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->TenDanhMuc}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Kích hoạt</label>
                            <select id="disabledSelect" class="form-select" name="KichHoat">
                                @if ($list_truyen->KichHoat==0)
                                    <option selected value="0">Kích Hoạt</option>
                                    <option value="1">Không kích Hoạt</option>
                                @else
                                    <option value="0">Kích Hoạt</option>
                                    <option selected value="1">Không kích Hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="ThemTruyen" class="btn btn-primary">Thêm</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
