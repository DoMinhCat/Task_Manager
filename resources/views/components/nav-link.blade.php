@props([
    'active' => false,
])
<a
    {{ $attributes->class([
        'btn',
        'btn-primary' => $active,
    ]) }}
>
    {{ $slot }}
</a> 

