@extends('layout')

@section('title')

home page

@endsection

@section('content')

<x-banner />

<div class="w-full flex flex-1 px-[5%] flex-col py-5">
    <div class="flex flex-1">
        <h2 class="border-l-4 border-orange-600 pl-2">{{$category->cat_title}}</h2>
    </div>
    <div class="grid grid-cols-4 gap-5  mt-5">

    
        @foreach ($category->products as $product )
            <x-productcard :product="$product" />
        @endforeach
    </div>
</div>

@endsection