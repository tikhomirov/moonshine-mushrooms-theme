@props([
    'href',
    'logo',
    'logoSmall' => null,
    'title' => null,
    'minimized' => false,
])
<a {{ $attributes->merge(['class' => 'logo block mushrooms-brand-logo', 'rel' => 'home', 'href' => $href]) }}>
    <img src="{{ $logo }}" class="hidden h-14 xl:block" alt="{{ $title }}" />
    @if($logoSmall)
        <img src="{{ $logoSmall }}" class="block h-8 lg:h-10 xl:hidden" alt="{{ $title }}" />
    @endif
    @if($title)
        <span class="mushrooms-brand-title" :class="minimizedMenu && '!hidden'">{{ $title }}</span>
    @endif
</a>
