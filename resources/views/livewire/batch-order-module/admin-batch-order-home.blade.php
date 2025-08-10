<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">Batch Orders</div>

            <form action="">
                <div class="form-group flex">
                    <select name="" id="" class="form-controll" wire:model.change = "searchType">
                        <option value="">Search By</option>
                        <option value="equipment">Equipment</option>
                        <option value="tag">Tag</option>
                        <option value="sparePartName">Spare Part Name</option>
                        <option value="sparePartNumber">Spare Part Number</option>
                    </select>
                    <input type="text" name="" id="" class="form-controll" placeholder="Input" wire:model.live="searchValue">
                </div>
            </form>
        </div>

        <div class="card-body">


            @isset($batchOrders)

            {{-- @dump($batchOrders->links() ) --}}

                @if ($batchOrders->isNotEmpty())

                    <table class="table">
                        <thead class="table-head">
                            <th class="table-th">#</th>
                            <th class="table-th">DATE</th>
                            <th class="table-th">JOB NO</th>
                            <th class="table-th">SUB CM NO</th>
                            <th class="table-th">EQUIPMENT</th>
                            <th class="table-th">EQUIPMENT TAG</th>
                            <th class="table-th">SPARE PART</th>
                            <th class="table-th">PART NUMBER</th>
                            <th class="table-th">QTY</th>
                            <th class="table-th">U PRICE</th>
                            <th class="table-th">TOTAL</th>
                        </thead>

                        <tbody class="sm-card-body">

                            @foreach ($batchOrders as $item)

                                <tr class="table-tr">
                                    <td class="table-td text-[13px]"> {{ $loop->iteration }}</td>
                                    <td class="table-td text-[13px]"> {{ $item->receiving_date }}</td>
                                    <td class="table-td text-[13px]">{{ $item->batch_no }}</td>
                                    <td class="table-td text-[13px]"> {{ $item->materialRequest->sub_cm}}</td>
                                    <td class="table-td text-[13px] ">
                                        <a href="{{ route('admin_equipment_show',['id' => $item->materialRequest->cm->equipment->id]) }}" target="_blank" class="hover:border-b hover:border-b-blue-500" >
                                            {{ $item->materialRequest->cm->equipment->equipment}}</a>
                                    </td>
                                    <td class="table-td text-[13px]"> {{ $item->batchOrderItems[0]->equipmentTag->equipment_tag}}</td>
                                    <td class="table-td text-[13px]"> {{ $item->batchOrderItems[0]->sparePart->spare_part_number}}</td>
                                    <td class="table-td text-[13px]"> {{ $item->batchOrderItems[0]->sparePart->spare_part_name}}</td>
                                    <td class="table-td text-[13px]"> {{ $item->materialRequest->materialRequestItems[0]->qty}}</td>
                                    <td class="table-td text-[13px]">
                                        <x-price price="{{ $item->batchOrderItems[0]->unit_price}}"></x-price>
                                    </td>
                                    <td class="table-td text-[13px]">
                                        <x-price price="{{ $item->batchOrderItems[0]->total}}"></x-price>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                    {{-- {{  $batchOrders->links() }} --}}
                @else

                <div class="emptyData">Sorry!, Batch Orders not found ...</div>

                @endif

            @endisset


        </div>




    </div>
















</div>
