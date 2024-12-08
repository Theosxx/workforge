@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('tips.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="input" required>
        </div>
        <div class="mb-3">
            <label for="tips_loker" class="form-label">Tips Loker</label>
            <textarea name="tips_loker" id="tips_loker" class="input" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="done_work" class="form-label">Done Work</label>
            <textarea name="done_work" id="done_work" class="input" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="input">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
