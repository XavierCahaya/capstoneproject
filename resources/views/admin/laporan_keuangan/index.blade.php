@extends('admin.layouts.main')

@section('container')
    <div class="row mt-4">
        <div class="mb-3 mb-md-0">
            <h1 class="mb-1 h2 fw-bold text-center">Data Pemasukan</h1>
        </div>
        <div>
            <form action="{{ route('exportlaporan') }}" method="get" class="mb-2">
                <div class="row g-2 align-items-center mt-4">
                    <div class="col-auto">
                        <label for="export_date" class="col-form-label">Pilih Tanggal:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="export_date" id="export_date" class="form-control">
                    </div>
                    <div class="col-auto ms-auto">
                        <button type="submit" class="btn btn-primary">Export Data</button>
                    </div>
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
                                <th>Metode Pemesanan</th>
                                <th>Nama Pemesan</th>
                                <th>status</th>
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
                                        {{ $income->delivery_option }}
                                    </td>
                                    <td>
                                        {{ $income->orderer_name }}
                                    </td>
                                    <td>
                                        {{ $income->status }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($income->total_price, 0, '.', '.') }}
                                    </td>
                                </tr>

                                @php
                                    $total_income += $income->total_price;
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
