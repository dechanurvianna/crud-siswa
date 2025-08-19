@extends('layouts.app')
@section('title')
    <title>Create Clas</title>
@endsection
@section('content')
    <div class="container">
        <h1>Tambah Kelas Baru</h1>
        <a href="{{ url('/clas') }}">Kembali</a>
        <form action="/clas/store" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Nama Kelas:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>
                <br>
            </div>
            <div>
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea><br><br>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
