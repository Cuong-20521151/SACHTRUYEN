@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh mục truyện</div>
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
                    
                    <form method="POST" action={{route('danhmuc.update',[$danhmuc->id])}}>
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                          <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{$danhmuc->TenDanhMuc}}" name="TenDanhMuc" placeholder="Tên danh mục..." id="slug" onkeyup="ChangeToSlug();">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên slug</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{$danhmuc->TenSlug}}" name="TenSlug" placeholder="Tên danh mục..." id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$danhmuc->NoiDungDanhMuc}}" name="NoiDungDanhMuc" placeholder="Mô tả danh mục...">
                          </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Kích hoạt</label>
                            <select id="disabledSelect" class="form-select" name="KichHoat">
                                @if ($danhmuc->KichHoat==0)
                                    <option selected value="0">Kích Hoạt</option>
                                    <option value="1">Không kích Hoạt</option>
                                @else
                                    <option value="0">Kích Hoạt</option>
                                    <option selected value="1">Không kích Hoạt</option>
                                @endif
                                
                            </select>
                        </div>
                        <button type="submit" name="ThemDanhMuc" class="btn btn-primary">Cập nhật</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
