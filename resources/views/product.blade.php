@extends('layouts.main')

@section('container')
    <div id="promo" class="carousel slide mx-auto mb-3" data-bs-ride="carousel">
        <div class="carousel-inner text-center">
            @foreach ($promos as $key => $promo)
                <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
                    @if($promo->image)
                        <img src="{{ asset('images/promo/' . $promo->image) }}" class="d-block w-100" alt="Promo Image">
                    @endif
                </div>  
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#promo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="#" method="GET">
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn" type="submit" style="background: #FC3E24; color:white">search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="row row-cols-md-2 row-cols-sm-1">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-8 my-2 d-flex justify-content-center">
                        <div class="card-product card">
                            <img src="{{ asset('images/product/'. $product->image) }}" class="card-img-top img-fluid" alt="ProdukImage">
                            <div class="card-body p-2">
                                <div class="d-flex midleinfo">
                                    <h5 class="card-title p-2">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</h5>
                                    <h6 class="card-title"
                                        style="background-color:#D4DF52; border-radius:10px;">
                                        {{ $product->category->name }}</h6>
                                </div>
                                <p class="card-text text-center" style="font-size: 15px">{{ $product->name }}</p>
                                <div class="card-btn d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-detail"
                                        style="background-color:#1FD8CD; border-radius:10px; font-size:.8em;">Lihat
                                        Detail</a>
                                    <a href="#" class="btn btn-pesan btn-add-to-cart text-light"
                                        data-product-id="{{ $product->id }}" data-product-price="{{ $product->price }}"
                                        style="background-color:#0cc22a; border-radius:10px; font-size:1em;">Pesan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center" id="cartTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table content will be dynamically added here -->
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="font-weight-bold mb-0">Total Harga: <span id="total-price" class="text-success">0</span>
                    </p>
                </div>
            </div>

            <form action="{{ route('checkout') }}" method="POST" onsubmit="prepareFormData()">
                @csrf
                <div class="mb-3">
                    <label for="delivery-option" class="form-label">Opsi Pesanan</label>
                    <select class="form-select" id="delivery-option" name="delivery-option">
                        <option value="dine-in">Dine In</option>
                        <option value="delivery">Delivery</option>
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="orderer_name" class="form-label">Nama Pesanan</label>
                    <input type="text" class="form-control" id="orderer_name" name="orderer_name" required>
                </div>

                <div id="delivery-fields" style="display: none;">
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                </div>
                <input type="hidden" name="total_price" id="total_price">
        
                <input type="hidden" name="array_id" id="array_id" value="">
                <input type="hidden" name="array_name" id="array_name" value="">
                <input type="hidden" name="array_qty" id="array_qty" value="">
                <input type="hidden" name="array_subtotal" id="array_subtotal" value="">

                <button type="submit" class="btn btn-success mb-4" id="checkout-btn">Checkout</button>
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </form>
        </div>
    </div>

    <script>

        // --- Logic Tampilan Pilihan Opsi Pemesanan ---
        document.addEventListener('DOMContentLoaded', function() {
            let deliveryOption = document.getElementById('delivery-option');
            let deliveryFields = document.getElementById('delivery-fields');    
            let phone = document.getElementById('phone');
            let address = document.getElementById('address');

            deliveryOption.addEventListener('change', function() {
                if (deliveryOption.value === 'delivery') {
                    deliveryFields.style.display = 'block';
                    phone.required = true;
                    address.required = true;
                }else{
                    deliveryFields.style.display = 'none';
                    phone.required = false;
                    address.required = false;
                }
            });
        });

        // --- Logic mindahin menu yg dipilih, menuju cart ---
        document.addEventListener('DOMContentLoaded', function() {
            let addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
            let tableBody = document.querySelector('.table tbody');
            let totalPriceElement = document.getElementById('total-price');

            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    let productId = this.getAttribute('data-product-id');
                    let productName = this.closest('.card-body').querySelector('.card-text')
                        .textContent;
                    let productPrice = parseFloat(this.getAttribute('data-product-price'));
                    let qty = 1;
                    let amount = productPrice * qty;

                    // --- Logic ketika ada item yg sama pada cart, 
                    // Jika ada item yang sama maka tambah quantity ---
                    let existingRow = tableBody.querySelector(`tr[data-product-id="${productId}"]`);
                    if (existingRow) {
                        let quantityElement = existingRow.querySelector('.quantity');
                        let quantity = parseInt(quantityElement.textContent);
                        quantity++;
                        quantityElement.textContent = quantity;

                        let totalElement = existingRow.querySelector('.total');
                        totalElement.textContent = (productPrice * quantity).toLocaleString(
                            'id-ID', {
                                minimumFractionDigits: 2
                            });
                    
                    // Jika tidak ada, maka tambah row baru ke cart
                    } else {
                        let newRow = `
                        <tr data-product-id="${productId}" data-product-price="${productPrice}">
                            <th scope="row">${tableBody.children.length + 1}</th>
                            <td>${productName}</td>
                            <td>
                                <button class="btn btn-sm btn-decrease p-1">-</button>
                                <span class="quantity">1</span>
                                <button class="btn btn-sm btn-increase p-1">+</button>
                            </td>
                            <td>${productPrice.toLocaleString('id-ID', { minimumFractionDigits: 2 })}</td>
                            <td class="total">${productPrice.toLocaleString('id-ID', { minimumFractionDigits: 2 })}</td>
                            <td>
                                <button class="btn btn-sm btn-remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path id="removeIcon" d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>`;

                        tableBody.innerHTML += newRow;
                    }
                    updateTotal();
                    prepareFormData();
                });
            });

            // --- Kumpulan logic action button pada tiap row cart ---
            tableBody.addEventListener('click', function(event) {
                let target = event.target;

                // --- Increase & Decrease qty Logic ---
                if (target.classList.contains('btn-increase') || target.classList.contains(
                        'btn-decrease')) {
                    let row = target.closest('tr');
                    let quantityElement = row.querySelector('.quantity');
                    let totalElement = row.querySelector('.total');
                    let productPrice = parseFloat(row.getAttribute('data-product-price'));
                    let quantity = parseInt(quantityElement.textContent);

                    if (target.classList.contains('btn-increase')) {
                        quantity++;
                    } else if (target.classList.contains('btn-decrease') && quantity > 1) {
                        quantity--;
                    }

                    quantityElement.textContent = quantity;
                    totalElement.textContent = (productPrice * quantity).toLocaleString(
                        'id-ID', {
                            minimumFractionDigits: 2
                        });
                    updateTotal();
                    prepareFormData();

                    // --- Remove Logic ---
                } else if (target.classList.contains('btn-remove') || target.closest(
                        '.btn-remove')) {
                    let row = target.closest('tr');
                    if (target.classList.contains('btn-remove')) {
                        row.remove();
                        updateTotal();
                    } else {
                        var removeButton = row.querySelector('.btn-remove');
                        removeButton.click();
                    }
                }
            });

            function updateTotal() {                
                let totalInput = document.getElementById('total_price');    
                let totalElements = document.querySelectorAll('.total');
                let grandTotal = Array.from(totalElements).reduce(function(accumulator, element) {
                    return accumulator + parseFloat(element.textContent);
                }, 0);
                totalPriceElement.textContent = 'Rp ' + grandTotal + '.000,00';
                totalInput.setAttribute("value", grandTotal + '.000,00');
            }

            function prepareFormData() {
                // Inisialisasi array terpisah
                let arrayId = [];
                let arrayName = [];
                let arrayQty = [];
                let arraySubTotal = [];

                // Ambil data dari setiap baris pada keranjang
                let rows = document.querySelectorAll('#cartTable tbody tr');

                rows.forEach(function(row) {
                    let productId = row.getAttribute('data-product-id');
                    let productName = row.querySelector('td:nth-child(2)').innerText;
                    let quantity = row.querySelector('.quantity').innerText;
                    let total = row.querySelector('.total').innerText;

                    // Tambahkan data ke masing-masing array
                    arrayId.push(productId);
                    arrayName.push(productName);
                    arrayQty.push(quantity);
                    arraySubTotal.push(total);
                });

                console.log('arrayId:', arrayId);
                console.log('arrayName:', arrayName);
                console.log('arrayQty:', arrayQty);
                console.log('arraySubTotal:', arraySubTotal);

                // Update nilai input tersembunyi pada formulir
                document.getElementById('array_id').value = JSON.stringify(arrayId);
                document.getElementById('array_name').value = JSON.stringify(arrayName);
                document.getElementById('array_qty').value = JSON.stringify(arrayQty);
                document.getElementById('array_subtotal').value = JSON.stringify(arraySubTotal);
            }
        });
    </script>
@endsection

