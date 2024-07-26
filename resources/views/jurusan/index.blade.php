@extends('layouts.app')

@section('title', 'Data Jurusan')

@section('content')
<body class="bg-slate-200">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow bg-slate-600/50">
                <div class="card-header bg-indigo-600/40 text-white fw-bold">Data Jurusan</div>
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

                    <a href="{{ route('jurusan.create') }}" class="btn btn-success m-3">Tambah Jurusan</a>
                    <table class="table table-bordered table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Jurusan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            ?>

                            @foreach($jurusan as $j)
                            <tr>
                                <td class="text-center col-md-1">{{ $no++ }}</td>
                                <td class="col-md-7">{{ $j->jurusan }}</td>
                                <td class="text-center col-md-2">
                                    <a href="{{ route('jurusan.edit', $j->id_jurusan) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('jurusan.destroy', $j->id_jurusan) }}" method="POST" class="d-inline">
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
