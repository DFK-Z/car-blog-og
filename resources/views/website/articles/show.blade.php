<x-app :title="$title">
    <x-container>
        <div class="w-full flex justify-between items-center  ">
            <div class="swiper mySwiper max-w-[300px] ">
                <div class="swiper-wrapper"> @foreach ($article->images as $image)
                    <div class="swiper-slide"> <img src="{{ $image ? url('storage', $image) : asset('asset/image/none.png') }}" />
                    </div> @endforeach </div> <div class="swiper-pagination"></div> <div class="swiper-button-next"></div> <div class="swiper-button-prev">
                        </div> </div>
            <div class="w-full flex-col flex ml-10">
                <h3 class="text-black font-bold text-[28px]" >{{$article->name}}</h3>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-[19px] mb-[30px]">{{ Str::limit($article->small_text, ) }}</p>
                @if ($article->documents)
                <div class=" ">

                    <div class="">
                        @foreach ($article->documents as $document )
                        <a class="py-[10px] px-[15px] bg-black text-white rounded-[8px] hover:bg-gray-700" href="{{$document}}" download="" > Скачать документ</a>
                        @endforeach
                   </div>
                </div>
                @endif

            </div>
        </div>
        </div>
</x-container>
</x-app>
