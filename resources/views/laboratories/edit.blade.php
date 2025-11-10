@extends('layouts.app')
@section('content')
<h4>Edit Laboratorium</h4>

<form action="{{ route('laboratories.update', $laboratory) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('partials.errors')

    <input name="nama_lab" class="form-control mb-2" value="{{ $laboratory->nama_lab }}" required>
    <input name="lokasi" class="form-control mb-2" value="{{ $laboratory->lokasi }}" required>
    <textarea name="deskripsi" class="form-control mb-2">{{ $laboratory->deskripsi }}</textarea>

    <input name="penanggung_jawab" class="form-control mb-2" value="{{ $laboratory->penanggung_jawab }}" required>
    
    <label>Foto Penanggung Jawab:</label>
    <input type="file" name="foto_penanggung_jawab" class="form-control mb-2" accept="image/*">
    @if($laboratory->foto_penanggung_jawab)
        <img src="{{ asset('storage/'.$laboratory->foto_penanggung_jawab) }}" width="100" class="mb-2">
    @endif

    <button class="btn btn-success">Update</button>
</form>
@endsection
