@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <x-page-heading title="Product Details" breadcrumb="Details" />

    <div class="row">
        <div class="col-xl-8">
            <x-card title="{{ $product->name }}" icon="fa-box">
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
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $product->updated_at->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
            </x-card>

            <div class="d-flex gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
                <a href="{{ route('products.api.show', $product->id) }}" class="btn btn-outline-info" target="_blank">
                    <i class="fas fa-code me-1"></i> View as JSON
                </a>
            </div>
        </div>
    </div>
@endsection
