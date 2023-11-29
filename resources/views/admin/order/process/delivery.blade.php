@extends('admin.order.process.main')

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
        @foreach($order as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->delivery_option }}</td>
                <td>{{ $order->orderer_name }}</td>
                <td>{{ $order->phone  ?: '-' }}</td>
                <td>{{ $order->address  ?: '-' }}</td>
                <td>{{ $order->getTotalItemsAttribute() }}</td>
                <td>
                    @if ($order->status == 'Menunggu Diproses')
                        <span class="badge text-bg-warning">{{ $order->status }}</span>
                    @elseif ($order->status == 'Sedang Diproses')
                        <span class="badge text-bg-info">{{ $order->status }}</span>
                    @elseif ($order->status == 'Selesai')
                        <span class="badge text-bg-success">{{ $order->status }}</span>
                    @else
                        <span class="badge text-bg-secondary">{{ $order->status }}</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning">Detail</button>
                    <a href="{{ route('orderProcess.action', $order->id) }}">
                        <button type="submit" class="btn btn-success">Selesai</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
