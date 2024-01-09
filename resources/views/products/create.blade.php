<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Product</h2>
        <form action="{{ route('products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" name="productName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stocks">Stocks:</label>
                <input type="number" name="stocks" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
