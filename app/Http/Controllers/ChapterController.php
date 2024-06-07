<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_chapter = Chapter::with('Truyen')->orderBy('id','DESC')->get();
        return view('admincp.chapter.index')->with(compact('list_chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.chapter.create')->with(compact('list_truyen'));
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
            
            'TomTat' => 'required|max:255',
            'TieuDe' => 'required|unique:Chapter|max:255',
            'TenSlugChapter' => 'required|max:255',
            'KichHoat' => 'required',
            'NoiDung' => 'required',
            ''
        ], [
            'TieuDe.unique' => 'Tên danh mục đã tồn tại! Xin vui lòng điền tên khác!',
            'TomTat.required' => 'Tóm tắt phải có',
            'TieuDe.required' => 'Tiêu đề phải có',
            'TenSlugChapter.required' => 'Tên slug truyện phải có',
            'NoiDung.required' => 'Nội dung phải có',
            
        ]);

        $Chapter = new Chapter();
        $Chapter->id_truyen = $request->input('id_truyen');
        $Chapter->TomTat = $request->input('TomTat');
        $Chapter->TieuDe = $request->input('TieuDe');
        $Chapter->KichHoat = $request->input('KichHoat');
        $Chapter->TenSlugChapter = $request->input('TenSlugChapter');
        $Chapter->NoiDung = $request->input('NoiDung');
        $Chapter->save();

        return redirect()->back()->with('status','Thêm chapter thành công!');
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
        $list_chapter = Chapter::find($id);
        $list_truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.Chapter.edit')->with(compact('list_chapter','list_truyen'));
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
            
            'TomTat' => 'required|max:255',
            'TieuDe' => 'required|unique:Chapter|max:255',
            'TenSlugChapter' => 'required|max:255',
            'KichHoat' => 'required',
            'NoiDung' => 'required',
            ''
        ], [
            'TieuDe.unique' => 'Tên danh mục đã tồn tại! Xin vui lòng điền tên khác!',
            'TomTat.required' => 'Tóm tắt phải có',
            'TieuDe.required' => 'Tiêu đề phải có',
            'TenSlugChapter.required' => 'Tên slug truyện phải có',
            'NoiDung.required' => 'Nội dung phải có',
            
        ]);

        $Chapter = Chapter::find($id);
        $Chapter->id_truyen = $request->input('id_truyen');
        $Chapter->TomTat = $request->input('TomTat');
        $Chapter->TieuDe = $request->input('TieuDe');
        $Chapter->KichHoat = $request->input('KichHoat');
        $Chapter->TenSlugChapter = $request->input('TenSlugChapter');
        $Chapter->NoiDung = $request->input('NoiDung');
        $Chapter->save();

        return redirect()->back()->with('status','Chỉnh sửa chapter thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa chapter thành công!');
    }
}
