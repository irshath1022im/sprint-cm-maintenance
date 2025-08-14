<div>

    <div class="card">
        <div class="card-header">

            <div class="card-heading flex  justify-between" >

                <span>MATERIAL REQUEST</span>

         {{-- @dump($equipment) --}}

                @isset($equipment)

                    @if($equipment->cmRequests->isNotEmpty())

                            <div>

                                {{-- <x-button class="btn btn-info">Total Spent:</x-button> --}}
                                {{-- <x-price price="{{ $equipment[0]->totalSpent}}"></x-price> --}}
                            </div>

                        </div>

                    </div>
                     {{-- header --}}

                        <div class="grid grid-cols-12 gap-2 p-4 bg-red-500 text-white  font-bold my-2 rounded-sm uppercase text-[13px]">
                                {{-- <div>mr#</div> --}}
                                {{-- <div>cm</div> --}}
                                <div class="flex space-x-2 col-span-4 justify-between">
                                    <div class="flex items-center">CM DATE</div>
                                    <div class="flex items-center ">CM NUMBER</div>
                                    <div class="flex items-center ">SUB CM</div>
                                    <div class="flex items-center ">MR DATE</div>
                                    <div class="flex items-center ">EXPECTED DATE</div>
                                </div>

                                <div class="col-span-4">
                                    <div class="flex justify-between  bg-blue-100 p-3 my-1 rounded-md text-black">

                                        <div class="mx-2">equipment tag</div>
                                        <div class="mx-2">s p number</div>
                                        <div class="mx-2">s p name</div>
                                        <div class="mx-2">qty</div>
                                    </div>
                                </div>

                                 <div class="col-span-4 flex justify-between  bg-blue-100  my-1 rounded-md text-black items-center">

                                        <div class="mx-2 basis-1/4">RECEIVING DATE</div>
                                        <div class="mx-2 basis-1/4">BADGE NO</div>
                                        <div class="mx-2 basis-1/4">U PRICE</div>
                                        <div class="mx-2 basis-1/4 text-right">TOTAL</div>

                                </div>



                        </div>

                        {{-- result --}}

                        <div class="divide-y-2">

                            @foreach ($equipment->cmRequests as $cmRequest)

                                <div class="grid grid-cols-12 gap-2 p-4 rounded-sm uppercase text-[13px]">

                                    <div class="col-span-4 flex space-x-2  justify-between  items-center">

                                        <div class="">{{ $cmRequest->request_date }}</div>
                                        <div class="">{{ $cmRequest->cm_number }}</div>


                                                @isset($cmRequest->materialRequest)
                                                            {{-- the materialRequest is hasOne relationship --}}

                                                            <div class="">{{ $cmRequest->materialRequest->sub_cm }}</div>
                                                            <div class="">{{ $cmRequest->materialRequest->date }}</div>
                                                            <div class="">{{ $cmRequest->materialRequest->expected_date }}</div>

                                                            @else
                                                                {{-- materialRequest is empty --}}

                                                        <div class="">NA</div>
                                                        <div class="">NA</div>
                                                        <div class=" ">NA</div>


                                                @endisset

                                    </div>


                                    <div class="col-span-4">

                                                @isset($cmRequest->materialRequest)


                                                                    @if ($cmRequest->materialRequest->materialRequestItems->isNotEmpty())

                                                                                @foreach ($cmRequest->materialRequest->materialRequestItems as $item)
                                                                                        <div class="flex justify-between  bg-blue-100 p-3 my-1 rounded-md text-black">
                                                                                            <div class="mx-2">{{ $item->equipmentTag->equipment_tag }}</div>
                                                                                            <div class="mx-2">{{ $item->sparePart->spare_part_number }}</div>
                                                                                            <div class="mx-2">{{ $item->sparePart->spare_part_name }}</div>
                                                                                            <div class="mx-2">{{ $item->qty }}</div>
                                                                                        </div>

                                                                                @endforeach


                                                                    @else

                                                                        <div class="emptyData">MATERIAL REQUEST ITEMS NOT FOUND</div>

                                                                    @endif

                                                    @else

                                                    <div class="emptyData">MATERIAL REQUEST  NOT FOUND</div>

                                                    @endisset

                                    </div>

                                    <div class="col-span-4 flex justify-between  bg-blue-100  my-1 rounded-md text-black items-center ">

                                            @isset($cmRequest->materialRequest)

                                                        @isset ($cmRequest->materialRequest->batchOrder)

                                                        <div class="basis-1/4 mx-2">{{ $cmRequest->materialRequest->batchOrder->receiving_date }}</div>
                                                                <div class="basis-1/4 mx-2">{{ $cmRequest->materialRequest->batchOrder->batch_no }}</div>

                                                                    @if ($cmRequest->materialRequest->batchOrder->batchOrderitems->isNotEmpty())

                                                                            @foreach ($cmRequest->materialRequest->batchOrder->batchOrderitems as $item)

                                                                               <div class="basis-1/4 mx-2"><x-price price="{{ $item->unit_price }}"></x-price></div>

                                                                               <div class="basis-1/4 mx-2 text-right"><x-price price="{{ $item->total }}"></x-price></div>
                                                                                {{-- <div>  <x-price price="{{ $item->total }}" /></div> --}}

                                                                            @endforeach


                                                                        @else

                                                                        <div class=" flex items-center">NA</div>
                                                                        <div class=" flex items-center">NA</div>

                                                                    @endif

                                                            @else

                                                             <div class=" flex items-center">No Batch Order issued</div>

                                                        @endisset

                                                @else

                                                    <div class="flex items-center">No Material Request issued</div>

                                            @endisset



                                    </div>



                                    {{-- end of grid --}}
                                </div>

                            @endforeach
                        </div>


                    @else

                        {{-- this will show when there is no material request --}}
                        <div class="emptyData w-full">Sorryy!, No CM has been issued </div>

                    @endif


        @endisset

    </div>




</div>
