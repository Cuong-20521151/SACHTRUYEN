<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmucTruyen')->orderBy('id', 'DESC')->get();
        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'TenTruyen' => 'required|unique:Truyen|max:255',
            'TenSlugTruyen' => 'required|max:255',
            'TacGia' => 'required|max:255',
            'NoiDungTruyen' => 'required',
            'HinhAnh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'KichHoat' => 'required',
        ], [
            'TenTruyen.unique' => 'Tên danh mục đã tồn tại! Xin vui lòng điền tên khác!',
            'TenTruyen.required' => 'Tên truyện phải có',
            'TenSlugTruyen.required' => 'Tên slug truyện phải có',
            'TacGia' => 'Tên tác giả phải có! Nếu bạn không biết tên tác giả hay để đang cập nhật!',
            'NoiDungTruyen.required' => 'Tóm tắt nội phải có',
            'HinhAnh.required' => 'Bạn cần chọn một hình ảnh',
        ]);

        $Truyen = new truyen();
        $Truyen->TenTruyen = $request->input('TenTruyen');
        $Truyen->TenSlugTruyen = $request->input('TenSlugTruyen');
        $Truyen->TacGia = $request->input('TacGia');
        $Truyen->NoiDungTruyen = $request->input('NoiDungTruyen');
        $Truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        $path = 'public/uploads/truyen/';
        $image = $request->file('HinhAnh');
        $image_name = time() . '_' . $image->getClientOriginalName();
        $image->move($path, $image_name);
        $Truyen->hinhanh = $image_name;

        $Truyen->DanhMuc = $request->input('DanhMuc'); // Có vẻ như bạn đang gán tên Slug của danh mục thay vì tên Slug của truyện?
        $Truyen->KichHoat = $request->input('KichHoat');
        $Truyen->save();

        return redirect()->back()->with('status', 'Thêm truyện thành công!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_truyen = Truyen::find($id);
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.edit')->with(compact('list_truyen', 'danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'TenTruyen' => 'required|max:255',
            'TenSlugTruyen' => 'required|max:255',
            'TacGia' => 'required|max:255',
            'NoiDungTruyen' => 'required',
            'HinhAnh' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'KichHoat' => 'required',
        ], [
            'TenTruyen.required' => 'Tên truyện phải có',
            'TenSlugTruyen.required' => 'Tên slug truyện phải có',
            'TacGia' => 'Tên tác giả phải có! Nếu bạn không biết tên tác giả hay để đang cập nhật!',
            'NoiDungTruyen.required' => 'Tóm tắt nội phải có',
            'HinhAnh.dimensions' => 'Hình ảnh có kích thước không hợp lệ',
        ]);

        $Truyen = Truyen::find($id);
        $Truyen->TenTruyen = $request->input('TenTruyen');
        $Truyen->TenSlugTruyen = $request->input('TenSlugTruyen');
        $Truyen->TacGia = $request->input('TacGia');
        $Truyen->NoiDungTruyen = $request->input('NoiDungTruyen');
        $Truyen->DanhMuc = $request->input('DanhMuc');
        $Truyen->KichHoat = $request->input('KichHoat');
        $Truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->HinhAnh;
        if ($get_image) {
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalName();
            $get_image->move($path, $new_image);
            $Truyen->hinhanh = $new_image;
        }

        $Truyen->save();

        return redirect()->back()->with('status', 'Cập nhật thông tin truyện thành công!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list_truyen = Truyen::find($id);
        $path = 'public/uploads/truyen' . $list_truyen->HinhAnh;
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công!');
    }
}
