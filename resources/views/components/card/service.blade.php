@props(['service'])
<div>
    <h1>{{$service->title}}</h1>
    <p>{{$service->description}}</p>
    <a href="{{route('service.show', ['id' => $service->id])}}">{{__('Подробнее')}}</a>
</div>
