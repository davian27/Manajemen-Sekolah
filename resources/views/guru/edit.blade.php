@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<body class="bg-slate-200">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow bg-slate-600/50">
                <div class="card-header bg-indigo-600/40 text-white fw-bold">Edit Data Guru</div>
                <div class="card-body">
                    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nuptk" class="form-label text-white">NUPTK</label>
                            <input type="text" name="nuptk" id="nuptk" class="form-control" value="{{ old('nuptk', $guru->nuptk) }}">
                            @error('nuptk')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label text-white">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $guru->nama) }}">
                            @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label text-white">Foto</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if($guru->image)
                                <img src="{{ asset('storage/' . $guru->image) }}" alt="{{ $guru->nama }}" class="img-fluid mt-2" style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label text-white">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label text-white">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" {{ old('agama', $guru->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama', $guru->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Hindu" {{ old('agama', $guru->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama', $guru->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama', $guru->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                <option value="Katholik" {{ old('agama', $guru->agama) == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                            </select>
                            @error('agama')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-white">No HP</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $guru->phone) }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $guru->email) }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_mapel" class="form-label text-white">Mengajar Mapel</label>
                            <select name="id_mapel" id="id_mapel" class="form-control">
                                <option value="">Pilih Mapel</option>
                                @foreach($mapel as $m)
                                    <option value="{{ $m->id_mapel }}" {{ old('id_mapel', $guru->id_mapel) == $m->id_mapel ? 'selected' : '' }}>{{ $m->mapel }}</option>
                                @endforeach
                            </select>
                            @error('id_mapel')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_kelas" class="form-label text-white">Mengajar Kelas</label>
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id_kelas }}" {{ old('id_kelas', $guru->id_kelas) == $k->id_kelas ? 'selected' : '' }}>{{ $k->kelas }}</option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_jurusan" class="form-label text-white">Mengajar Jurusan</label>
                            <select name="id_jurusan" id="id_jurusan" class="form-control">
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id_jurusan }}" {{ old('id_jurusan', $guru->id_jurusan) == $j->id_jurusan ? 'selected' : '' }}>{{ $j->jurusan }}</option>
                                @endforeach
                            </select>
                            @error('id_jurusan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{ route('guru.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
