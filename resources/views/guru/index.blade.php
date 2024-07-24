@extends('layouts.app')

@section('title','Data Guru')

@section('content')

<body class="bg-slate-200">
    <div class="container">
        {{-- card --}}
        <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold">Data Guru</div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <?php $no = 1; ?>

                <a href="{{ route('guru.create') }}" class="btn btn-success m-3">
                    <i class="fa-solid fa-user-plus"></i>&nbsp;Tambah Data
                </a>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nuptk</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Mapel</th>
                            <th class="text-center col-lg-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $g)
                        <tr>
                            <td>{{ $g->nuptk }}</td>
                            <td>{{ $g->nama }}</td>
                            <td><img width="100px" height="100px" src="{{ asset('storage/'. $g->image) }}" alt="{{ $g->nama }}" class="img-fluid"></td>
                            <td>{{ $g->jenis_kelamin }}</td>
                            <td>{{ $g->phone }}</td>
                            <td>{{ $g->email }}</td>
                            <td>{{ $g->kelas->kelas }}</td>
                            <td>{{ $g->jurusan->jurusan }}</td>
                            <td>{{ $g->mapel->mapel }}</td>
                            <td class="text-center">
                                <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm text-black">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

@endsection
