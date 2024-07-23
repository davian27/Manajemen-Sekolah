@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Guru</h1>

    @if(session('status'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('guru.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Guru</a>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">NUPTK</th>
                <th class="py-2">Nama</th>
                <th class="py-2">Jenis Kelamin</th>
                <th class="py-2">Agama</th>
                <th class="py-2">Mapel</th>
                <th class="py-2">Kelas</th>
                <th class="py-2">Jurusan</th>
                <th class="py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $g)
                <tr>
                    <td class="py-2">{{ $g->nuptk }}</td>
                    <td class="py-2">{{ $g->nama }}</td>
                    <td class="py-2">{{ $g->jenis_kelamin }}</td>
                    <td class="py-2">{{ $g->agama }}</td>
                    <td class="py-2">{{ $g->mapel->nama_mapel }}</td>
                    <td class="py-2">{{ $g->kelas->nama_kelas }}</td>
                    <td class="py-2">{{ $g->jurusan->nama_jurusan }}</td>
                    <td class="py-2">
                        <a href="{{ route('guru.edit', $g->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
