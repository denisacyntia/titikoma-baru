@extends('layouts.admin')

@section('title')
    <title>List Artikel</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    List Artikel

                                    <!-- BUAT TOMBOL UNTUK MENGARAHKAN KE HALAMAN ADD PRODUK -->
                                    <div class="float-right">
                                        {{--<a href="--}}{{--{{ route('product.bulk') }}--}}{{--" class="btn btn-danger btn-sm">Mass Upload</a>--}}
                                        <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                                    </div>
                                </h4>
                            </div>
                            <div class="card-body">
                                <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                            <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->

                                <!-- BUAT FORM UNTUK PENCARIAN, METHODNYA ADALAH GET -->
                                <form action="{{--{{ route('product.index') }}--}}" method="get">
                                    <div class="input-group mb-3 col-md-3 float-right">
                                        <!-- KEMUDIAN NAME-NYA ADALAH Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
                                        <input type="text" name="q" class="form-control" placeholder="Cari.." value="{{ request()->q }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button">Cari</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Gambar Artikel</th>
                                            <th>Judul Artikel</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
                                        <!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
                                        @forelse ($article as $row)
                                            <tr>
                                                <td>
                                                    <!-- TAMPILKAN GAMBAR DARI FOLDER PUBLIC/STORAGE/PRODUCTS -->
                                                    <img src="{{ asset('storage/article/' . $row->image) }}" width="100px" height="100px" alt="{{ $row->name }}">
                                                </td>
                                                <td>
                                                    <strong>{{ $row->name }}</strong><br>
                                                </td>
                                                {{--<td>
                                                    <strong>{{ $row->name }}</strong><br>
                                                    <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                                    <label>Kategori: <span class="badge badge-info">{{ $row->category->name }}</span></label><br>
                                                    <label>Berat: <span class="badge badge-info">{{ $row->weight }} gr</span></label>
                                                </td>
                                                <td>Rp {{ number_format($row->price) }}</td>--}}
                                                <td>{{ $row->created_at->format('d-m-Y') }}</td>

                                                <!-- KARENA BERISI HTML MAKA KITA GUNAKAN { !! UNTUK MENCETAK DATA -->
                                                <td>{!! $row->status_label !!}</td>

                                                <td>
                                                    <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
                                                    <form action="{{ route('article.destroy', $row->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('article.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                                {!! $article->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection