@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Guru</h1>

    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4 form-group">
            <label for="nuptk" class="block text-gray-700">NUPTK</label>
            <input type="text" name="nuptk" id="nuptk" class="w-full border border-gray-300 p-2 rounded" value="{{ old('nuptk') }}">
            @error('nuptk')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="w-full border border-gray-300 p-2 rounded">
            @error('image')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="nama" class="block text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full border border-gray-300 p-2 rounded" value="{{ old('nama') }}">
            @error('nama')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Pilih</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="agama" class="block text-gray-700">Agama</label>
            <input type="text" name="agama" id="agama" class="w-full border border-gray-300 p-2 rounded" value="{{ old('agama') }}">
            @error('agama')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="id_mapel" class="block text-gray-700">Mapel</label>
            <select name="id_mapel" id="id_mapel" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Pilih Mapel</option>
                @foreach($mapel as $m)
                    <option value="{{ $m->id_mapel }}" {{ old('id_mapel') == $m->id_mapel ? 'selected' : '' }}>{{ $m->mapel }}</option>
                @endforeach
            </select>
            @error('id_mapel')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="id_kelas" class="block text-gray-700">Kelas</label>
            <select name="id_kelas" id="id_kelas" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Pilih Kelas</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}" {{ old('id_kelas') == $k->id_kelas ? 'selected' : '' }}>{{ $k->kelas }}</option>
                @endforeach
            </select>
            @error('id_kelas')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="id_jurusan" class="block text-gray-700">Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Pilih Jurusan</option>
                @foreach($jurusan as $j)
                    <option value="{{ $j->id_jurusan }}" {{ old('id_jurusan') == $j->id_jurusan ? 'selected' : '' }}>{{ $j->jurusan }}</option>
                @endforeach
            </select>
            @error('id_jurusan')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="phone" class="block text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full border border-gray-300 p-2 rounded" value="{{ old('phone') }}">
            @error('phone')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-group">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
