@extends('admin.product.main')

@section('content-table')

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $pd)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img src="{{ asset('images/product/' . $pd->image) }}" alt="Gambar Produk" class="img-thumbnail" width="60">
                </td>
                <td>{{ $pd->name }}</td>
                <td>{{ $pd->category->name }}</td>
                <td>{{ $pd->description }}</td>
                <td>Rp. {{ number_format($pd->price, 0, '.', '.') }}</td>
                <td>
                    @if ($pd->status == 'Aktif')
                        <span class="badge text-bg-success">{{ $pd->status }}</span>
                    @else
                        <span class="badge text-bg-danger">{{ $pd->status }}</span>
                    @endif
                <td>
                    <a href="{{ route('form.update.product', $pd->id) }}" class="btn btn-sm btn-success">
                        Edit
                    </a>
                    <a href="{{ route('delete.product', $pd->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
