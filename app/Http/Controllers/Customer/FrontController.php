<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class FrontController extends Controller
{
    //
    public function index(){
        $articles = Article::orderBy('created_at', 'DESC')->paginate(10);
        //LOAD VIEW INDEX.BLADE.PHP DAN PASSING DATA DARI VARIABLE PRODUCTS
        return view('user.index', compact('articles'));
    }

    public function article()
    {
        //BUAT QUERY UNTUK MENGAMBIL DATA PRODUK, LOAD PER PAGENYA KITA GUNAKAN 12 AGAR PRESISI PADA HALAMAN TERSEBUT KARENA DALAM SEBARIS MEMUAT 4 BUAH PRODUK
        $articles = Article::orderBy('created_at', 'DESC')->paginate(3);
        //LOAD JUGA DATA KATEGORI YANG AKAN DITAMPILKAN PADA SIDEBAR
        //LOAD VIEW PRODUCT.BLADE.PHP DAN PASSING KEDUA DATA DIATAS
        return view('article', compact('articles'));
    }
    public function cari(Request $request)
    {

        $cari = $request->cari;
        $articles = Article::where('name', 'LIKE', '%' . $cari . '%')->paginate(3);

        return view('article', compact('articles', 'cari'));

    }
}
