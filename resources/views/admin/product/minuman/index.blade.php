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
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $pd)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ 'N/A' }}</td>
            <td>{{ $pd->name }}</td>
            <td>{{ $pd->category->name }}</td>
            <td>{{ $pd->description }}</td>
            <td>{{ $pd->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
