<x-app :title="$title">
    <x-container>
        <div class="grid gap-4 mb-10">
    @foreach ($categories as $category )
    <div
    class="me-4 block rounded-lg bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface p-4 border-1 border-gray-400/80">
    <div class="p-6">
      <h5
        class="mb-2 text-xl font-medium leading-tight">
       {{$category->name}}
      </h5>
      <p class="mb-4 text-base">
        С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту.
      </p>
      <a
        type="button"
        href="{{route("categories.CategoryPost", $category->id)}}"
        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white bg-blue-500 hover:bg-blue-600 shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
        Перейти
      </a>
    </div>
  </div>
  @endforeach
</div>
</x-container>
</x-app>
