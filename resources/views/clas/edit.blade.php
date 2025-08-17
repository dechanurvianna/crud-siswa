<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        <h1>Edit Kelas</h1>
        <form action="/clas/update/{{$dataclas->id}}" method="post" >
            @csrf
            <br>

           <div>
         <label for="">Name</label>
         <br>
         <input type="text" name="name"><br>
         @error('name')
             <email style="color:red">{{ $message }}</email>
         @enderror
            </div>

            <div>
                <label for="description">Deskripsi:</label><br>
                <textarea id="description" name="description">{{ old('description', $dataclas->description)}}</textarea><br>
                  @error('description')
                <email style="color:red">{{ $message }}</email>
                @enderror

            </div>
            <button type="submit">Update</button>
        <a href="{{ url('/clas') }}">Kembali</a>
         </form>
    </div>
</body>
</html>


