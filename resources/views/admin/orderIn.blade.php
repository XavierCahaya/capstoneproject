@extends('admin.layouts.main')

@section('container')

<head>
    <style>
        h4 {
        text-align: center;
        }

        th, td {
        text-align: center;
        }

        .table-container {
            margin-right: 280px;
        }
    </style>
</head>
<div class="container mt-4 table-container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <h4 class="card-title">Pesanan Masuk</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Waktu Pemesanan</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Jumlah Item</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderIn as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->order->orderer_name }}</td>
                                <td>{{ $order->order->phone }}</td>
                                <td>{{ $order->order->address }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>{{ $order->order->status }}</td>
                                <td>
                                    <button class="btn btn-warning">Detail</button>
                                    <a href="{{ route('orderIn.action', $order->id) }}">
                                        <button type="submit" class="btn btn-success">Terima</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection

    
