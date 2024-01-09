<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Product</h2>

        @if(session('success'))
            <div class="alert alert-sucess" role="alert">
                    {{session('success')}}
            </div>
        @endif

        <table>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stocks</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->productID }}</td>
                        <td>{{ $product->productName }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stocks }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No products available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <button onClick="location.href='{{route('products.create')}}'">Add Product</button>
@endsection
