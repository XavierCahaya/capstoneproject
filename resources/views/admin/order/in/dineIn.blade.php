@extends('admin.order.in.main')

@section('content-table')
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal Masuk</th>
            <th>Opsi Pemesanan</th>
            <th>Nama Pemesan</th>
            <th>Nomer Telepon</th>
            <th>Alamat</th>
            <th>Jumlah Pesanan</th>
            <th>Status Pesanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $index => $od)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $od->created_at }}</td>
                <td>{{ $od->delivery_option }}</td>
                <td>{{ $od->orderer_name }}</td>
                <td>{{ $od->phone  ?: '-' }}</td>
                <td>{{ $od->address  ?: '-' }}</td>
                <td>{{ $od->getTotalItemsAttribute() }}</td>
                <td>
                    @if ($od->status == 'Menunggu Diproses')
                        <span class="badge text-bg-warning">{{ $od->status }}</span>
                    @elseif ($od->status == 'Sedang Diproses')
                        <span class="badge text-bg-info">{{ $od->status }}</span>
                    @elseif ($od->status == 'Selesai')
                        <span class="badge text-bg-success">{{ $od->status }}</span>
                    @else
                        <span class="badge text-bg-secondary">{{ $od->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdropView{{ $od->id }}"><i class="ri-file-list-fill"></i></a>
                    <a href="{{ route('orderIn.action', $od->id) }}">
                        <button type="submit" class="btn btn-success"><i class="ri-checkbox-fill"></i></button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
