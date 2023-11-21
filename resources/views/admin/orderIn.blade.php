@extends('admin.layouts.main')

@section('container')
<head>
    <style>
        h1 {
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Orderer Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Waktu Pemesanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderIn as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->orderer_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <button class="btn btn-danger">Tolak</button>
                                    <button class="btn btn-success">Terima</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
