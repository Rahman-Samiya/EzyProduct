@props(['type' => 'success', 'icon' => 'fa-circle-check'])

{{-- Reusable dismissible alert --}}
<div {{ $attributes->merge(['class' => "alert alert-{$type} alert-dismissible fade show"]) }} role="alert">
    <i class="fas {{ $icon }} me-1"></i>
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
