@extends('layouts.app')

@section('title', 'Data mapel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white fw-bold">Tambah mapel</div>
                <div class="card-body">
                    <form action="{{ route('mapel.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="mapel" class="form-label">mapel</label>
                            <input type="text" name="mapel" id="mapel" class="form-control" value="{{ old('mapel') }}">
                            @error('mapel')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{ route('mapel.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                @endsection
                </div>
            </div>
        </div>
    </div>

