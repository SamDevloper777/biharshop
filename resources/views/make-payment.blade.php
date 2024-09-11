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
        <h2 class="text-black font-bold text-3xl mb-4">Make Payment offline or online</h2>
    </div>
    <div class="flex flex-1 gap-5">
    <div class="w-3/12">
         <div class="flex flex-col gap-2">
            <label for="payment_method" class="font-black text-lg ">Payment Method</label>
            <select name="payment_method" class="px-3 py-2 border rounded-md" id="payment_method">
                <option  class="px-3 py-2 " value=""  >selected disbaled</option>
                <option  class="px-3 py-2 " value="online"  >online</option>
                <option  class="px-3 py-2 " value="offline"  >offline</option>
            </select>
         </div>
    </div>
    </div>

       
        <div class="w-3/12 space-y-5">



        </div>


    </div>

</div>


</div>
@endsection