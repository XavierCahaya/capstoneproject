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
            <h4 class="card-title">Detail Pesanan</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $order_detail)
                    <tr>
                        <td>{{ $order_detail->id }}</td>
                        <td>{{ $order_detail->order_id }}</td>
                        <td>{{ $order_detail->product_id }}</td>
                        <td>{{ $order_detail->qty }}</td>
                        <td>{{ $order_detail->total_price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection

    
