@props([
    'components' => [],
])
<aside {{ $attributes->merge(['class' => 'layout-menu']) }}
       :class="{ '_is-minimized': minimizedMenu, '_is-opened': $store.menu.isSidebarOpen }"
>
    <x-moonshine::components
        :components="$components"
    />

    {{ $slot ?? '' }}
</aside>