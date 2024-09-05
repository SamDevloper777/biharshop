<nav class="bg-gray-50 ">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="#" class="text-gray-900  hover:underline" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900  hover:underline">Company</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900  hover:underline">Team</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900  hover:underline">Features</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<nav class="bg-white border-gray-200 ">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="{{route('homepage')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">{{env('APP_NAME')}}</span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="tel:5541251234" class="text-sm  text-gray-500  hover:underline">(555) 412-1234</a>
            @guest
            <a href="{{route('login')}}" class="text-sm  text-blue-600 ">Login</a>
            <a href="{{route('register')}}" class="text-sm  text-blue-600 ">SignUp</a>
            @endguest

            @auth
            <div id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 flex items-center justify-center bg-orange-500 rounded-full cursor-pointer"  alt="User dropdown">
            <span class="font-medium text-white uppercase">{{substr(auth()->user()->name,0,2)}}</span>
            </div>

            <!-- Dropdown menu -->
            <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
                <div class="px-4 py-3 text-sm text-gray-900">
                    <div>{{auth()->user()->name}}</div>
                    <div class="font-medium truncate">{{auth()->user()->email}}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 " aria-labelledby="avatarButton">
                    <li>
                        <a href="#" class="block px-4 py-2 ">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 ">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 ">Earnings</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700 ">Sign out</a>
                </div>
            </div>


            <a href="{{route('cart')}}" class="relative inline-flex items-center p-2 text-sm font-medium text-center ring-1 rounded-lg">
                <span>Cart</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <span class="sr-only">cart</span>
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">20</div>
            </a>

            @endauth

        </div>







    </div>
</nav>