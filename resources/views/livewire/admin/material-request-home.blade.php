<div>

    @inject('carbon', 'Carbon\Carbon')


    <div class="card">

        <div class="card-header">
            <div class="card-heading">MATERIAL REQUEST</div>
        </div>

        <div class="card-body">

            {{-- @livewire('material-request-module.material-request-list-for-home') --}}

                @isset($material_requests)

                        <form action="">
                            <div class="form-group flex">
                                <select name="" id="" class="form-controll uppercase" wire:model.change = "searchType">
                                    <option value="">Search By</option>
                                    <option value="sub_cm">sub cm</option>
                                    <option value="equipment">Equipment</option>
                                    <option value="tag">Tag</option>
                                    <option value="sparePartName">Spare Part Name</option>
                                    <option value="sparePartNumber">Spare Part Number</option>
                                </select>
                                <input type="text" name="" id="" class="form-controll" placeholder="Input" wire:model.live="searchValue">
                            </div>
                        </form>



                    <div class="grid grid-cols-12 gap-2 p-4 bg-red-500 text-white  font-bold my-2 rounded-sm uppercase">
                        {{-- <div>mr#</div> --}}
                        {{-- <div>cm</div> --}}
                        <div class="flex items-center">sub cm </div>
                        <div class="flex items-center">equipment</div>
                        <div class="col-span-6">
                            <div class="flex justify-between  bg-blue-100 p-3 my-1 rounded-md text-black">

                                <div class="mx-2">equipment tag</div>
                                <div class="mx-2">s p number</div>
                                <div class="mx-2">s p name</div>
                                <div class="mx-2">qty</div>
                            </div>
                        </div>

                        <div class="col-span-2 flex justify-between space-x-24">

                            <div class="">
                                request date
                            </div>

                             <div class="">
                                expected date
                            </div>
                        </div>

                    </div>

                    @if ($material_requests->isNotEmpty())



                        @foreach ($material_requests as $item)

                            @php $expectedDate = Carbon\Carbon::parse($item->expected_date)->toDateString() @endphp
                            @php $today = Carbon\Carbon::parse(now())->toDateString() @endphp
                            @php $remaingDays = Carbon\Carbon::parse(now()->toDateString())->diff($expectedDate) @endphp
                            @php $remaingDays1 = Carbon\Carbon::parse($expectedDate)->diffForHumans(Carbon\Carbon::now()) @endphp


                        <div class="grid grid-cols-12 gap-2 p-4 bg-red-200  text-black my-2 rounded-md uppercase text-[14px]">

                            <div class="flex items-center  hover:underline">
                                <a href="{{ route('admin_cm_show', ['id' => $item->cm->id])}}" target="_blank">
                                    {{ $item->sub_cm }}</a>
                            </div>
                            <div class="flex items-center hover:underline">
                                <a href="{{ route('admin_equipment_show',['id' => $item->cm->equipment->id]) }}" target="_blank" >
                                    {{ $item->cm->equipment->equipment }}</a>
                                </div>

                                    @isset($item->materialRequestItems)

                                        @if ($item->materialRequestItems->isNotEmpty())

                                            <div class="col-span-6">
                                                @foreach ($item->materialRequestItems as $mritems)
                                                    <div class="flex items-center bg-blue-100 p-3 my-1 rounded-md">

                                                        <div class="basis-2/6 hover:underline">
                                                            <a href="{{ route('admin_tag_show', ['id'=> $mritems->equipmentTag->id]) }}" target="_blank">
                                                                {{ $mritems->equipmentTag->equipment_tag }}</a>
                                                            </div>
                                                            <div class="basis-2/6">{{ $mritems->sparePart->spare_part_number }}</div>
                                                        <div class="basis-2/6">{{ $mritems->sparePart->spare_part_name }}</div>
                                                        <div class="rounded-full border border-blue-400 p-3">{{ $mritems->qty }}</div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            @else
                                            <div class="col-span-6">
                                                <div class="flex justify-between items-center bg-blue-100 p-3 my-1 rounded-md">

                                                        <div class="emptyData">NA</div>
                                                        <div class="emptyData">NA</div>
                                                        <div class="emptyData">NA</div>
                                                        <div class="emptyData">NA</div>
                                                </div>
                                            </div>

                                        @endif

                                    @endisset

                            <div class="col-span-2 flex justify-between mx-2">
                                <div class="flex items-center">{{ $item->date }}</div>
                                <div class="flex items-center mx-2  p-2">{{ $expectedDate}}</div>
                            </div>


                                        @if ($expectedDate < $today )
                                            <x-button class="btn btn-close col-span-2">Expired</x-button>
                                        @else
                                            <x-button class="btn btn-submit col-span-2" >{{ $remaingDays }}</x-button>
                                        @endif


                        </div>

                        @endforeach

                         {{-- {{ $material_requests->links() }} --}}



                    @else

                    <div class="emptyData">Sorry!, No Material Requests are found!!!</div>

                    @endif

                @endisset



        </div>

    </div>


    {{-- For Reminder --}}





</div>
