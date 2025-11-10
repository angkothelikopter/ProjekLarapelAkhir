@extends('layouts.app')
@section('content')
<h4>Tambah Laboratorium</h4>

<form action="{{ route('laboratories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('partials.errors')

    <input name="nama_lab" class="form-control mb-2" placeholder="Nama Laboratorium" required>
    <input name="lokasi" class="form-control mb-2" placeholder="Lokasi" required>
    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>
    
    <input name="penanggung_jawab" class="form-control mb-2" placeholder="Penanggung Jawab" required>
    <label>Foto Penanggung Jawab:</label>
    <input type="file" name="foto_penanggung_jawab" class="form-control mb-3" accept="image/*">

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
