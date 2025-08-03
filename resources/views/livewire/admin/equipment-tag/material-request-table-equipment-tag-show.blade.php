<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">MATERIAL REQUEST</div>

            {{-- {{ $id }} --}}

            {{-- @dump($equipmentTag) --}}
            @isset($equipmentTag)

             @isset($equipmentTag->materialRequestItems)
                empty data
             @endisset


             @if($equipmentTag->has('materialRequestItems'))

             {{-- @dump($equipmentTag->materialRequestItems) --}}



                <x-button class="btn btn-info">Total Spent:</x-button>
                {{-- <x-price price="{{ $equipment[0]->totalSpent}}"></x-price> --}}


        </div>



                {{-- @if ($equipment[0]->materialRequestItems->isNotEmpty())

                        <div class="card-body">
                            <table class="table text-[12px]">
                                <thead class="thead table-head">
                                    <th class="table-th">#</th>
                                    <th class="table-th">CM NO</th>
                                    <th class="table-th">SUB CM NO</th>
                                    <th class="table-th">EQUIPMENT</th>
                                    <th class="table-th">EQU TAG</th>
                                    <th class="table-th">S P NAME</th>
                                    <th class="table-th">S P NUMBER</th>
                                    <th class="table-th">QTY</th>
                                    <th class="table-th">BATCH ORDER NO</th>
                                    <th class="table-th">UNIT PRICE</th>
                                    <th class="table-th">TOTAL</th>
                                </thead>

                                <tbody class="text-[12px]">
                                        @foreach ($equipment[0]->materialRequestItems as $item)

                                            <tr class="table-tr text-[12px]">
                                                <td class="table-td">{{ $loop->iteration }}</td>
                                                <td class="table-td">{{ $item->materialRequest->cm->cm_number}}</td>
                                                <td class="table-td">{{ $item->materialRequest->sub_cm}}</td>
                                                <td class="table-td">{{ $item->equipmentTag->equipment->equipment }}</td>
                                                <td class="table-td">
                                                    <a href="{{ route('admin_tag_show', ['id'=> $item->equipmentTag->id]) }}" target="_blank">
                                                            {{ $item->equipmentTag->equipment_tag }}</a></td>
                                                <td class="table-td">{{ $item->sparePart->spare_part_name }}</td>
                                                <td class="table-td">{{ $item->sparePart->spare_part_number }}</td>
                                                <td class="table-td">{{ $item->qty }}</td>

                                                @isset($item->batchOrderItem)

                                                    <td class="table-td text-[12px]" >
                                                        <x-button class="btn btn-blue">{{ $item->batchOrderItem->batchOrder->batch_no }}</x-button>
                                                    </td>
                                                    <td class="table-td"><x-price price="{{ $item->batchOrderItem->unit_price}}"></x-price></td>
                                                    <td class="table-td"><x-price price="{{ $item->batchOrderItem->total}}"></x-price></td>

                                                @else
                                                    <td class="table-td"><x-button class="btn btn-info">N/A</x-button></td>
                                                @endisset

                                            </tr>
                                        @endforeach

                                </tbody>

                            </table>
                        </div>

                    @else

                        <div class="emptyData">Sorry!, Material Request Not found</div>

                    @endif

                    --}}




          @endif

            <div class="emptyData">Sorryy!, No Material Request Found </div>

        @endisset

    </div>




</div>
