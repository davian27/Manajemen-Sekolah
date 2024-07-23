@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<body class="bg-slate-200">
<div class="container">

 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold">Edit Data Siswa</div>
            <div class="card-body">

                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}">
                        @error('nis')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="">Agama</option>
                                <option value="Islam" {{ old('agama', $siswa->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama', $siswa->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            </select>
                        @error('agama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Masukkan no hp anda">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email anda">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_kelas" class="form-label">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id_kelas }}" {{ $siswa->id_kelas == $k->id_kelas ? 'selected' : '' }}>{{ $k->kelas }}</option>
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
                                <option value="{{ $j->id_jurusan }}" {{ $siswa->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>{{ $j->jurusan }}</option>
                            @endforeach
                        </select>
                        @error('id_jurusan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_organisasi" class="form-label">Organisasi</label>
                        <select name="id_organisasi" id="id_organisasi" class="form-control">
                            <option value="">Pilih Organisasi (Optional)</option>
                            @foreach($organisasi as $o)
                                <option value="{{ $o->id_organisasi }}" {{ $siswa->id_organisasi == $o->id_organisasi ? 'selected' : '' }}>{{ $o->organisasi }}</option>
                            @endforeach
                        </select>
                        @error('id_organisasi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_ekskul" class="form-label">Ekskul</label>
                        <select name="id_ekskul" id="id_ekskul" class="form-control">
                            <option value="">Pilih Ekskul (Optional)</option>
                            @foreach($ekskul as $e)
                                <option value="{{ $e->id_ekskul }}" {{ $siswa->id_ekskul == $e->id_ekskul ? 'selected' : '' }}>{{ $e->ekskul }}</option>
                            @endforeach
                        </select>
                        @error('id_ekskul')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ $siswa->alamat }}</textarea>
                        @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('siswa.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        </div>
 </div>
</div>
@endsection
</body>
