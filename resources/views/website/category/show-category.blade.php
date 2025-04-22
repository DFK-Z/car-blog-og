<x-app :title="$title">
    <x-container>
    @if ($articles->isNotEmpty())
    <div class="flex gap-20 flex-wrap">
    @foreach ($articles as $article )
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
        <div class="flex">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($article->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image ? url('storage',  $image) : asset('asset/image/none.png') }}" />
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
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($article->small_text, 20) }}</p>
            <div class="links">
                <div class="mb-6 mt-6">
                    @foreach ($article->documents as $document )
                    <a class="mb-5 py-[10px] px-[15px] bg-black text-white rounded-[8px] hover:bg-gray-700"  href="{{$document}}" download="" > Скачать документ</a>
                    @endforeach
               </div>
               <a href="{{route('articles.show', $article->id) }}" class="py-[10px] px-[15px] bg-blue-500 text-white rounded-[8px] hover:bg-blue-600""> Перейти к записи</a>
            </div>
        </div>

    </div>
  @endforeach
    @else
    <div class="py-[150px] text-center">
        <h1 class="text-[48px]">{{ __('В этой категории нет записей') }}</h1>
        <div class="mt-4">
            <a href="{{ route('categories.index') }}" class="text-blue-500 text-[24px]">Вернутся Назад</a>
        </div>
    </div>
    @endif
</div>
</x-container>
</x-app>
