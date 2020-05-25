@extends('layouts.admin')

@section('title')
    <title>Tambah Psikolog</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Tambah Psikolog</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">

                <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
                <form action="{{ route('psikolog.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Psikolog</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Psikolog</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Tanggal Lahir</label>
                                        <input type="text" name="dob" class="form-control" value="{{ old('dob') }}" required>
                                        <p class="text-danger">{{ $errors->first('dob') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Domisili</label>
                                        <select name="location" class="form-control" required>
                                            <option value="0" {{ old('status') == '0' ? 'selected':'' }}>Bekasi</option>
                                            <option value="1" {{ old('status') == '1' ? 'selected':'' }}>Bogor</option>
                                            <option value="2" {{ old('status') == '2' ? 'selected':'' }}>Depok</option>
                                            <option value="3" {{ old('status') == '3' ? 'selected':'' }}>Jakarta</option>
                                            <option value="4" {{ old('status') == '4' ? 'selected':'' }}>Tangerang</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('location') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1" {{ old('status') == '1' ? 'selected':'' }}>Publish</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected':'' }}>Draft</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>
                                    {{--<div class="form-group">
                                        <label for="category_id">Kategori</label>

                                        <!-- DATA KATEGORI DIGUNAKAN DISINI, SEHINGGA SETIAP PRODUK USER BISA MEMILIH KATEGORINYA -->
                                        --}}{{--<select name="category_id" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}" {{ old('category_id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('category_id') }}</p>--}}{{--
                                    </div>--}}
                                    {{--<div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Berat</label>
                                        <input type="number" name="weight" class="form-control" value="{{ old('weight') }}" required>
                                        <p class="text-danger">{{ $errors->first('weight') }}</p>
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="image">Foto Psikolog</label>
                                        <input type="file" name="image" class="form-control" value="{{ old('image') }}" required>
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

<!-- PADA ADMIN LAYOUTS, TERDAPAT YIELD JS YANG BERARTI KITA BISA MEMBUAT SECTION JS UNTUK MENAMBAHKAN SCRIPT JS JIKA DIPERLUKAN -->
@section('js')
    <!-- LOAD CKEDITOR -->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
        CKEDITOR.replace('description');
    </script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="dob"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>
@endsection
