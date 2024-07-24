<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::with(['mapel', 'kelas', 'jurusan'])->where('nama',"LIKE", "%$request->key%")
        ->orWhereRaw('nuptk LIKE?',['%'.$request->key.'%'])
        ->simplePaginate(3);;
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('guru.index', compact('guru', 'mapel', 'kelas', 'jurusan'));
    }

    public function create()
    {
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('guru.create', compact('mapel', 'kelas', 'jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nuptk' => ['required', 'unique:guru,nuptk', 'regex:/^[a-zA-Z0-9]+$/'],
            'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'phone' => 'nullable',
            'email' => 'nullable',
            'id_mapel' => 'required|exists:tb_mapel,id_mapel',
            'id_kelas' => 'required|exists:tb_kelas,id_kelas',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Handle image upload and storage
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Guru::create($data);

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
            'nuptk' => ['required', 'unique:guru,nuptk,' . $id, 'regex:/^[a-zA-Z0-9]+$/'],
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

        $guru = Guru::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($guru->image) {
                // Delete old image if it exists
                Storage::delete('public/' . $guru->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('status', 'Data guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        if ($guru->image) {
            Storage::delete('public/' . $guru->image);
        }
        $guru->delete();

        return redirect()->route('guru.index')->with('status', 'Data guru berhasil dihapus!');
    }
}
