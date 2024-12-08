@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('tips.create') }}" class="btn btn-primary">Tambah Tips</a>
    <a href="{{ route('tips.print') }}" class="btn btn-tambah">Cetak PDF</a>
    <table style="margin-top: 20px;" class="table-data">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Tips Loker</th>
                <th>Done Work</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tips as $tip)
                <tr>
                    <td>
                        @if($tip->foto && file_exists(public_path('storage/' . $tip->foto)))
                            <img src="{{ asset('storage/' . $tip->foto) }}" alt="Foto" style="width: 100px; height: auto;">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                    </td>
                    <td>{{ $tip->nama }}</td>
                    <td>{{ $tip->tips_loker }}</td>
                    <td>{{ $tip->done_work }}</td>
                    <td>
                        <a href="{{ route('tips.edit', $tip->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tips.destroy', $tip->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
