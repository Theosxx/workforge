@extends('layouts.app')

@section('content')

<div>
    <a href="{{ route('lowongan.create') }}" class="btn btn-tambah">Tambah Lowongan</a>
    <a href="{{ route('lowongan.print') }}" class="btn btn-tambah">Cetak PDF</a>
    <table style="margin-top: 20px;" class="table-data">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>
                <th>Gaji</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lowongans as $lowongan)
                <tr>
                    <td>
                    @if($lowongan->foto && file_exists(public_path('storage/' . $lowongan->foto)))
                            <img src="{{ asset('storage/' . $lowongan->foto) }}" alt="Foto" style="width: 100px; height: auto;">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                 </td>
                    <td>{{ $lowongan->nama_perusahaan }}</td>
                    <td>{{ $lowongan->posisi }}</td>
                    <td>{{ $lowongan->gaji_minimal }} - {{ $lowongan->gaji_maksimal }}</td>
                    <td>{{ $lowongan->lokasi }}</td>
                    <td>
                        <a href="{{ route('lowongan.edit', $lowongan->id) }}">Edit</a>
                        <form action="{{ route('lowongan.destroy', $lowongan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
