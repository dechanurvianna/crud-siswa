@extends('layouts.app')
@section('title')
    <title>Show Clas</title>
@endsection
@section('content')
    <h1>Detail Kelas</h1>

    {{-- Nama kelas --}}
    <h3>{{ $dataclas->name }}</h3>

    {{-- Deskripsi kelas --}}
    <p>{{ $dataclas->description ?? 'Tidak ada deskripsi' }}</p>

    {{-- Tombol kembali --}}
    <a href="{{ url('/clas') }}">Kembali</a>
@endsection
