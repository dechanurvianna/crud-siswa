<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
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
</body>
</html>
