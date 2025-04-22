<x-container>
    <header class="flex justify-between items-center bg-blue-900 drop-shadow-sm py-4 px-8 mb-15">
        <a href="/" class="text-lg font-bold text-blue-200 hover:text-white">
            База Знаний
        </a>
        <nav class="hidden md:flex">
          <ul class="flex flex-row gap-2 text-white">
            <li>
                <a href="{{ route('categories.index') }}" class="inline-flex py-2 px-3 bg-orange-400 rounded-lg hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-500 dark:hover:bg-orange-500 dark:focus:ring-orange-600">Категории</a>
            </li>
          </ul>
        </nav>
      </header>
</x-container>
