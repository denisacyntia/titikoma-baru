<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use File;

class ArticleController extends Controller
{
    //
    public function index(){
        $article = Article::orderBy('created_at', 'DESC');

        if (request()->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $article = $article->where('name', 'LIKE', '%' . request()->q . '%');
        }

        $article = $article->paginate(10);

        return view('articles.index', compact('article'));
    }

    public function create()
    {
        //QUERY UNTUK MENGAMBIL SEMUA DATA CATEGORY
        //$category = Category::orderBy('name', 'DESC')->get();
        //LOAD VIEW create.blade.php` YANG BERADA DIDALAM FOLDER PRODUCTS
        //DAN PASSING DATA CATEGORY
        return view('articles.create');
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $article = Article::find($id);
        $filename = $article->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/article', $filename);
            File::delete(storage_path('app/public/article/' . $article->image));
        }

        $article->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filename,
            'status' => $request->status
        ]);
        return redirect(route('article.index'))->with(['success' => 'Artikel Diperbaharui']);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('image');
            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/article', $filename);

            $article = Article::create([
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->description,
                'image' => $filename,
                'status' => $request->status
            ]);

            return redirect(route('article.index'))->with(['success' => 'Artikel Baru Ditambahkan']);
        }

    }

    public function destroy($id)
    {
        $article = Article::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        File::delete(storage_path('app/public/article/' . $article->image));
        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $article->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('article.index'))->with(['success' => 'Artikel Sudah Dihapus']);
    }

}
