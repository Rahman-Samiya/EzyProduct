@props([
    'color' => 'primary',
    'label',
    'value',
    'icon' => null,
    'link' => '#',
    'linkText' => 'View Details',
])

{{-- Reusable dashboard statistic card --}}
<div class="col-xl-3 col-md-6">
    <div class="card bg-{{ $color }} text-white mb-4">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <div class="small text-white-50">{{ $label }}</div>
                <div class="fs-3 fw-bold">{{ $value }}</div>
            </div>
            @if ($icon)
                <i class="fas {{ $icon }} fa-2x text-white-50"></i>
            @endif
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="{{ $link }}">{{ $linkText }}</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
