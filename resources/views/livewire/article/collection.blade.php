<x-container>
<div class="mb-10">
   @if ($articles->isNotEmpty())
   <div class="flex flex-wrap gap-[30px]">
@foreach ($articles as $article )
<div class="flex flex-wrap gap-[40px]">
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
<div class="flex">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($article->images as $image)
            <div class="swiper-slide">
                <img src="{{ $image ? url('storage',  $image) : asset('asset/img/image.png') }}" />
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<div class="p-5">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->name }}
        </h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{Str::limit($article->small_text, 20 ) }}</p>
    <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-400 rounded-lg hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-500 dark:hover:bg-orange-500 dark:focus:ring-orange-600" href="{{route('articles.show', $article->id) }}">Подробнее</a>
</div>
</div>
</div>
@endforeach
       @else
       {{  ("Записей нет")  }}
   @endif
</div>
</div>
</x-container>
