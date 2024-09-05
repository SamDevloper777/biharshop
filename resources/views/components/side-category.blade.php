

<div class="w-full text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white flex flex-col">

    @foreach ($mainCategories as $cat)
    <a href="" aria-current="true" type="button" class="w-full flex-1 px-8 py-2 font-medium text-left rtl:text-right text-white bg-blue-700 border-b border-gray-200  cursor-pointer focus:outline-none dark:bg-gray-800 dark:border-gray-600">
        {{$cat->cat_title}}
    </a>
    @endforeach

  
</div>
