@extends('admin.adminbase')

@section('title',"Dashboard |")


@section('content')
<div class="flex flex-1 flex-col gap-6">
                <div class="flex flex-1 mt-2">
                    <h2 class="border-l-4 border-orange-600 pl-2">Static</h2>
                </div>
                <div class="grid grid-cols-4 gap-5">
                    <div class="flex flex-col items-center justify-center bg-slate-100 px-5 py-3 rounded-md">
                        <dt class="mb-2 text-3xl font-extrabold">72+</dt>
                        <dd class="text-gray-500">Developers</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-slate-100 px-5 py-3 rounded-md">
                        <dt class="mb-2 text-3xl font-extrabold">72+</dt>
                        <dd class="text-gray-500">Developers</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-slate-100 px-5 py-3 rounded-md">
                        <dt class="mb-2 text-3xl font-extrabold">72+</dt>
                        <dd class="text-gray-500">Developers</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-slate-100 px-5 py-3 rounded-md">
                        <dt class="mb-2 text-3xl font-extrabold">72+</dt>
                        <dd class="text-gray-500">Developers</dd>
                    </div>
                </div>
                <div class="flex flex-1">
                    <h2 class="border-l-4 border-orange-600 pl-2">Recent Order</h2>
                </div>
                <!-- recent order area -->


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                                <td class="px-6 py-4">
                                    Laptop
                                </td>
                                <td class="px-6 py-4">
                                    $2999
                                </td>
                            </tr>
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Microsoft Surface Pro
                                </th>
                                <td class="px-6 py-4">
                                    White
                                </td>
                                <td class="px-6 py-4">
                                    Laptop PC
                                </td>
                                <td class="px-6 py-4">
                                    $1999
                                </td>
                            </tr>
                            <tr class="bg-white ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


@endsection