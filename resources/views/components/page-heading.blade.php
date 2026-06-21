@props(['title', 'breadcrumb' => null])

{{-- Reusable page heading with breadcrumb --}}
<h1 class="mt-4">{{ $title }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{ $breadcrumb ?? $title }}</li>
</ol>
