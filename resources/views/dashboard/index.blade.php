@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <x-page-heading title="Dashboard" />

    {{-- Task 7 — statistic cards (reusable x-stat-card component) --}}
    <div class="row">
        <x-stat-card
            color="primary"
            label="Total Categories"
            :value="$totalCategories"
            icon="fa-tags"
            :link="route('categories.index')"
            link-text="View Categories" />

        <x-stat-card
            color="warning"
            label="Total Products"
            :value="$totalProducts"
            icon="fa-box"
            :link="route('products.index')"
            link-text="View Products" />

        <x-stat-card
            color="success"
            label="Total Stock Quantity"
            :value="number_format($totalStock)"
            icon="fa-warehouse"
            :link="route('products.index')"
            link-text="View Products" />

        <x-stat-card
            color="danger"
            label="Add New Product"
            value="+"
            icon="fa-plus"
            :link="route('products.create')"
            link-text="Create Product" />
    </div>

    {{-- Task 7 — latest 5 products --}}
    <x-card title="Latest 5 Products" icon="fa-clock">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th class="text-end">Price</th>
                        <th class="text-end">Stock</th>
                        <th>Created</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestProducts as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><span class="badge bg-secondary">{{ $product->category->name ?? '—' }}</span></td>
                            <td class="text-end">${{ number_format($product->price, 2) }}</td>
                            <td class="text-end">{{ $product->stock }}</td>
                            <td>{{ $product->created_at->format('d M Y, h:i A') }}</td>
                            <td class="text-center">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No products yet. <a href="{{ route('products.create') }}">Add your first product</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-card>
@endsection
