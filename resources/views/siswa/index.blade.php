<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Halaman Beranda</h1>

        <div class="list-data-siswa">
            <h2>List Data Siswa</h2>
            <a href="siswa/create">Tambah</a>
            <table border="1">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Kelas</th>
                        <th>Nisn</th>
                        <th>Alamat</th>
                        <th colspan="3">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                    <tr>
                        <td><img src="{{ asset('storage/' . $siswa->photo) }}" alt="" width="40"></td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->Clas->name }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td class="option-links">
                            <a href="/siswa/edit/{{ $siswa->id }}">Edit</a>
                            |
                            <a href="/siswa/show/{{ $siswa->id }}">Detail</a>
                            |
                            <a href="/siswa/delete/{{ $siswa->id }}" onclick="return confirm('yakin ingin di hapus')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
