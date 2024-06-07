<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;

class DanhMucTruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmucTruyen = DanhmucTruyen::all();
        return view('admincp.danhmuctruyen.index')->with(compact('danhmucTruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuctruyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'TenDanhMuc' => 'required|unique:danhmuc|max:255',
                'TenSlug' => 'required|max:255',
                'NoiDungDanhMuc' => 'required|max:255',
                'KichHoat' => 'required',
            ],
            [
                'TenDanhMuc.unique' => 'Tên danh mục đã tồn tại! Xin vui lòng điền tên khác!',
                'TenDanhMuc.required' => 'Tên danh mục phải có',
                'NoiDungDanhMuc.required' => 'Mô tả danh mục phải có',
            ]
        );
        $DanhmucTruyen = new danhmucTruyen();
        $DanhmucTruyen->TenDanhMuc = $data['TenDanhMuc'];
        $DanhmucTruyen->TenSlug = $data['TenSlug'];
        $DanhmucTruyen->NoiDungDanhMuc = $data['NoiDungDanhMuc'];
        $DanhmucTruyen->KichHoat = $data['KichHoat'];
        $DanhmucTruyen->save();
        return redirect()->back()->with('status','Thêm danh mục truyện thành công!');

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
        $danhmuc = DanhmucTruyen::find($id);
        return view('admincp.danhmuctruyen.edit')->with(compact('danhmuc'));
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
        $data = $request->validate(
            [
                'TenDanhMuc' => 'required|max:255',
                'TenSlug' => 'required|max:255',
                'NoiDungDanhMuc' => 'required|max:255',
                'KichHoat' => 'required',
            ],
            [
                
                'TenDanhMuc.required' => 'Tên danh mục phải có',
                'NoiDungDanhMuc.required' => 'Mô tả danh mục phải có',
            ]
        );
        $DanhmucTruyen = DanhmucTruyen::find($id);
        $DanhmucTruyen->TenDanhMuc = $data['TenDanhMuc'];
        $DanhmucTruyen->TenSlug = $data['TenSlug'];
        $DanhmucTruyen->NoiDungDanhMuc = $data['NoiDungDanhMuc'];
        $DanhmucTruyen->KichHoat = $data['KichHoat'];
        $DanhmucTruyen->save();
        return redirect()->back()->with('status','Cập nhật danh mục truyện thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhmucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công!');
    }
}
