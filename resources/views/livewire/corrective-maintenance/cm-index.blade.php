<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <div>CORRECTIVE MAINTENANCE LISTS</div>
                <a href="{{ route('admin_create_cm') }}">
                    <x-button class="btn btn-blue">NEW CM</x-button>
                </a>
            </div>
        </div>

        <div class="card-body">

            <div class="form-group">
                <select type="" class="form-controll">
                    <option value="">Status</option>
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                </select>
            </div>


                    {{-- @dump($cms->count()) --}}

                    @if ($cms->count() > 1)

                        <div class="grid grid-cols-12 gap-1 w-full border-b uppercase bg-slate-200 p-2 rounded-t-md">
                            <div class="">#</div>
                            <div class="">CM NO</div>
                            <div class=" col-span-2">REQ DATE</div>
                            <div class=" col-span-2">TECHNICIAN</div>
                            <div class=" col-span-3">ITEM</div>
                            <div class="">STATUS</div>
                            <div class=" col-span-3" ></div>
                        </div>

                            @foreach ($cms as $item)

                            <div class="grid grid-cols-12 gap-1 items-center space-y-2 mt-2 uppercase text-sm
                                @if ( $item->status == 'completed')
                                        bg-green-200
                                    @endif
                             ">

                                {{-- cm number section --}}

                                    <div class="ml-2">{{ $item->id }}</div>

                                    <div class=" rounded-full w-16 h-16 bg-zinc-500 flex justify-center items-center text-white">
                                        {{$item->cm_number}}
                                    </div>


                                    <div class=" col-span-2">{{ $item->request_date }}</div>
                                    <div class=" col-span-2 ">{{ $item->technician->name }}</div>


                                    <div class=" col-span-3 flex flex-col">
                                        <span class="">{{ $item->item->item}}</span>
                                        <div>{{ $item->remarks }}</div>
                                    </div>

                                    <div class="">{{ $item->status }}</div>

                                    <section class=" tems-center col-span-2 p-2 flex">

                                        <a href="{{ route('admin_cm_show', ['id' => $item->id])}}">
                                            <x-button class="btn btn-blue">VIEW</x-button>
                                        </a>
                                        <x-button class="btn btn-close">Edit</x-button>
                                        {{-- <x-button class="btn btn-close">DELETE</x-button> --}}
                                    </section>
                            </div>

                            @endforeach

                    @else

                    <x-button class="btn-btn-info">NO CMS CREATED</x-button>

                    @endif

            </ul>

            <div class="mt-2">
                {{ $cms->links() }}
            </div>



        </div>

    </div>




























</div>
