@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Barang</h4>
    <a href="{{ route('items.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th><th>Nama</th><th>Lab</th><th>Status</th><th>Masuk</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->laboratory->nama_lab }}</td>
            <td>{{ ucfirst($item->status) }}</td>
            <td>{{ $item->tanggal_masuk }}</td>
            <td>
                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $items->links() }}
@endsection
