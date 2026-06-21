@props(['title' => null, 'icon' => null])

{{-- Reusable content card with an optional header --}}
<div {{ $attributes->merge(['class' => 'card mb-4']) }}>
    @if ($title)
        <div class="card-header">
            @if ($icon)
                <i class="fas {{ $icon }} me-1"></i>
            @endif
            {{ $title }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
