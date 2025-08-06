<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use App\Models\Class;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }
    public function create() {
        $clases = Clas::all();
        return view('siswa.create', compact('clases'));
    }

    //fungsi store data siswa
    public function store(Request $request){
    //validasi data
        $request->validate([
            'name'         =>'required',
            'nisn'         =>'required | unique:users,nisn',
            'alamat'       =>'required',
            'email'        =>'required | unique:users,email',
            'password'     =>'required',
            'no_handphone' =>'required | unique:users,no_handphone',

        ]);

        //siapa data yang akan di masukan
         $datasiswa_store =[
            'clas_id' =>$request-> kelas_id,
            'name' =>$request-> name,
            'nisn' =>$request-> nisn,
            'alamat' =>$request-> alamat,
            'email' =>$request-> email,
            'password' =>$request-> password,
            'no_handphone' =>$request-> no_handphone,
         ];

        $datasiswa_store['photo'] = $request->file('photo')->store('profilesiswa', 'public');

         // masukan data ke dalam tabel user
        User::create($datasiswa_store);
        // arahkan user ke halaman beranda
         return redirect('/');

    }
}
