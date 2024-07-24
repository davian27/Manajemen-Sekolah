@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

<body class="bg-slate-200">
    <div class="container">
        {{-- card --}}
        <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold">Data Siswa</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class=" d-flex">
                    <a href="{{ route('siswa.create') }}" class="btn btn-success m-3">
                        <i class="fa-solid fa-user-plus"></i>&nbsp;Tambah Data
                    </a>
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary m-3">
                        <i class="fa-solid fa-refresh"></i>&nbsp;Refresh
                    </a>
                    <div class="d-flex justify-content-end ml-96">
                        <form action="{{ route('siswa.index') }}" method="get" class="d-flex">
                            @csrf
                            <input class="form-control col-md-8 h-10 ml-36" type="text" name="key" placeholder="Cari Siswa">
                            <button class="btn btn-primary btn-sm ml-2 col-md-5 h-10" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="my-2 mb-3 ">
                    <hr class="mb-3 border-t-4 border-gray-500">
                    {{ $siswa->links() }}
                </div>
                @if($message)
                <p>{{ $message }}</p>
                @endif

                @foreach($siswa as $s)
                <div class="card mb-3 mt-3 border-0">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->nama }}" class="img-fluid rounded-start" style="width: 370px; height: 370px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $s->nama }}</h5>
                                <hr class="col-md-2 mb-2">
                                <p class="card-text"><strong>NIS:</strong> {{ $s->nis }}</p>
                                <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $s->jenis_kelamin }}</p>
                                <p class="card-text"><strong>Agama:</strong> {{ $s->agama }}</p>
                                <p class="card-text"><strong>No HP:</strong> {{ $s->phone }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $s->email }}</p>
                                <p class="card-text"><strong>Kelas:</strong> {{ $s->kelas->kelas }}</p>
                                <p class="card-text"><strong>Jurusan:</strong> {{ $s->jurusan->jurusan }}</p>
                                <p class="card-text"><strong>Organisasi:</strong> {{ $s->organisasi->organisasi ?? 'N/A' }}</p>
                                <p class="card-text"><strong>Ekskul:</strong> {{ $s->ekskul->ekskul ?? 'N/A' }}</p>
                                <p class="card-text"><strong>Alamat:</strong> {{ $s->alamat }}</p>
                                <div class="d-flex mt-4">
                                    <div style="display:inline;">
                                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm text-black">
                                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit
                                        </a>
                                    </div>
                                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-5" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fa-solid fa-trash"></i>&nbsp;Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="mt-3">
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection

</body>