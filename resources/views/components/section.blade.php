@props([
    'style' => 'default',
    'width' => 'lg'
])

<section
    @class([
        'py-32 md:py-48 lg:py-64' => true,
        'bg-x-page' => $style === 'default',
        'bg-x-page-inverted' => $style === 'inverted',
        'bg-white' => $style === 'white'
    ])
    {{ $attributes }}
>
    {{ $slot }}
</section>
