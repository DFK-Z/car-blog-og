<div>
    @if ($services->isNotEmpty())
        @foreach ($services as $service)
            <x-card.service :service="$service"/>
        @endforeach
    @else
        {{__('Данный раздел редактируется')}}
    @endif
</div>
