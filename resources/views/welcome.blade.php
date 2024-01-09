@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome to Your Store</h2>

        <div class="mb-4">
            <a href="{{ route('users.create') }}">
                <h3>Add New User</h3>
            </a>
        </div>

        <div class="mb-4">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h3>Select Current User</h3>
            <select name="users" id="users">
                @forelse($users as $user)
                    <option value="{{ $user->userID }}">{{ $user->firstname . ' ' . $user->lastname }}</option>
                @empty
                    <option disabled>No current users!</option>
                @endforelse
            </select>

            <button id="goToShopBtn" class="btn btn-primary" onclick="goToShop()">Go to Shop</button>
        </div>
    </div>

    <script>
        function goToShop() {
            // Get the selected userID from the dropdown
            var selectedUserId = document.getElementById('users').value;

            // Check if a user is selected
            if (selectedUserId) {
                // Redirect to the shop index with the selected userID
                window.location.href = "{{ route('shop.index', ['userID' => ':userID']) }}".replace(':userID', selectedUserId);
            } else {
                alert('Please select a user before going to the shop.');
            }
        }
    </script>
@endsection
