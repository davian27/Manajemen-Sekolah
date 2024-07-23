<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with(['mapel','kelas', 'jurusan'])->get();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('guru.index', compact('guru', 'kelas', 'jurusan'));
    }

    public function create()
    {
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('guru.create', compact('mapel','kelas', 'jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nuptk' => ['required', 'unique:guru,nuptk', 'regex:/^[a-zA-Z0-9]+$/'],
            'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'phone' => 'nullable',
            'email' => 'nullable',
            'id_mapel' => 'required|exists:tb_mapel,id_mapel',
            'id_kelas' => 'required|exists:tb_kelas,id_kelas',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
        ], [
            'nuptk.required' => 'Nuptk wajib diisi.',
            'nuptk.unique' => 'Nuptk sudah terdaftar.',
            'nuptk.regex' => 'Nuptk hanya boleh berisi huruf dan angka.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'nama.regex' => 'Nama hanya boleh berisi huruf.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'agama.required' => 'Agama wajib diisi.',
            'agama.string' => 'Agama harus berupa teks.',
            'agama.max' => 'Agama maksimal 255 karakter.',
            'id_mapel.required' => 'Mapel wajib diisi.',
            'id_mapel.exists' => 'Mapel tidak valid.',
            'id_kelas.required' => 'Kelas wajib diisi.',
            'id_kelas.exists' => 'Kelas tidak valid.',
            'id_jurusan.required' => 'Jurusan wajib diisi.',
            'id_jurusan.exists' => 'Jurusan tidak valid.',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('status', 'Data guru berhasil disimpan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('guru.edit', compact('guru', 'mapel', 'kelas', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nuptk' => ['required', 'unique:siswa,nuptk,' . $id, 'regex:/^[a-zA-Z0-9]+$/'],
        'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'phone' => 'nullable',
            'email' => 'nullable',
            'id_kelas' => 'required|exists:tb_kelas,id_kelas',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
            'id_mapel' => 'required|exists:tb_mapel,id_mapel',
        ], [
            'nis.required' => 'NIS wajib diisi.',
            'nis.unique' => 'NIS sudah terdaftar.',
            'nis.regex' => 'NIS hanya boleh berisi huruf dan angka.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'nama.regex' => 'Nama hanya boleh berisi huruf.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'agama.required' => 'Agama wajib diisi.',
            'agama.string' => 'Agama harus berupa teks.',
            'agama.max' => 'Agama maksimal 255 karakter.',
            'id_kelas.required' => 'Kelas wajib diisi.',
            'id_kelas.exists' => 'Kelas tidak valid.',
            'id_jurusan.required' => 'Jurusan wajib diisi.',
            'id_jurusan.exists' => 'Jurusan tidak valid.',
            'id_mapel.required' => 'Mapel wajib diisi.',
            'id_mapel.exists' => 'Mapel tidak valid.',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('status', 'Data guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();

        return redirect()->route('guru.index')->with('status', 'Data guru berhasil dihapus!');
    }
}
