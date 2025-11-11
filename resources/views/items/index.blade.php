@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Barang</h4>
    <a href="{{ route('items.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

{{-- tampilkan pesan sukses jika ada --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Lab</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Masuk</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->laboratory->nama_lab ?? '-' }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>
                @if ($item->status == 'tersedia')
                    <span class="badge bg-success">Tersedia</span>
                @elseif ($item->status == 'rusak')
                    <span class="badge bg-warning text-dark">Rusak</span>
                @elseif ($item->status == 'hilang')
                    <span class="badge bg-danger">Hilang</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($item->status) }}</span>
                @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d/m/Y') }}</td>
            <td>{{ $item->keterangan ?: '-' }}</td>
            <td>
                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center text-muted">Belum ada data barang.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- pagination --}}
<div class="mt-3">
    {{ $items->links() }}
</div>
@endsection
