<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">Batch Orders</div>
        </div>

        <div class="card-body">



                @isset($batchOrders)

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
                        <div class="flex items-center">mr #</div>
                        <div class="flex items-center">sub cm</div>
                        <div class="flex items-center">batch no</div>
                        <div class="flex items-center">receving date</div>
                        <div class="flex items-center">equipment</div>
                        {{-- <div class="flex items-center">supplier</div> --}}
                        <div class="col-span-7">
                            <div class="flex items-center bg-blue-100 p-3 my-1 rounded-md text-black">
                                <div class="basis-4/12">equipment tag</div>
                                <div class="basis-3/12">s p number</div>
                                <div class="basis-3/12">s p name</div>
                                <div class="basis-1/12">qty</div>
                                <div class="basis-1/12">u .price</div>
                                <div class="basis-1/12">total</div>
                            </div>
                        </div>

                    </div>

                    @if ($batchOrders->isNotEmpty())

                            @foreach ($batchOrders as $item)

                                <div class="grid grid-cols-12 gap-2 p-4 bg-red-200  text-black my-2 rounded-md uppercase text-[14px]">

                                    <div class="flex items-center  hover:underline">{{ $item->id }}</div>
                                    <div class="flex items-center  hover:underline">
                                        <a href="{{ route('admin_cm_show', ['id' => $item->materialRequest->cm->id])}}" target="_blank">{{ $item->materialRequest->sub_cm }}</a>
                                    </div>
                                    <div class="flex items-center  hover:underline">{{ $item->batch_no }}</div>
                                    <div class="flex items-center  hover:underline">{{ $item->receiving_date }}</div>
                                    <div class="flex items-center  hover:underline">
                                        <a href="{{ route('admin_equipment_show',['id' => $item->materialRequest->cm->equipment->id]) }}" target="_blank" >
                                        {{ $item->materialRequest->cm->equipment->equipment }}</a></div>

                                            @isset($item->batchOrderItems)

                                                @if ($item->batchOrderItems->isNotEmpty())

                                                    <div class="col-span-7">
                                                        @foreach ($item->batchOrderItems as $bitems)
                                                            <div class="flex items-center bg-blue-100 p-3 my-1 rounded-md">

                                                                <div class="basis-4/12 hover:underline">
                                                                    <a href="{{ route('admin_tag_show', ['id'=> $bitems->equipmentTag->id]) }}" target="_blank">
                                                                        {{ $bitems->equipmentTag->equipment_tag }}</a>
                                                                    </div>
                                                                <div class="basis-3/12">{{ $bitems->sparePart->spare_part_number }}</div>
                                                                <div class="basis-3/12">{{ $bitems->sparePart->spare_part_name }}</div>
                                                                <div class="basis-1/12 rounded-full border border-blue-400 p-3">{{ $bitems->qty }}</div>
                                                                <div class="basis-1/12 p-3"><x-price price="{{ $bitems->unit_price }}"></x-price></div>
                                                                <div class="basis-1/12 p-3"><x-price price="{{ $bitems->total }}"></x-price></div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    @else

                                                    <div class="col-span-7">
                                                        <div class="flex justify-between items-center bg-blue-100 p-3 my-1 rounded-md">

                                                                <div class="emptyData">NA</div>

                                                        </div>
                                                    </div>

                                                @endif

                                            @endisset


                                </div>


                            @endforeach

                         {{-- {{ $material_requests->links() }} --}}



                     @else

                    <div class="emptyData">Sorry!, No Batch Orders are found!!!</div>

                    @endif

                @endisset




        </div>




    </div>
















</div>
