@foreach ( $order as $item )
<div class="modal fade" id="staticBackdropView{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
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
                    <td colspan="4">------------------------------------------------------------------------</td>
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
                        @if ($item->status_pembayaran == 'Sudah Dibayar')
                            <td>Status Pembayaran</td><td>:</td><td><span class="badge text-bg-success">{{ $item->status_pembayaran }}</span></td>
                        @else
                            <td>Status Pembayaran</td><td>:</td><td><span class="badge text-bg-danger">{{ $item->status_pembayaran }}</span></td>
                        @endif
                    </tr>
                    <tr>
                        @if ($item->status == 'Menunggu Diproses')
                            <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-warning">{{ $item->status }}</span></td>
                        @elseif ($item->status == 'Sedang Diproses')
                            <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-info">{{ $item->status }}</span></td>
                        @elseif ($item->status == 'Selesai')
                        1   <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-success">{{ $item->status }}</span></td>
                        @else
                            <td>Status Pemesanan</td><td>:</td><td><span class="badge text-bg-secondary">{{ $item->status }}</span></td>
                        @endif
                    </tr>
                    <td colspan="4">------------------------------------------------------------------------</td>
                    @foreach ( $orderDetail as $odItem)
                        @if ( $odItem->order_id == $item->id && $odItem->product )
                        <tr>
                            <td>{{ $odItem->product->name }}</td>
                        </tr>           
                        <tr>
                            <td>{{ $odItem->qty }}</td><td>{{ $odItem->product->price }}</td><td></td><td>{{ $odItem->subtotal }}</td>
                        </tr>      
                        @endif
                    @endforeach
                    <td colspan="4">------------------------------------------------------------------------</td>
                    <tr>
                        <td></td><td>Total</td><td>:</td><td>{{ $item->total_price }}</td>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach