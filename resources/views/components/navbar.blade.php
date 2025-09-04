<div x-data="{ open: false }" >
    <nav class="bg-blue-500 flex justify-between list-none p-4">
        {{-- <a href="{{ route('cmHome') }}"><li class="p-2 border-b border-b-orange-300 bg-slate-400 text-white"></li></a> --}}
        {{-- <a href="{{ route('admin_technician') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">TECHNICIAN</li></a> --}}


        <a href="{{ route('dashBoard') }}">
            <li class="p-2 hover:border hover:border-orange-300   text-white">DASHBOARD</li></a>

        <a href="{{ route('admin_equipment') }}">
            <li class="p-2 hover:border hover:border-orange-300   text-white">EQUIPMENT</li></a>

        <a href="{{ route('admin_tags') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">EQUIPMENT TAGS</li></a>
        <a href="{{ route('cmHome') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">CM</li></a>
        <a href="{{ route('admin_meterial_request') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">MATERIAL REQUEST</li></a>
        <a href="{{ route('admin_batch_orders') }}">
            <li class="p-2 hover:border hover:border-orange-300    text-white">BATCH ORDERS</li></a>
        <a href="{{ route('admin_spare_parts') }}">
            <li class="p-2 hover:border hover:border-orange-300  border-b-orange-300  text-white">SPARE PARTS</li></a>
        {{-- <a href="">
            <li class="p-2 hover:border hover:border-orange-300    text-white">SERVICE DES</li></a> --}}


            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
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
</div>
