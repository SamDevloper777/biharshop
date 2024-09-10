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
            <form action="{{route('address.store')}}" method="post" class="grid grid-cols-2 gap-4">
                @csrf
                <div class="mb-3">
                    <label for="full_name" class="block text-sm font-semibold text-gray-700">Name</label>
                    <input type="text" id="full_name" name="full_name" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('full_name')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact" class="block text-sm font-semibold text-gray-700">contact</label>
                    <input type="number" id="contact" name="contact" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('contact')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="street" class="block text-sm font-semibold text-gray-700">street</label>
                    <input type="text" id="street"  name="street" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('street')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="area" class="block text-sm font-semibold text-gray-700">area</label>
                    <input type="text" id="area" name="area" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('area')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city" class="block text-sm font-semibold text-gray-700">city</label>
                    <input type="text" id="city" name="city" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('city')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="landmark" class="block text-sm font-semibold text-gray-700">landmark</label>
                    <input type="text" id="landmark" name="landmark" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('landmark')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="state" class="block text-sm font-semibold text-gray-700">state</label>
                    <input type="text" id="state" name="state" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('state')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="block text-sm font-semibold text-gray-700">Type</label>
                    <select type="text" id="type" name="type" class="w-full px-3 py-2 text-gray-700 rounded-md">
                        <option value="" selected disabled>Select Type</option>
                        <option value="office">Office</option>
                        <option value="home">Home</option>
                    </select>
                    @error('type')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
               
                <div class="mb-3">
                    <label for="pincode" class="block text-sm font-semibold text-gray-700">pincode</label>
                    <input type="number" id="pincode" name="pincode" class="w-full px-3 py-2 text-gray-700 rounded-md">
                    @error('pincode')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <input type="submit" name="submit" value="Create New Address" class="w-full bg-green-600 text-white font-semibold hover:bg-green-500 px-3 py-2 rounded-md">
                </div>
            </form>

        </div>

        <div class="w-3/12">
            @foreach ($addresses as $address )
                <div class="border p-4">
                    <p>{{$address->full_name}}</p>
                    <p>{{$address->contact}}</p>
                    <p>{{$address->street}}</p>
                    <p>{{$address->area}}</p>
                    <p>{{$address->city}}</p>
                    <p>{{$address->landmark}}</p>
                    <p>{{$address->state}}</p>
                    <p>{{$address->type}}</p>
                    <p>{{$address->pincode}}</p>
                    <a href="" class="text-green-600">Edit</a>

                </div>
            @endforeach



        </div>


    </div>

</div>


</div>
@endsection