<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use App\Models\Class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index() {
        $siswas = User::with('clas')->get();
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
    //fungsi delete siswa
    public function destroy($id){
    //cari user di dalam database berdasarkan id yang di kirimkan
    $datauser = user::find($id);

    //lakukan delete pada data tersebut jika data user tersebut ada
    if($datauser != null) {
        Storage::disk('public')->delete($datauser->photo);
        $datauser->delete();
    }

    //kemblikan user ke halaman beranda / home
    return redirect('/');
    }

    // fungsi untuk detail siswa
    public function show($id){
        // cari data siswa di dalam tabel user dengan id yang di kirimkan
        $datauser = User::find($id);

        //cek apakah datanya ada tau tidak
        if($datauser ==null) {
            return redirect('/');
        }

        // pindah user ke halaman detail siswa dengan mengerjakan data detailnya
        return view('siswa.show', compact('datauser'));
    }

    // fungsi untuk mengarahkan user ke halaman edit siswa
    public function edit($id){

        // siapkan data clas dan tampung datanya
        $clases = Clas::all();

        // ambil data user berdasarkan id yang
        $datauser =User::find($id);
        if($datauser==null){
            return redirect('/');
        }
        return view('siswa.edit', compact('datauser', 'clases'));
    }
    // fungsi update data siswa
    public function update(Request $request, $id){
        // validasi data
        $request->validate([
            'name'         =>'required',
            'nisn'         =>'required',
            'alamat'       =>'required',
            'email'        =>'required',
            'no_handphone' =>'required ',
        ]);

        // siapkan data yang akan di update : cari data siswa / user di database berdasarkan id
        $datauser = User::find($id);

        // menyiapkan data yang akan di update ke dalam tabel siswa / user
         $datasiswa_update =[
            'clas_id'       =>$request-> kelas_id,
            'name'          =>$request-> name,
            'nisn'          =>$request-> nisn,
            'alamat'        =>$request-> alamat,
            'email'         =>$request-> email,
            'no_handphone'  =>$request-> no_handphone,
         ];

         // cek apakah user merubah password atau tidak
         if ($request->password !=null) {
            $datasiswa_update['password'] = $request->password;
         }

        // cek apakah user mengubah gambar atau tidak
                if ($request->hasFile('photo')) {
        // hapus gambar lama kalau ada
                if ($datauser->photo) {
                Storage::disk('public')->delete($datauser->photo);
         }
        // upload gambar baru
                $datasiswa_update['photo'] = $request->file('photo')->store('profilesiswa', 'public');
        }

        // update data sesuai data siswa / user yang sudah di siapkan
        $datauser->update($datasiswa_update);

        // kembalikan user ke halaman index
        return redirect('/');
    }

}



