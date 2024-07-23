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


            <?php
            $no = 1;
            ?>

            <a href="{{ route('siswa.create') }}" class="btn btn-success m-3"><i class="fa-solid fa-user-plus"></i>&nbsp;Tambah Data</a>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Foto</th>
                    <th class="col-lg-2">Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>No hp</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Organisasi</th>
                    <th>Ekskul</th>
                    <th>Alamat</th>
                    <th class="text-center col-lg-1">Action</th>
                </tr>
                @foreach($siswa as $s)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>
                        @if($s->image)
                            <img src="{{ assets('images/' . $s->image) }}" width="100px">
                        @endif
                    </td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                    <td>{{ $s->agama }}</td>
                    <td>{{ $s->phone }}</td>
                    <td>{{ $s->email }}</td>
                    <td>{{ $s->kelas->kelas }}</td>
                    <td>{{ $s->jurusan->jurusan }}</td>
                    <td>{{ $s->organisasi->organisasi ?? '' }}</td>
                    <td>{{ $s->ekskul->ekskul ?? '' }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td class="text-center">
                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm text-black"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
</body>



