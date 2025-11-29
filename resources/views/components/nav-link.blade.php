@props([
    'active' => false,
])
<a
    {{ $attributes->class([
        'btn-nav',
        'btn-nav-primary' => $active,
    ]) }}
>
    {{ $slot }}
</a> 

