<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|integer|unique:tb_kelas,kelas|max:25',
        ], [
            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.integer' => 'Kelas harus berupa angka.',
            'kelas.unique' => 'Kelas sudah terdaftar.',
            'kelas.max' => 'Kelas maksimal 25 karakter.',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('status', 'Data Kelas berhasil disimpan!');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required|integer|unique:tb_kelas,kelas,' . $id . ',id_kelas|max:25',
        ], [
            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.integer' => 'Kelas harus berupa angka.',
            'kelas.unique' => 'Kelas sudah terdaftar.',
            'kelas.max' => 'Kelas maksimal 25 karakter.',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('kelas.index')->with('status', 'Data Kelas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        // Check if the class is linked to any students
        if ($kelas->siswa()->exists()) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak dapat dihapus karena masih terhubung dengan data siswa.');
        }

        // Proceed with deletion if no students are linked
        $kelas->delete();

        return redirect()->route('kelas.index')->with('status', 'Data Kelas berhasil dihapus!');
    }
}
