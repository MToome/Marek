@props(['active' => false])

<a class="{{ $active ? 'bg-base-300' : 'hover:bg-base-100' }} rounded-md px-3 py-2 text-sm font-medium m-1"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
    >{{ $slot }}</a>
