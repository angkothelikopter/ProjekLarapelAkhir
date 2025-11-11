@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Laboratorium</h4>
    <a href="{{ route('laboratories.create') }}" class="btn btn-primary">+ Tambah Lab</a>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
        <th>Nama Lab</th>
        <th>Lokasi</th>
        <th>Penanggung Jawab</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($labs as $lab)
    <tr>
        <td>{{ $lab->nama_lab }}</td>
        <td>{{ $lab->lokasi }}</td>
        <td>{{ $lab->penanggung_jawab }}</td>
        <td>{{ $lab->deskripsi ?? '-' }}</td> {{-- Tambahan kolom deskripsi --}}
        <td>
            @if($lab->foto_penanggung_jawab)
                <img src="{{ asset('storage/'.$lab->foto_penanggung_jawab) }}" width="60">
            @else
                <em>-</em>
            @endif
        </td>
        <td>
            <a href="{{ route('laboratories.edit', $lab) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('laboratories.destroy', $lab) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus lab ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $labs->links() }}
@endsection
