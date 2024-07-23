@extends('layouts.app')

@section('title', 'Data Organisasi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header bg-primary text-white fw-bold">Data Organisasi</div>
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

                    <a href="{{ route('organisasi.create') }}" class="btn btn-success m-3">Tambah organisasi</a>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>organisasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            ?>

                            @foreach($organisasi as $k)
                            <tr>
                                <td class="text-center col-md-1">{{ $no++ }}</td>
                                <td class="col-md-7">{{ $k->organisasi }}</td>
                                <td class="text-center col-md-2">
                                    <a href="{{ route('organisasi.edit', $k->id_organisasi) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('organisasi.destroy', $k->id_organisasi) }}" method="POST" class="d-inline">
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
