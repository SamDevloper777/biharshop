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

            if($order->coupon_id != Null):
            $total_payable-=$order->coupon->amount;
            endif
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
                @if ($order->coupon_id !=null)
                <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer bg-orange-300">
                    Total CD{{$order->coupon->code}}
                    <span class="float-end font-normal">Rs.{{$order->coupon->amount}}/-</span>
                </div>

                @endif
                <div type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right border-b border-gray-200 cursor-pointer">
                    Total Payable Amount
                    <span class="float-end font-normal text-xl">Rs.{{$total_payable}}</span>
                </div>

            </div>

            <div class="border w-full bg-white shadow-lg mt-4 p-5">
                @if($order->coupon_id == NULL)

                <form action="{{route('coupon.add')}}" method="post">
                    @csrf
                    <input type="text" name="coupon_code" class="border px-3 py-2 rounded flex-1 gap-2" placeholder="enter coupon code here">
                    <input type="submit" class="bg-orange-600 text-white px-3 py-2 rounded">
                </form>
                @else
                <p class="text-xl">Coupon Applied:<span class="bg-green-600 text-white px-3 py-2 rounded">{{$order->coupon->code}}

                    </span>
                    <a href="{{route('coupon.remove', $order->coupon_id)}}" class=" float-end text-red-600 text-lg font-black">X</a>

                </p>
                @endif

                @session('coupon_error')
                <div class="text-red-600 text-xs">
                    {{session('coupon_error')}}
                </div>
                @endsession

                <div class="flex flex-1 justify-between p-5">
                    <a href="{{route("homepage")}}" class="bg-salte-900 text-white px-3 py-2">More Shopping</a>
                    <a href="{{route('checkout')}}" class="bg-orange-500 text-white px-3 py-2">Checkout</a>
                </div>

            </div>


        </div>

    </div>


</div>
@endsection