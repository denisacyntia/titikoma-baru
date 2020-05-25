@extends('layouts.admin')

@section('title')
    <title>Edit Artikel</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Edit Artikel</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Artikel</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Judul Artikel</label>
                                        <input type="text" name="name" class="form-control" value="{{ $article->name }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="description" class="form-control">{{ $article->description }}</textarea>
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
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
                                            <option value="1" {{ $article->status == '1' ? 'selected':'' }}>Publish</option>
                                            <option value="0" {{ $article->status == '0' ? 'selected':'' }}>Draft</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar Artikel</label>
                                        <br>
                                        <img src="{{ asset('storage/article/'. $article->image) }}" width="100px" height="100px" alt="{{ $article->name }}">
                                        <hr>
                                        <input type="file" name="image" class="form-control">
                                        <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
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

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
