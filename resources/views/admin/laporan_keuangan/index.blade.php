@extends('admin.layouts.main')

@section('container')
    <div class="row mt-4">
        <div class="mb-3 mb-md-0">
            <h1 class="mb-1 h2 fw-bold text-center">Data Pemasukan</h1>
        </div>
        <div class="incomeBtn d-flex justify-content-center mb-4">
            <form action="{{ route('laporankeuangan') }}" method="get" class="mb-2">
                @csrf
                <div class="incomeBtn row g-2 mt-3">
                    <div class="col-auto">
                        <label for="start_date" class="col-form-label">Mulai :</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                    <div class="col-auto">
                        <label for="end_date" class="col-form-label">Sampai :</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Filter Data</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Export Data
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Export Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('exportlaporan') }}" method="get" class="mt-0">
                            @csrf
                            <div class="mb-3">
                                <label for="export_start_date" class="col-form-label">Export Mulai :</label>
                                <input type="date" name="export_start_date" id="export_start_date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="export_end_date" class="col-form-label">Export Sampai :</label>
                                <input type="date" name="export_end_date" id="export_end_date" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Export Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 mt-2">
            <div class="appear-on-small p-2" style="background-color: aquamarine">
                <p class="appear-on-small d-flex justify-content-center align-items-center m-0 p-2 text-center">
                    <strong>Total Pemasukan:</strong>Rp. <span id="totalIncomeDisplay"></span>,00</p>
            </div>
            <div class="card mb-4">
                <div class="table-responsive border-0 overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox text-center"
                        id="datatable" style="width: 100%">
                        <thead class="table-light">
                            <tr>
                                <th class="hide-on-small">No</th>
                                <th class="hide-on-small">Tanggal</th>
                                <th class="hide-on-small">Pemesanan</th>
                                <th class="hide-on-small">Pembayaran</th>
                                <th class="hide-on-small">Nama Pemesan</th>
                                <th class="hide-on-small">Total Pembayaran</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $total_income = 0;
                            @endphp

                            @foreach ($income_data as $income)
                                <tr>
                                    <td class="hide-on-small">{{ $loop->iteration }}</td>
                                    <td class="hide-on-small">
                                        {{ $income->updated_at }}
                                    </td>
                                    <td class="hide-on-small">
                                        {{ $income->delivery_option }}
                                    </td>
                                    <td class="hide-on-small">
                                        {{ $income->payment_option }}
                                    </td>
                                    <td class="hide-on-small">
                                        {{ $income->orderer_name }}
                                    </td>
                                    <td class="hide-on-small">
                                        Rp. {{ number_format($income->total_price, 0, '.', '.') }}
                                    </td>
                                </tr>
                                <div class="tableSmall appear-on-small">
                                    <p class="appear-on-small text-center"><strong>{{ $loop->iteration }}</strong></p>
                                    <p class="appear-on-small"><strong>Tanggal: </strong>{{ $income->updated_at }}</p>
                                    <p class="appear-on-small"><strong>Metode Pemesanan:
                                        </strong>{{ $income->delivery_option }}</p>
                                    <p class="appear-on-small"><strong>Metode Pembayaran: </strong>
                                        {{ $income->payment_option }}</p>
                                    <p class="appear-on-small"><strong>Nama Pemesan: </strong>{{ $income->orderer_name }}
                                    </p>
                                    <p class="appear-on-small"><strong>Total Pembayaran: </strong>Rp.
                                        {{ number_format($income->total_price, 0, '.', '.') }}</p>
                                </div>
                                @php
                                    $total_income += $income->total_price;
                                @endphp
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="4x" class="hide-on-small"></td>
                                <td class="hide-on-small" style="background-color: aquamarine"><strong>Total Pemasukan
                                        :</strong></td>
                                <td class="hide-on-small" style="background-color: aquamarine"><strong>Rp.
                                        {{ number_format($total_income, 0, '.', '.') }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var totalIncomeForDisplay = {{ $total_income }};
        document.getElementById('totalIncomeDisplay').textContent = totalIncomeForDisplay.toLocaleString('id-ID');
    </script>
@endsection
