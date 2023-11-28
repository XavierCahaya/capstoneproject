@extends('admin.layouts.main')

@section('container')
    <div class="row mt-4">
        {{-- <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-1 h2 fw-bold">Data Pemasukan</h1>
                </div>
                <div>
                    <a href="{{ route('exportlaporan') }}" class="btn btn-primary">Export Data</a>
                </div>
            </div>
        </div> --}}
        <div class="mb-3 mb-md-0">
            <h1 class="mb-1 h2 fw-bold">Data Pemasukan</h1>
        </div>
        <div>
            <form action="{{ route('exportlaporan') }}" method="get">
                <div class="input-group">
                    <input type="date" class="form-control" name="date">
                    <button type="submit" class="btn btn-primary">Export Data</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 mt-4">
            <div class="card mb-4">
                <div class="table-responsive border-0 overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox text-center"
                        id="datatable" style="width: 100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pemesan</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total Pembayaran</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $total_income = 0;
                            @endphp

                            @foreach ($income_data as $income)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $income->updated_at }}
                                    </td>
                                    <td>
                                        {{ $income->order->orderer_name }}
                                    </td>
                                    <td>
                                        {{ $income->product->name }}
                                    </td>
                                    <td>
                                        {{ $income->qty }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($income->subtotal, 0, '.', '.') }}
                                    </td>
                                </tr>

                                @php
                                    $total_income += $income->subtotal;
                                @endphp
                            @endforeach
                        </tbody>

                        <!-- Display Total Income at the end of the table -->
                        <tfoot>
                            <tr>
                                <td colspan="3x "></td>
                                <td>Total Pemasukan :</td>
                                <td>Rp. {{ number_format($total_income, 0, '.', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
