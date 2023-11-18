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
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-8 my-2 d-flex justify-content-center">
                        <div class="card-product card" style="width: 15rem; border-radius:20px;">
                            <img src="/image/food.webp" class="card-img-top img-fluid" style="border-radius:20px 20px 0 0;"
                                alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-around mb-2">
                                    <h5 class="card-title p-1" style="font-size: 15px">Rp {{ $product->price }}</h5>
                                    <h6 class="card-title p-1"
                                        style="background-color:#D4DF52; border-radius:10px; font-size:12px;">
                                        {{ $product->category->name }}</h6>
                                </div>
                                <p class="card-text text-center" style="font-size: 15px">{{ $product->name }}</p>
                                <div class="d-flex justify-content-around">
                                    <a href="#" class="btn btn-detail"
                                        style="background-color:#1FD8CD; border-radius:10px; font-size:12px; padding:8px;">Lihat
                                        Detail</a>
                                    <a href="#" class="btn btn-pesan btn-add-to-cart"
                                        data-product-id="{{ $product->id }}" data-product-price="{{ $product->price }}"
                                        style="background-color:#0AD82B; border-radius:10px; font-size:12px; padding:8px;">Pesan</a>

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
                <div>
                    <button class="btn btn-primary" id="checkout-btn">Checkout</button>
                </div>
            </div>
        </div>
    </div>


    <script>
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

                    // Check if the product is already in the cart
                    var existingRow = tableBody.querySelector(`tr[data-product-id="${productId}"]`);
                    if (existingRow) {
                        var quantityElement = existingRow.querySelector('.quantity');
                        var quantity = parseInt(quantityElement.textContent);
                        quantity++;
                        quantityElement.textContent = quantity;

                        var totalElement = existingRow.querySelector('.total');
                        totalElement.textContent = (productPrice * quantity);
                    } else {
                        var newRow = `
                    <tr data-product-id="${productId}" data-product-price="${productPrice}">
                        <th scope="row">${tableBody.children.length + 1}</th>
                        <td>${productName}</td>
                        <td>
                            <button class="btn btn-sm btn-decrease">-</button>
                            <span class="quantity">1</span>
                            <button class="btn btn-sm btn-increase">+</button>
                        </td>
                        <td>${productPrice}</td>
                        <td class="total">${productPrice}</td>
                        <td>
                            <button class="btn btn-sm btn-remove">Remove</button>
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
                    totalElement.textContent = (productPrice * quantity);

                    updateTotal();
                } else if (target.classList.contains('btn-remove')) {
                    var row = target.closest('tr');
                    row.remove();
                    updateTotal();
                }
            });

            function updateTotal() {
                var totalElements = document.querySelectorAll('.total');
                var grandTotal = Array.from(totalElements).reduce(function(accumulator, element) {
                    return accumulator + parseFloat(element.textContent);
                }, 0);

                totalPriceElement.textContent = grandTotal;
            }
        });
    </script>
@endsection
