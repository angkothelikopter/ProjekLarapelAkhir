@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Edit Barang</h4>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Laboratorium</label>
        <select name="laboratory_id" class="form-select" required>
            @foreach($labs as $lab)
                <option value="{{ $lab->id }}" 
                    {{ $lab->id == $item->laboratory_id ? 'selected' : '' }}>
                    {{ $lab->nama_lab }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ $item->kode_barang }}" 
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" 
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" value="{{ $item->kategori }}" 
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" 
               value="{{ $item->tanggal_masuk }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="number" name="jumlah" value="{{ $item->jumlah }}" 
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="tersedia" {{ $item->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="rusak" {{ $item->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
            <option value="hilang" {{ $item->status == 'hilang' ? 'selected' : '' }}>Hilang</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3">{{ $item->keterangan }}</textarea>
    </div>

    <button class="btn btn-success">Perbarui</button>
</form>
@endsection
