@extends('admin.adminbase')


@section('title',"Manage Categories |")



@section('content')
<div class="flex flex-1 flex-col gap-6">
    <div class="flex flex-1 mt-2 justify-between items-center p-5">
        <h2 class="border-l-4 border-orange-600 pl-2">Manage Categories</h2>
        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Create Category
        </button>
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Inset Category
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="mb-3 flex flex-col">
                            <label for="">Main Category</label>
                            <select type="text" class="border rounded px-3 py-2 text-xl" name="parent_id">
                                <option value="">Main Category</option>
                                @foreach ($mainCategories as $item )
                                <option value="{{$item->id}}">{{$item->cat_title}}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                            <p class="text-xs text-red-500" {{$message}}></p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="">Category Title</label>
                            <input type="text" class="border rounded px-3 py-2 text-xl" name="cat_title">
                            @error('cat_title')
                            <p class="text-xs text-red-500" {{$message}}></p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="">Category Description</label>
                            <textarea rows="6" type="text" class="border rounded px-3 py-2 text-xl" name="cat_description"></textarea>
                            @error('cat_description')
                            <p class="text-xs text-red-500" {{$message}}></p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col">

                            <input type="submit" class="bg-teal-500 text-white px-3 py-2 rounded hover:bg-teal-800" value="create category">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="flex flex-1">
        @session('error')
        <div class="bg-red-500 text-white p-5 w-full rounded shadow-lg">
            {{session('error')}}
        </div>
        @endsession
        @session('success')
        <div class="bg-green-500 text-white p-5 w-full rounded shadow-lg">
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
                        Category Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category parent
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat )
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{$cat->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$cat->cat_title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cat->cat_slug}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cat->cat_description}}
                    </td>
                    <td class="px-6 py-4">
                        @if ($cat->parent == NULL)
                        {{"main Category"}}
                        @else
                        {{$cat->parent->cat_title}}
                        @endif
                    </td>
                    <td class="px-6 py-4 flex gap-1 ">
                        <button type="button" data-modal-target="editbox{{$cat->id}}" data-modal-toggle="editbox{{$cat->id}}" class="bg-blue-500 hover:bg-blue-800 text-white px-3 py-2 rounded">Edit</button>

                        <!-- Main modal -->
                        <div id="editbox{{$cat->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit {{$cat->cat_title}}`s Category Record
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editbox{{$cat->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <form action="{{route('category.update',$cat)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3 flex flex-col">
                                                <label for="">Main Category</label>
                                                <select type="text" class="border rounded px-3 py-2 text-xl" name="parent_id">
                                                    @if ($cat->parent == NULL)
                                                        <option value="">Main Category</option>
                                                    @else
                                                    <option value="">{{$cat->parent->cat_title}}</option>
                                                    @endif


                                                    @foreach ($mainCategories as $item )
                                                    <option value="{{$item->id}}">{{$item->cat_title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                <p class="text-xs text-red-500" {{$message}}></p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="">Category Title</label>
                                                <input type="text" value="{{$cat->cat_title}}" class="border rounded px-3 py-2 text-xl" name="cat_title">
                                                @error('cat_title')
                                                <p class="text-xs text-red-500" {{$message}}></p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="">Category Description</label>
                                                <textarea rows="6" type="text" class="border rounded px-3 py-2 text-xl" name="cat_description">{{$cat->cat_description}}</textarea>
                                                @error('cat_description')
                                                <p class="text-xs text-red-500" {{$message}}></p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 flex flex-col">

                                                <input type="submit" class="bg-teal-500 text-white px-3 py-2 rounded hover:bg-teal-800" value="Update category">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <form action="{{route('category.destroy',$cat->id)}}" method="post">
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