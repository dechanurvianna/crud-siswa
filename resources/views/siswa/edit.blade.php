<DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Data Siswa</title>
    </head>
    <body>
        <h1>Halaman Tambah Siswa</h1>
        <h1>Tambah Data Siswa</h1>
        <a href="/">Kembali</a>
        <br>
        <img width="70" src="{{ asset('storage/'. $datauser->photo) }}">
        <form action="/siswa/update/{{$datauser->id}}" method="post" enctype="multipart/form-data" >
        @csrf
    <br>
        <label for="">Kelas</label>
        <br>
        <select name="kelas_id">
            @foreach ($clases as $clas )
            <option {{ $clas->id== $datauser->class_id ? 'selected' : '' }} value="{{ $clas->id }}">{{ $clas->name }}</option>
            @endforeach
    </select><br>
    @error('kelas_id')
        <small style="color:red">{{ $message }}</smalll>
    @enderror

    </div>
    </br>
    <div>
        <label for="">Name</label>
        <br>
        <input type="text" name="name" value="{{ $datauser->name }}"><br>
        @error('name')
        <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
    <br>
    <div>
        <label for="">Nisn</label>
        <br>
        <input type="text" name="nisn" value="{{ $datauser->nisn }}"><br>
        @error('nisn')
        <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
    <br>
    <div>
        <label for="">Alamat</label>
        <br>
        <input type="text" name="alamat" value="{{ $datauser->alamat }}"><br>
        @error('alamat')
        <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
    <br>
    <div>
        <label for="">Email</label>
        <br>
        <input type="text" name="email" value="{{ $datauser->email }}"><br>
        @error('email')
        <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
    <br>
    <div>
        <label for="">Password</label>
        <br>
        <input type="password" name="password" ><br>
        <small style= color:green>Abaikan jika ingin tidak di ubah</small><br>
        @error('password')
        <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
    <br>
    <div>
        <label for="">No Handphone</label>
        <br>
        <input type="text" name="no_handphone" value="{{ $datauser->no_handphone }}"><br>
        @error('no_handphone')
        <small style="color:red">{{ $message }}</small>
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
    </body>
    </html>
