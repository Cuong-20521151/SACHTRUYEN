<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $list_truyen = Truyen::orderBy('id', 'DESC')->where('KichHoat', 0)->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::orderBy('id', 'DESC')->where('KichHoat', 0)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen', 'list_truyen'));
    }

    public function theloai($slug)
    {

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $danhmuc_id = DanhmucTruyen::where('TenSlug', $slug)->first();
        $list_truyen = Truyen::orderBy('id', 'DESC')->where('KichHoat', 0)->where('DanhMuc', $danhmuc_id->id)->get();
        return view('pages.Danhmuc')->with(compact('danhmuc', 'list_truyen'));
    }
    public function xemtruyen($slug)
    {
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::with('danhmucTruyen')->where('TenSlugTruyen', $slug)->where('KichHoat', 0)->first();
        $chapter = Chapter::with('Truyen')->orderBy('id', 'DESC')->where('id_truyen', $truyen->id)->get();
        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('id_truyen', $truyen->id)->first();
        $truyencungtheloai = Truyen::with('danhmucTruyen')->where('DanhMuc', $truyen->danhmucTruyen->id)->whereNotIn('id', [$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'truyencungtheloai', 'chapter_dau'));
    }

    public function xemchuong($slug)
    {

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Chapter::where('TenSlugChapter', $slug)->first();
        $chapter = Chapter::with('truyen')->where('TenSlugChapter', $slug)->where('id_truyen', $truyen->id_truyen)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('id_truyen', $truyen->id_truyen)->get();
        $max_id = Chapter::where('id_truyen', $truyen->id_truyen)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('id_truyen', $truyen->id_truyen)->orderBy('id', 'ASC')->first();
        $next_chapter = Chapter::where('id_truyen', $truyen->id_truyen)->where('id', '>', $chapter->id)->min('TenSlugChapter');
        $previous_chapter = Chapter::where('id_truyen', $truyen->id_truyen)->where('id', '<', $chapter->id)->max('TenSlugChapter');
        $tentruyen = Truyen::with('danhmucTruyen')->where('id', $truyen->id_truyen)->first();

        return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'tentruyen'));
    }

    public function timkiem(Request $request)
    {
        // Fetch the slides, genres, and categories
        $list_truyen = Truyen::orderBy('id', 'DESC')->where('KichHoat', 0)->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        // Get the search keyword from the query string and sanitize it
        $tukhoa = $_GET['tukhoa'];

        // Search for stories matching the keyword in title or summary
        $truyen = Truyen::with('danhmucTruyen')->where('TenTruyen', 'LIKE', '%' . $tukhoa . '%')->Orwhere('TacGia', 'LIKE', '%' . $tukhoa . '%')->get();

        // Return the view with all necessary data
        return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'list_truyen', 'tukhoa'));
    }
}