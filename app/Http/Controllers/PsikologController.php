<?php

namespace App\Http\Controllers;

use App\Psikolog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class PsikologController extends Controller
{
    //
    public function index(){
        $psikolog = Psikolog::orderBy('created_at', 'DESC');

        if (request()->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $psikolog = $psikolog->where('name', 'LIKE', '%' . request()->q . '%');
        }

        $psikolog = $psikolog->paginate(10);

        return view('psikolog.index', compact('psikolog'));
    }

    public function create()
    {
        return view('psikolog.create');
    }

    public function edit($id){
        $psikolog = Psikolog::find($id);
        return view('psikolog.edit', compact('psikolog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'dob' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $psikolog = Psikolog::find($id);
        $filename = $psikolog->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/psikolog', $filename);
            File::delete(storage_path('app/public/psikolog/' . $psikolog->image));
        }

        $psikolog->update([
            'name' => $request->name,
            'slug' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'location' => $request->location,
            'dob' =>$request->dob,
            'image' => $filename,
            'status' => $request->status
        ]);
        return redirect(route('psikolog.index'))->with(['success' => 'Psikolog Diperbaharui']);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'dob' => 'required|string|max:100',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('image');
            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/psikolog', $filename);

            $psikolog = Psikolog::create([
                'name' => $request->name,
                'slug' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'location' => $request->location,
                'dob' =>$request->dob,
                'image' => $filename,
                'status' => $request->status
            ]);

            return redirect(route('psikolog.index'))->with(['success' => 'Psikolog Baru Ditambahkan']);
        }
    }

    public function destroy($id)
    {
        $psikolog = Psikolog::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        File::delete(storage_path('app/public/psikolog/' . $psikolog->image));
        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $psikolog->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('psikolog.index'))->with(['success' => 'Artikel Sudah Dihapus']);
    }
}
