@props([
    'route' => '',
    'logOutRoute' => '',
    'avatar' => '',
    'nameOfUser' => '',
    'username' => '',
    'menu' => null,
    'translates' => [],
    'before',
    'after',
])
{{ $before ?? '' }}

@if(isset($slot) && $slot->isNotEmpty())
    {{ $slot }}
@else
    <div {{ $attributes->merge(['class' => 'profile']) }}>
        <a href="{{ $route }}" class="profile-main">
            @if($avatar)
                <div class="profile-photo">
                    <img
                        class="h-full w-full object-cover"
                        src="{{ $avatar }}"
                        alt="{{ $nameOfUser }}"
                    />
                </div>
            @endif

            @if($nameOfUser !== '' || $username !== '')
                <div class="profile-info">
                    @if($nameOfUser !== '')
                        <h5 class="name">{{ $nameOfUser }}</h5>
                    @endif

                    @if($username !== '')
                        <div class="email">{{ $username }}</div>
                    @endif
                </div>
            @endif
        </a>

        @if($logOutRoute)
            <form class="profile-actions" action="{{ $logOutRoute }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="delete" />

                <button
                    class="profile-exit"
                    type="submit"
                    title="{{ $translates['logout'] ?? 'Выйти' }}"
                >
                    <x-moonshine::icon icon="arrow-right-start-on-rectangle" />
                    <span>{{ $translates['logout'] ?? 'Выйти' }}</span>
                </button>
            </form>
        @endif
    </div>
@endif

{{ $after ?? '' }}