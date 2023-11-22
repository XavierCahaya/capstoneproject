@extends('layouts.main')

@section('container')
    <div id="promo" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/promoo.jpg" class="d-block w-100" alt="...">
            </div>
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
                        <div class="card-product card" style="width: 12rem; border-radius:20px; min-width: 150px">
                            <img src="{{ asset('images/product/'. $product->image) }}" class="card-img-top img-fluid" style="border-radius:20px 20px 0 0;"
                                alt="...">
                            <div class="card-body p-2">
                                <div class="d-flex justify-content-around">
                                    <h5 class="card-title p-2" style="font-size: 15px">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</h5>
                                    <h6 class="card-title p-2"
                                        style="background-color:#D4DF52; border-radius:10px; font-size:.9em;">
                                        {{ $product->category->name }}</h6>
                                </div>
                                <p class="card-text text-center" style="font-size: 15px">{{ $product->name }}</p>
                                <div class="card-btn d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-detail px-2 py-2"
                                        style="background-color:#1FD8CD; border-radius:10px; font-size:.8em;">Lihat
                                        Detail</a>
                                    <a href="#" class="btn btn-pesan btn-add-to-cart text-light px-3 py-3"
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
                <table class="table table-striped table-hover text-center">
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
                    <p class="font-weight-bold mb-0">Total Price: <span id="total-price" class="text-success">0</span>
                    </p>
                </div>
            </div>

            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="delivery-option" class="form-label">Delivery Option</label>
                    <select class="form-select" id="delivery-option">
                        <option value="dine-in">Dine In</option>
                        <option value="delivery">Delivery</option>
                    </select>
                </div>

                <div id="dine-in-fields">
                    <div class="mb-3">
                        <label for="orderer_name_dine_in" class="form-label">Orderer Name</label>
                        <input type="text" class="form-control" id="orderer_name_dine_in" name="orderer_name" required>
                    </div>
                </div>

                <div id="delivery-fields" style="display: none;">
                    <div class="mb-3">
                        <label for="orderer_name_delivery" class="form-label">Orderer Name</label>
                        <input type="text" class="form-control" id="orderer_name_delivery" name="orderer_name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                </div>

                <input type="hidden" name="productId" id="productId">
                <input type="hidden" name="qty" id="qty">
                <input type="hidden" name="amount" id="amount">

                <button type="submit" class="btn btn-success mb-4" id="checkout-btn">Checkout</button>
            </form>

        </div>
    </div>

    <script>
        let arrayproductId = []
        let arrayqty = []
        let arrayamount = []

        let productInputId = document.getElementById('productId')
        let productInputqty = document.getElementById('qty')
        let productInputamount = document.getElementById('amount')

        document.addEventListener('DOMContentLoaded', function() {
            var deliveryOption = document.getElementById('delivery-option');
            var dineInFields = document.getElementById('dine-in-fields');
            var deliveryFields = document.getElementById('delivery-fields');

            // Ganti referensi elemen 'orderer_name' berdasarkan pilihan pengiriman
            var ordererNameDineIn = document.getElementById('orderer_name_dine_in');
            var ordererNameDelivery = document.getElementById('orderer_name_delivery');
            var phone = document.getElementById('phone');
            var address = document.getElementById('address');

            deliveryOption.addEventListener('change', function() {
                if (deliveryOption.value === 'dine-in') {
                    dineInFields.style.display = 'block';
                    deliveryFields.style.display = 'none';

                    // Gunakan elemen 'orderer_name_dine_in'
                    ordererNameDineIn.required = true;
                    ordererNameDelivery.required = false;
                    phone.required = false;
                    address.required = false;
                } else {
                    dineInFields.style.display = 'none';
                    deliveryFields.style.display = 'block';

                    // Gunakan elemen 'orderer_name_delivery'
                    ordererNameDineIn.required = false;
                    ordererNameDelivery.required = true;
                    phone.required = true;
                    address.required = true;
                }
            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            var addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
            var tableBody = document.querySelector('.table tbody');
            var totalPriceElement = document.getElementById('total-price');

            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var productId = this.getAttribute('data-product-id');
                    var productName = this.closest('.card-body').querySelector('.card-text')
                        .textContent;
                    var productPrice = parseFloat(this.getAttribute('data-product-price'));
                    var qty = 1;
                    var amount = productPrice * qty;


                    var existingRow = tableBody.querySelector(`tr[data-product-id="${productId}"]`);
                    if (existingRow) {
                        var quantityElement = existingRow.querySelector('.quantity');
                        var quantity = parseInt(quantityElement.textContent);
                        quantity++;
                        quantityElement.textContent = quantity;

                        var totalElement = existingRow.querySelector('.total');
                        totalElement.textContent = (productPrice * quantity).toLocaleString(
                            'id-ID', {
                                minimumFractionDigits: 2
                            });

                    } else {

                        arrayproductId.push(productId);
                        arrayqty.push(qty);
                        arrayamount.push(amount);

                        productInputId.value = arrayproductId.join(',');
                        productInputqty.value = arrayqty.join(',');
                        productInputamount.value = arrayamount.join(',');

                        // arrayproductId[arrayproductId.length] = productId
                        // arrayqty[arrayqty.length] = qty
                        // arrayamount[arrayamount.length] = amount

                        // productInputId.value = arrayproductId
                        // productInputqty.value = arrayqty
                        // productInputamount.value = arrayamount

                        var newRow = `

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
                        </tr>

                `;

                        tableBody.innerHTML += newRow;
                    }

                    updateTotal();
                });
            });

            tableBody.addEventListener('click', function(event) {
                var target = event.target;

                if (target.classList.contains('btn-increase') || target.classList.contains(
                        'btn-decrease')) {
                    var row = target.closest('tr');
                    var quantityElement = row.querySelector('.quantity');
                    var totalElement = row.querySelector('.total');
                    var productPrice = parseFloat(row.getAttribute('data-product-price'));
                    var quantity = parseInt(quantityElement.textContent);

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
                } else if (target.classList.contains('btn-remove') || target.closest(
                        '.btn-remove')) {
                    var row = target.closest('tr');
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
                var totalElements = document.querySelectorAll('.total');
                var grandTotal = Array.from(totalElements).reduce(function(accumulator, element) {
                    return accumulator + parseFloat(element.textContent);
                }, 0);

                totalPriceElement.textContent = 'Rp ' + grandTotal + '.000,00';
            }

        });
    </script>
@endsection
