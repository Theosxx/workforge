@extends('layouts.app')

@section('content')
<form action="{{ route('lowongan.update', $lowongan->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Nama Perusahaan:</label>
        <input type="text" class="input" name="nama_perusahaan" value="{{ $lowongan->nama_perusahaan }}" required>
    </div>
    <div>
        <label>Posisi:</label>
        <input type="text" class="input" name="posisi" value="{{ $lowongan->posisi }}" required>
    </div>
    <div>
        <label>Gaji Minimal:</label>
        <input type="number" class="input" name="gaji_minimal" value="{{ $lowongan->gaji_minimal }}" required>
    </div>
    <div>
        <label>Gaji Maksimal:</label>
        <input type="number" class="input" name="gaji_maksimal" value="{{ $lowongan->gaji_maksimal }}" required>
    </div>
    <div>
        <label>Lokasi:</label>
        <input type="text" class="input" name="lokasi" value="{{ $lowongan->lokasi }}" required>
    </div>
    <div>
        <label>Foto:</label>
        <input type="file" class="input" name="foto" value="{{ $lowongan->foto }}" required>
    </div>
    <div>
        <label>Tipe Pekerjaan:</label>
        <input type="text" class="input" name="tipe_pekerjaan" value="{{ $lowongan->tipe_pekerjaan }}" required>
    </div>
    <div>
        <label>Deskripsi:</label>
        <textarea name="deskripsi" class="input" required>{{ $lowongan->deskripsi }}</textarea>
    </div>
    <button type="submit" class="btn btn-simpan">Perbarui</button>
</form>
@endsection
