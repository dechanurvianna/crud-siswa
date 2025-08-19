@extends('layouts.app')
@section('title')
    <title>Create Siswa</title>
@endsection
@section('content')
    <h1>Halaman Tambah Siswa</h1>
    <h1>Tambah Data Siswa</h1>
    <a href="/">Kembali</a>
    <form action="/siswa/store" method="post" enctype="multipart/form-data">
    @csrf
<br>
    <label for="">Kelas</label>
    <br>
    <select name="kelas_id">
        @foreach ($clases as $clas )
        <option value="{{ $clas->id }}">{{ $clas->name }}</option>
        @endforeach
</select><br>
@error('kelas_id')
    <email style="color:red">{{ $message }}</email>
@enderror

</div>
</br>
<div>
    <label for="">Name</label>
    <br>
    <input type="text" name="name"><br>
    @error('name')
    <email style="color:red">{{ $message }}</email>
    @enderror
</div>
<br>
<div>
    <label for="">Nisn</label>
    <br>
    <input type="text" name="nisn"><br>
    @error('nisn')
    <email style="color:red">{{ $message }}</email>
    @enderror
</div>
<br>
<div>
    <label for="">Alamat</label>
    <br>
    <input type="text" name="alamat"><br>
    @error('alamat')
    <email style="color:red">{{ $message }}</email>
    @enderror
</div>
<br>
<div>
    <label for="">Email</label>
    <br>
    <input type="text" name="email"><br>
    @error('email')
    <email style="color:red">{{ $message }}</email>
    @enderror
</div>
<br>
<div>
    <label for="">Password</label>
    <br>
    <input type="password" name="password"><br>
    @error('password')
    <email style="color:red">{{ $message }}</email>
    @enderror
</div>
<br>
<div>
    <label for="">No Handphone</label>
    <br>
    <input type="text" name="no_handphone"><br>
    @error('no_handphone')
    <email style="color:red">{{ $message }}</email>
    @enderror
</div>
<br>
<div>
    <label for="">Photo</label>
    <br>
    <input type="file" name="photo">
</div>
<br>
<button type="submit">Simpan</button>
<div>
@endsection
