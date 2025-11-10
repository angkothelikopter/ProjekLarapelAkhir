@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang</h2>

    {{-- tampilkan error validasi --}}
    @include('partials.errors')

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" 
                   class="form-control" value="{{ old('kode_barang', $item->kode_barang) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" 
                   class="form-control" value="{{ old('nama_barang', $item->nama_barang) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori / Jenis Barang</label>
            <input type="text" name="kategori" id="kategori" 
                   class="form-control" value="{{ old('kategori', $item->kategori) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Barang</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Tersedia" {{ old('status', $item->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Rusak" {{ old('status', $item->status) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="Hilang" {{ old('status', $item->status) == 'Hilang' ? 'selected' : '' }}>Hilang</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="laboratory_id" class="form-label">Laboratorium</label>
            <select name="laboratory_id" id="laboratory_id" class="form-select" required>
                <option value="">-- Pilih Laboratorium --</option>
                @foreach($laboratories as $lab)
                    <option value="{{ $lab->id }}" 
                        {{ old('laboratory_id', $item->laboratory_id) == $lab->id ? 'selected' : '' }}>
                        {{ $lab->nama_lab }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" 
                   class="form-control" value="{{ old('tanggal_masuk', $item->tanggal_masuk) }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ old('keterangan', $item->keterangan) }}</textarea>
        </div>

        {{-- jika kamu sudah menambahkan kolom gambar --}}
        @if($item->image)
        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini:</label><br>
            <img src="{{ asset('storage/'.$item->image) }}" alt="Gambar Barang" class="img-thumbnail" width="150">
        </div>
        @endif

        

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
