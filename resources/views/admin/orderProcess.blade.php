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
        <div class="table-responsive">
            <h4 class="card-title">Pesanan Diproses</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Waktu Pemesanan</th>
                        <th>Nama</th>
                        <th>Total Harga</th>
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderIn as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->orderer_name }}</td>
                            <td>{{ $order->getTotalItemsAttribute() }}</td>
                            <td>
                                <a href="OrderDetail"><button class="btn btn-primary">Detail</button></a>
                            </td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <button class="btn btn-success">Selesai</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection

    
