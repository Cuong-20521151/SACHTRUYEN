@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chapter</div>
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
                    
                    <form method="POST" action={{route('Chapter.store')}} enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Chapter</label>
                          <input type="text" class="form-control"  aria-describedby="emailHelp" name="TieuDe"  placeholder="Tiêu đề truyện..." id="slug" onkeyup="ChangeToSlug();" value="{{$list_chapter->TieuDe}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" name="TomTat"  placeholder="Tóm tắt truyện..." value="{{$list_chapter->TomTat}}">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên slug chapter</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" name="TenSlugChapter" id="convert_slug" value="{{$list_chapter->TenSlugChapter}}">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="NoiDung" placeholder="Nội dung..." rows="5" style="resize: none">{{$list_chapter->NoiDung}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Thuộc truyện</label>
                            <select name="id_truyen" class="form-select" class="custom-select" >
                                @foreach ($list_truyen as $key => $truyen)
                                    <option {{$truyen->id==$list_chapter->id_truyen ? 'selected' : ''}} value="{{$truyen->id}}">{{$truyen->TenTruyen}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Kích hoạt</label>
                            <select id="disabledSelect" class="form-select" name="KichHoat">
                                @if ($list_chapter->KichHoat == 0)
                                    <option selected value="0">Kích Hoạt</option>
                                    <option value="1">Không kích Hoạt</option>
                                @else
                                    <option value="0">Kích Hoạt</option>
                                    <option selected value="1">Không kích Hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="ThemChapter" class="btn btn-primary">Chỉnh sửa</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
