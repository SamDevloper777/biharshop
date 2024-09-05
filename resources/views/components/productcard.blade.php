

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
    <a href="{{route('view.product',[
    'category'=>$product->category->cat_title,
    'slug'=>$product->slug,
    ])}}">
        <img class=" w-full object-cover" src="/images/{{$product->featured_image}}" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a  href="{{route('view.product',[
    'category'=>$product->category->cat_title,
    'slug'=>$product->slug,
    ])}}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{$product->name}}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
     
        </div>
        <div class="flex items-center justify-between">
            <span class="text-sm font-semibold text-gray-900 ">₹{{$product->discount_price}} <del class="text-slate-500">₹{{$product->price}}</del></span>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
        </div>
    </div>
</div>
