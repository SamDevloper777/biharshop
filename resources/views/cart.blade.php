@extends('layout')

@section('content')
@php
 $total_amount=0;
 $total_discount = 0;
 $total_discount_amount = 0;
 $total_tax = 0;
 $total_payable = 0;     
@endphp

<div class="flex flex-1 flex-col gap-3 px-[5%] py-5">

    <div class="flex-1">
        <h2 class="text-black font-bold text-3xl mb-4">My Cart(3)</h2>
    </div>
    <div class="flex w-full gap-5 ">
        <div class="w-9/12">
            @foreach ($order->orderItem as $item )
            @php
             $total_amount += $item->qty* $item->product->price;
             $total_discount_amount += $item->qty* $item->product->discount_price;
             $total_discount = $total_amount - $total_discount_amount;
             $total_tax = $total_discount * 0.18;
             $total_payable= $total_discount + $total_tax;
            @endphp
            <div class="flex w-full items-center gap-5 mb-3 bg-slate-100 p-5">
                <img class="size-32 rounded-sm" src="/images/{{$item->product->featured_image}}" alt="">
                <div class="font-medium flex flex-col gap-5 ">
                    <div>{{$item->product->name}}</div>
                     
                    <div>{{$item->product->discount_price}}
                            <del class="text-xs text-slate-500">{{$item->product->price}}</del>
                        </div>
                    <div class="text-sm flex flex-1 mt-5  items-center gap-3 text-gray-500">
                      
                         <a href="{{route('removeFromCart',$item->product->slug)}}" class="bg-red-500 text-white px-3 py-2">-</a>
                         <span>{{$item->qty}}</span>
                         <a href="{{route('addToCart',$item->product->slug)}}" class="bg-green-500 text-white px-3 py-2">+</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-3/12">
            

<div class="w-full text-md font-medium text-gray-900 bg-white border border-gray-200 rounded-lg ">
    <button aria-current="true" type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right text-white bg-blue-700 border-b border-gray-200 rounded-t-lg cursor-pointer focus:outline-none">
        Price details
    </button>
    <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
        Total Price
        <span class="float-end font-normal">Rs. {{$total_amount}}</span>
    </div>
    <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer focus:outline-none focus:ring-2 bg-green-200">
        Total Discount
        <span class="float-end font-normal">Rs.{{$total_discount}}</span>
    </div>
    <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
        Total TAX(GST 18%)
        <span class="float-end font-normal">Rs.{{$total_tax}}</span>
    </div>
    <!-- <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer bg-orange-300">
        Total CD(FIRST 50)
        <span class="float-end font-normal">Rs. 4000/-</span>
    </div> -->
    <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer">
        Total Payable Amount
        <span class="float-end font-normal text-xl">Rs.{{$total_payable}}</span>
    </div>
   
</div>

        </div>

    </div>


</div>
@endsection