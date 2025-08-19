@extends('layouts.app')
@section('title')
    <title>Edit Clas</title>
@endsection
@section('content')
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
@endsection


