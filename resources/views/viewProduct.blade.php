@extends ('layout')

@section('content')
<div class="flex px-[5%]">
    <div class=" flex-[.6] mt-5 gap-5">
        <img src="/images/{{$product->featured_image}}" class="w-full" alt="">
    </div>
    <div class="flex-[1.4] flex flex-col justify-between px-5">
        <h1 class="text-2xl font-semibold">{{$product->name }}</h1>
        <p>category:{{$product->category->cat_title }}</p>

        <div class="flex divide-x my-3">
            <div class="flex justify-center gap-3 flex-col p-3">
                <h1 class="text-4xl">₹{{$product->discount_price}}</h1>
                <p class="text-xs text-salte-500">All Tax Included</p>
            </div>
            <div class="flex flex-1 justify-center gap-3 flex-col p-3">
                <h1 class="text-xl text-slate-500 ">MRP:<del class="">₹{{$product->price}}</del></h1>
                <p class="text-lg text-green-600">10% saving</p>
            </div>
        </div>
        <div class="flex flex-1 gap-3 items-start">
            <a href="{{route('addToCart',$product->slug)}}" class="bg-teal-500 text-white px-3 py-2 ">Add to Cart</a>
            <a href="" class="bg-orange-500 text-white px-3 py-2">Buy to Cart</a>
        </div>
    </div>
</div>

@endsection