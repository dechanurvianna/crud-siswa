<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class ClasController extends Controller
{
    public function index()
    {
        $clases = Clas::all();
        return view('clas.index', compact('clases'));
    }

    public function create()
    {
        return view('clas.create');
    }

    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'name'         => 'required|unique:clases,name',
            'description'  => 'required',
        ]);

        Clas::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('clas.index');
    }

    public function destroy($id)
    {
        $dataclas = Clas::find($id);

        if ($dataclas) {
            $dataclas->delete();
        }

         return redirect()->route('clas.index')->with('success', 'Kelas berhasil dihapus');
    }

    public function show($id)
    {
        // Cari kelas
        $dataclas = Clas::findOrFail($id);

        // Ambil semua siswa di kelas ini
        $datauser = User::where('clas_id', $id)->get();

        // Kirim ke view
        return view('clas.show', compact('dataclas', 'datauser'));
    }

    public function edit($id)
    {
        $dataclas = Clas::find($id);
        if (!$dataclas) {
            return redirect()->route('clas.index');
        }
        return view('clas.edit', compact('dataclas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
        ]);

        $dataclas = Clas::findOrFail($id);

        $dataclas->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('clas.index');
    }
}
