<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas</title>
</head>
<body>
    <h1>Detail Kelas</h1>

    {{-- Nama kelas --}}
    <h3>{{ $dataclas->name }}</h3>

    {{-- Deskripsi kelas --}}
    <p>{{ $dataclas->description ?? 'Tidak ada deskripsi' }}</p>

    {{-- Tombol kembali --}}
    <a href="{{ url('/clas') }}">Kembali</a>
</body>
</html>
