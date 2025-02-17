{{-- <div class="alert alert-{{ $type }}">
    {{ $message }}
</div> --}}

<div {{ $attributes->merge(["class" => "alert alert-danger"]) }}>
    @if ($slot->isEmpty())
        This is default content if the slot is empty.
    @else
        {{ $slot }}
    @endif
</div>
