<div class="flex flex-1 overflow-x-scroll w-full my-5 mt-4 px-[10%]">
    @foreach ($categories as $cat )
        <a href="{{route('view.filter',$cat->cat_slug )}}" class=" border min-w-48 py-4  px-3 text-center text-xl flex justify-center items-center rounded-full bg-teal-400 hover:bg-tral-600">
            <h2 class="font-semibold">{{$cat->cat_title}}</h2>
        </a>
    @endforeach
</div>