@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <x-page-heading title="Products" />

    {{-- Task 4 — display the success message stored in the session --}}
    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    {{-- Task 5 — total product count --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="badge bg-dark fs-6">Total Products: {{ $total }}</span>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Add Product
        </a>
    </div>

    {{-- Task 5 — search by name + sort by price (asc / desc) --}}
    <x-card title="Product List" icon="fa-box">
        <form action="{{ route('products.index') }}" method="GET" class="row g-2 mb-4">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control"
                       placeholder="Search products by name..." value="{{ $search }}" />
            </div>
            <div class="col-md-3">
                <select name="sort" class="form-select">
                    <option value="">Sort by price</option>
                    <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="desc" {{ $sort === 'desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-fill">
                    <i class="fas fa-search me-1"></i> Filter
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th class="text-end">Price</th>
                        <th class="text-end">Stock</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><span class="badge bg-secondary">{{ $product->category_name }}</span></td>
                            <td class="text-end">${{ number_format($product->price, 2) }}</td>
                            <td class="text-end">{{ $product->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i> Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-card>
@endsection
