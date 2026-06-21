@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <x-page-heading title="Categories" />

    <p class="text-muted">
        Each category below is displayed with its related products using the Eloquent
        <strong>One-to-Many</strong> relationship (eager loaded).
    </p>

    {{-- Task 6 — display each category with its products --}}
    @forelse ($categories as $category)
        <x-card title="{{ $category->name }} ({{ $category->products_count }} products)" icon="fa-tags">
            @if ($category->products->isEmpty())
                <p class="text-muted mb-0">No products in this category yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Stock</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-end">${{ number_format($product->price, 2) }}</td>
                                    <td class="text-end">{{ $product->stock }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </x-card>
    @empty
        <x-card>
            <p class="text-muted mb-0 text-center py-3">No categories found.</p>
        </x-card>
    @endforelse
@endsection
