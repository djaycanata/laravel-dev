@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Products</h2>
        <h3>Hello, {{ $user->firstname }}</h3>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form id="purchaseForm" method="post" action="{{ route('shop.purchase', ['userID' => $user->userID]) }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <input type="hidden" name="productID[]" value="{{ $product->productID }}">
                            <td>{{ $product->productName }}</td>
                            <td class="price">{{ $product->price }}</td>
                            <td>
                                <input type="number" name="quantities[]" class="form-control quantity-input" min="0">
                            </td>
                            <td class="total-price-per-item">0.00</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No products available.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total Amount</td>
                        <td>
                        <input type="hidden" name="totalAmount" id="totalAmountInput" value="0.00">
                        <span id="displayTotalAmount">0.00</span>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-primary">Complete Purchase</button>
        </form>
    </div>

    <script>
        function calculateTotal() {
            var totalAmount = 0;

            var totalItems = document.querySelectorAll(".total-price-per-item");

            totalItems.forEach(function (item) {
                totalAmount += parseFloat(item.textContent) || 0;
            });

            document.getElementById("totalAmountInput").value = totalAmount.toFixed(2);
            document.getElementById("displayTotalAmount").textContent = totalAmount.toFixed(2);
        }

        document.addEventListener("DOMContentLoaded", function () {
            var quantityInputs = document.querySelectorAll(".quantity-input");

            quantityInputs.forEach(function (input) {
                input.addEventListener("input", function () {
                    var quantity = parseFloat(this.value) || 0;
                    var price = parseFloat(this.closest("tr").querySelector(".price").textContent) || 0;

                    var total = quantity * price;
                    this.closest("tr").querySelector(".total-price-per-item").textContent = total.toFixed(2);

                    calculateTotal();
                });
            });
        });
    </script>
@endsection
