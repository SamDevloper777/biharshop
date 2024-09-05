@extends('admin.adminbase')


@section('title',"Manage Products |")



@section('content')
<div class="flex flex-1 flex-col gap-6">
    <div class="flex flex-1 mt-2 justify-between items-center p-5">
        <h2 class="border-l-4 border-orange-600 pl-2 text-xl">Manage Products ({{count($products)}})</h2>
      
        <a href="{{route('products.create')}}" class="bg-teal-500 text-white px-3 py-2 rounded">Create Product</a>
    </div>

  


    <div class="flex flex-1">
        @session('error')
        <div class="bg-red-500 text-white p-5 w-full rounded shadow-lg">
            {{session('error')}}
        </div>
        @endsession
        @session('success')
        <div class="bg-red-500 text-white p-5 w-full rounded shadow-lg">
            {{session('success')}}
        </div>
        @endsession
    </div>
    <div class="relative overflow-x-auto w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                         Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                         slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pro )
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{$pro->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$pro->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->slug}}
                    </td>
                    <td class="px-6 py-4">
                       <img src="/images/{{$pro->featured_image}}" width="100px" height="auto" alt="">
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->brand}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->category->cat_title}}
                    </td>
                    <td class="px-6 py-4">
                        <span>{{$pro->discount_price}}</span>
                       <del> {{$pro->price}}</del>
                    </td>
                    <td class="px-6 py-4 flex gap-1 ">
                        <button type="button" data-modal-target="editbox{{$pro->id}}" data-modal-toggle="editbox{{$pro->id}}" class="bg-blue-500 hover:bg-blue-800 text-white px-3 py-2 rounded">Edit</button>
 

                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-800 text-white px-3 py-2 rounded ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection