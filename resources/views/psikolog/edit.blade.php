@extends('layouts.admin')

@section('title')
    <title>Edit Psikolog</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Edit Psikolog</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">

                <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
                <form action="{{ route('psikolog.update', $psikolog->id) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Psikolog</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Psikolog</label>
                                        <input type="text" name="name" class="form-control" value="{{ $psikolog->name }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $psikolog->email }}" required>
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" value="{{ $psikolog->password }}" required>
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Tanggal Lahir</label>
                                        <input type="text" name="dob" class="form-control" value="{{ $psikolog->dob }}" required>
                                        <p class="text-danger">{{ $errors->first('dob') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $psikolog->phone }}" required>
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
                                            <option value="1" {{ $psikolog->status == '1' ? 'selected':'' }}>Publish</option>
                                            <option value="0" {{ $psikolog->status == '0' ? 'selected':'' }}>Draft</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Foto Psikolog</label>
                                        <br>
                                        <img src="{{ asset('storage/psikolog/'. $psikolog->image) }}" width="100px" height="100px" alt="{{ $psikolog->name }}">
                                        <hr>
                                        <input type="file" name="image" class="form-control">
                                        <p><strong>Biarkan kosong jika tidak ingin mengganti foto</strong></p>
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">Update</button>
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
