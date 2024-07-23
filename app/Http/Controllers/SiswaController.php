<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Organisasi;
use App\Models\Ekskul;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['kelas', 'jurusan', 'organisasi', 'ekskul'])->get();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $organisasi = Organisasi::all();
        $ekskul = Ekskul::all();
        return view('siswa.index', compact('siswa', 'kelas', 'jurusan', 'organisasi', 'ekskul'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $organisasi = Organisasi::all();
        $ekskul = Ekskul::all();
        return view('siswa.create', compact('kelas', 'jurusan', 'organisasi', 'ekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => ['required', 'unique:siswa,nis', 'regex:/^[a-zA-Z0-9]+$/'],
            'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'phone' => 'nullable',
            'email' => 'nullable',
            'id_kelas' => 'required|exists:tb_kelas,id_kelas',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
            'id_organisasi' => 'nullable|exists:tb_organisasi,id_organisasi',
            'id_ekskul' => 'nullable|exists:tb_ekskul,id_ekskul',
            'alamat' => 'required|string|max:500',
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
            'id_organisasi.exists' => 'Organisasi tidak valid.',
            'id_ekskul.exists' => 'Ekskul tidak valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('status', 'Data siswa berhasil disimpan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $organisasi = Organisasi::all();
        $ekskul = Ekskul::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan', 'organisasi', 'ekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => ['required', 'unique:siswa,nis,' . $id, 'regex:/^[a-zA-Z0-9]+$/'],
        'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'phone' => 'nullable',
            'email' => 'nullable',
            'id_kelas' => 'required|exists:tb_kelas,id_kelas',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
            'id_organisasi' => 'nullable|exists:tb_organisasi,id_organisasi',
            'id_ekskul' => 'nullable|exists:tb_ekskul,id_ekskul',
            'alamat' => 'required|string|max:500',
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
            'id_organisasi.exists' => 'Organisasi tidak valid.',
            'id_ekskul.exists' => 'Ekskul tidak valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('status', 'Data siswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect()->route('siswa.index')->with('status', 'Data siswa berhasil dihapus!');
    }
}
