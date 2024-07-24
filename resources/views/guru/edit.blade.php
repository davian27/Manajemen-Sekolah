@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<body class="bg-slate-200">
<div class="container">

 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold">Edit Data Guru</div>
            <div class="card-body">

                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="text" name="nuptk" id="nuptk" class="form-control" value="{{ old('nuptk', $guru->nuptk) }}">
                        @error('nuptk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $guru->nama) }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
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
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama', $guru->agama) }}">
                        @error('agama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_mapel" class="form-label">Mapel</label>
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
                        <label for="id_kelas" class="form-label">Kelas</label>
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
                        <label for="id_jurusan" class="form-label">Jurusan</label>
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
