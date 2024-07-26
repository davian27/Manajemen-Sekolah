@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
<body class="bg-slate-200">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow bg-slate-600/50">
                <div class="card-header bg-indigo-600/40 text-white fw-bold">Data Kelas</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <a href="{{ route('kelas.create') }}" class="btn btn-success m-3">Tambah Kelas</a>
                    <table class="table table-bordered table-dark table-striped table-hover ">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kelas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            ?>

                            @foreach($kelas as $k)
                            <tr>
                                <td class="text-center col-md-1">{{ $no++ }}</td>
                                <td class="col-md-7">{{ $k->kelas }}</td>
                                <td class="text-center col-md-2">
                                    <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('kelas.destroy', $k->id_kelas) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
