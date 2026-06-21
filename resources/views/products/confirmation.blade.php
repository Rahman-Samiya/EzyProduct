@extends('layouts.app')

@section('title', 'Product Created')

@section('content')
    <x-page-heading title="Confirmation" breadcrumb="Product Created" />

    {{-- Task 4 — success message read from the session --}}
    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <div class="row">
        <div class="col-xl-8">
            {{-- Task 4 — display the submitted product information --}}
            <x-card title="Submitted Product Information" icon="fa-circle-check">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 200px;">Product ID</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><span class="badge bg-secondary">{{ $product->category->name ?? '—' }}</span></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>${{ number_format($product->price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td>{{ $product->stock }} units</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $product->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
            </x-card>

            <div class="d-flex gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fas fa-list me-1"></i> Go to Product List
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-plus me-1"></i> Add Another
                </a>
            </div>
        </div>
    </div>
@endsection
