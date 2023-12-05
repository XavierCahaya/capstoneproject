@foreach ( $order as $item )
<div class="modal fade" id="staticBackdropView{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modalTable">
            <div class="modal-header">
                <h5 class="modal-title">Pemesanan Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="title text-center">
                    <h4>Toreh N'Jajan</h4>
                    <h5>Depan kantor JNT Glenmore</h5>
                </div>
                <h5 class="mt-4 my-2">Tanggal : {{ $item->created_at }}</h5>
                <table>
                    <td class="text-center" colspan="4">-----------------------------------------</td>
                    <tr>
                        <td>Nama</td><td>:</td><td>{{ $item->orderer_name }}</td>
                    </tr>
                    @if ( $item->delivery_option != 'dine-in' )
                        <tr>
                            <td>No. Telp</td><td>:</td><td>{{ $item->phone }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td><td>:</td><td>{{ $item->address }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td>Opsi Pemesanan</td><td>:</td><td>{{ $item->delivery_option }}</td>
                    </tr>
                    <tr>
                        <td>Opsi Pembayaran</td><td>:</td><td>{{ $item->payment_option }}</td>
                    </tr>
                    <tr>
                        @if ($item->status_pembayaran == 'capture')
                            <td>Status Pembayaran</td><td>:</td><td><span class="badge text-bg-success py-2">{{ $item->status_pembayaran }}</span></td>
                        @else
                            <td>Status Pembayaran</td><td>:</td><td><span class="badge text-bg-danger py-2">{{ $item->status_pembayaran }}</span></td>
                        @endif
                    </tr>
                    <tr>
                        @if ($item->status == 'Menunggu Diproses')
                            <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-warning py-2">{{ $item->status }}</span></td>
                        @elseif ($item->status == 'Sedang Diproses')
                            <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-info py-2">{{ $item->status }}</span></td>
                        @elseif ($item->status == 'Selesai')
                        1   <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-success py-2">{{ $item->status }}</span></td>
                        @else
                            <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-secondary py-2">{{ $item->status }}</span></td>
                        @endif
                    </tr>
                    <td class="text-center" colspan="4">-----------------------------------------</td>
                    @foreach ( $orderDetail as $odItem)
                        @if ( $odItem->order_id == $item->id && $odItem->product )
                        <tr>
                            <td>{{ $odItem->product->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ $odItem->qty }}</td><td>{{ number_format($odItem->product->price, 0, ',', '.') }}</td><td class="d-flex justify-content-end">{{ number_format($odItem->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endif
                    @endforeach
                    <td class="text-center" colspan="4">-----------------------------------------</td>
                    <tr>
                        <td></td><td>Total :</td><td class="d-flex justify-content-end">Rp {{ number_format($item->total_price, 2, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
            @if ( $item->status_pembayaran == 'pending' && $item->delivery_option == 'delivery' )
            <div class="modal-footer">
                <a href="{{ route('konfirm.action', $item->id) }}" class="btn btn-success" type="submit">Konfirmasi</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach
