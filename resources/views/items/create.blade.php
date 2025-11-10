@extends('layouts.app')
@section('content')
<h4>Tambah Barang</h4>
<form action="{{ route('items.store') }}" method="POST">@csrf
    <div class="mb-2">
        <label>Laboratorium</label>
        <select name="laboratory_id" class="form-select">
            @foreach($labs as $lab)
                <option value="{{ $lab->id }}">{{ $lab->nama_lab }}</option>
            @endforeach
        </select>
    </div>
    <input name="kode_barang" class="form-control mb-2" placeholder="Kode Barang" required>
    <input name="nama_barang" class="form-control mb-2" placeholder="Nama Barang"required>
    <input name="kategori" class="form-control mb-2" placeholder="Kategori"required>
    <input type="date" name="tanggal_masuk" class="form-control mb-2"required>
    <input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah"required>
    <select name="status" class="form-select mb-2">
        <option value="tersedia">Tersedia</option>
        <option value="rusak">Rusak</option>
        <option value="hilang">Hilang</option>
    </select>
    <textarea name="keterangan" class="form-control mb-2" placeholder="Keterangan"></textarea>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
