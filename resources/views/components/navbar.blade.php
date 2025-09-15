<div x-data="{ open: false }"
    class="bg-white flex justify-between items-center list-none p-4 "
>

    <div class="w-44  p-2">

        <img src="/images/logo.jpg" />
    </div>

    <nav class="flex  justify-between items-center">
        {{-- <a href="{{ route('cmHome') }}"><li class="p-2 border-b border-b-orange-300 bg-slate-400 text-blue"></li></a> --}}
        {{-- <a href="{{ route('admin_technician') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-blue">TECHNICIAN</li></a> --}}


        <a href="{{ route('dashBoard') }}">
            <li class="p-2 hover:border hover:border-orange-300   text-blue">DASHBOARD</li></a>

        <a href="{{ route('admin_equipment') }}">
            <li class="p-2 hover:border hover:border-orange-300   text-blue">EQUIPMENT</li></a>

        <a href="{{ route('admin_tags') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-blue">EQUIPMENT TAGS</li></a>
        <a href="{{ route('cmHome') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-blue">CM</li></a>
        <a href="{{ route('admin_meterial_request') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-blue">MATERIAL REQUEST</li></a>
        <a href="{{ route('admin_batch_orders') }}">
            <li class="p-2 hover:border hover:border-orange-300    text-blue">BATCH ORDERS</li></a>
        <a href="{{ route('admin_spare_parts') }}">
            <li class="p-2 hover:border hover:border-orange-300  border-b-orange-300  text-blue">SPARE PARTS</li>
        </a>
        @guest

            <a href="{{ route('login') }}">
                <x-button class="btn btn-submit">LOGIN</x-button>
            </a>
        @endguest
        {{-- <a href="">
            <li class="p-2 hover:border hover:border-orange-300    text-blue">SERVICE DES</li></a> --}}


            @auth
            <!-- Settings Dropdown -->
            <div class="xs:text-[10px] sm:flex sm:items-center sm:ms-6 xs:block ">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            @auth

                                <div>{{ Auth::user()->name }}</div>
                            @endauth

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
     @endauth
    </nav>


    {{-- MOBILE MENU FOR SMALL SCREEN --}}
{{--
    <div class="bg-blue-500 xs:text-[10px] p-2 sm:hidden ">

    <div class="p-2 cursor-pointer" x-on:click="open = ! open">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
        </svg>

    </div>

    <div class=" relative">

        <div class="bg-white absolute z-20 w-full h-screen top-0 -left-2"  x-show="open">
                <ul class="divide-y-2">
                    <li class="p-3 text-[14px] text-blue-800 font-bold">DASHBOARD</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">EQUIPMENT</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">EQUIPMENT TAGS</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">CM</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">MATERIAL REQUEST</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">BADGE ORDER</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">SPARE PARTS</li>
                    <li class="p-3 text-[14px] text-blue-800 font-bold">LOGIN</li>
                </ul>
        </div>
    </div>


    </div> --}}


</div>
