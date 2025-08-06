<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Baru</title>
</head>
<body>
        <h1>Halaman Baru</h1>
        <h1>List Data</h1>
        <a href="siswa/create">Tambah Data Siswa</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Name</th>
                    <th>Nisn</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th colspan="3">option</th>
</tr>
</thead>
</body>
    @foreach ($siswas as $siswa )
    <tr>
        <td><img src="{{asset('storage/'.$siswa->photo) }}" alt="" width="40"></td>
        <td>{{ $siswa->name }}</td>
        <td>{{ $siswa->nisn }}</td>
        <td>{{ $siswa->clas->name }}</td>
        <td>{{ $siswa->alamat }}</td>
        <td class="option links">
            <a href="#">Hapus</a>
            <a href="#">Edit</a>
            <a href="#">Detail</a>
    </td>
</tr>
        @endforeach
</tr>
<tbody>
</table>
</div>
</body>
</html>
