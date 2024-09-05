@extends('layout')

@section('content')


<div class="flex justify-center h-screen flex-1 items-center">
    <div class="w-full max-w-xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 ">
        <form class="space-y-6" action="{{route('register')}}" method="post">
            @csrf
            <h5 class="text-xl font-medium text-gray-900">Sign in to our platform</h5>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your name</label>
                <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="denice riche" required />
                @error('name')
                <p class="text-red-500 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 ">Your contact</label>
                <input type="contact" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="ex-9876564236" required />
                @error('contact')
                <p class="text-red-500 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="name@company.com" required />
                @error('email')
                <p class="text-red-500 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                @error('password')
                <p class="text-red-500 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>
          
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create an account</button>
            <div class="text-sm font-medium text-gray-500">
                Already have an account? <a href="{{route('login')}}" class="text-blue-700 hover:underline">Login here</a>
            </div>
        </form>
    </div>

</div>


@endsection