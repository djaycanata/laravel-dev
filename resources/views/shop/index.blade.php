<!-- resources/views/shop/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Products</h2>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form id="purchaseForm"  action="{{ route('shop.purchase', ['userID' => ':userID']) }}" method="post">
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
                            <td>{{ $product->productName }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <input type="number" name="quantities[{{ $product->id }}]" class="form-control quantity-input" min="0">
                            </td>
                            <td class="total-price-per-item">0.00</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No products available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Complete Purchase</button>
        </form>
    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            var quantityInputs = document.querySelectorAll(".quantity-input");

            quantityInputs.forEach(function (input) {
                input.addEventListener("input", function () {
                    var quantity = parseFloat(this.value) || 0;
                    var price = parseFloat(this.closest("tr").querySelector("td:nth-child(2)").textContent) || 0;

                    var total = quantity * price;
                    this.closest("tr").querySelector(".total-price-per-item").textContent = total.toFixed(2);
                });
            });
        });
    </script>
@endsection
