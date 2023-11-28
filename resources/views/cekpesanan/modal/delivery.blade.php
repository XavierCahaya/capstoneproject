@foreach ( $order as $item )
<div class="modal fade" id="staticBackdropView{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemesanan Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Nama     : {{ $item->orderer_name }}</p>
                <p>Nomer telepon     : {{ $item->phone }}</p>
                <p>Alamat     : {{ $item->address }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach