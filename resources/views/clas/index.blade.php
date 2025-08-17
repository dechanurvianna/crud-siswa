<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kelas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="{{ url('/siswa') }}">Menu Siswa</a>
        <a href="{{ url('/kelas') }}">Menu Kelas</a>
        <h1>Halaman Kelas</h1>
        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <div class="list-data-kelas">
             <a href="{{ url('clas') }}">Menu kelas</a>
            <h2>List Data Kelas</h2>
            <a href="/clas/create">Tambah Kelas</a>

            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clases as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->name }}</td>
                            <td>{{ $k->description ?? '-' }}</td>
                            <td>
                                <a href="/clas/show/{{ $k->id }}">Detail</a> |
                                <a href="/clas/edit/{{ $k->id }}">Edit</a> |
                                <form action="/clas/delete/{{ $k->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin dihapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
