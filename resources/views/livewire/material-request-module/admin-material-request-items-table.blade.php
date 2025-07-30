<div>

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

{{-- @dump($materialRequestItems) --}}

    @isset($materialRequestItems)


                        <div class="sm-card">
                            <div class="sm-card-header">
                                <div class="sm-card-heading flex justify-between">
                                    <span>MATERIAL REQUEST ITEMS</span>
                                    <x-button class="btn btn-close" wire:click="$dispatch('formClose')">Close</x-button>
                                </div>
                            </div>

                            <div class="sm-card-body">

                                @empty($materialRequestItems)

                                        <div class="emptyData">
                                            Sorry!, Could not find any Spare Parts Request for this SUB CM
                                        </div>

                              @else

                                    <div class="w-full">

                                        <div class="w-full">
                                            <table class=" w-full text-[12px]">
                                                <thead class="table-head">
                                                    <th class="table-th">#</th>
                                                    <th class="table-th">EQUIPMENT NAME</th>
                                                    <th class="table-th">EQUIPMENT TAG</th>
                                                    <th class="table-th">SPARE PART NAME</th>
                                                    <th class="table-th">SPARE PART NUMBER</th>
                                                    <th class="table-th">QTY</th>
                                                </thead>

                                                <tbody class="text-sm">

                                                    @foreach ($materialRequestItems as $item)

                                                    {{-- @dump($item) --}}

                                                        <tr class="table-tr text-sm" wire:key ="{{ $item->id }}" wire:loading.remove>

                                                            <td class="text-xs p-2">{{ $item->id }}</td>
                                                            <td class="text-xs p-2">{{ $item->equipmentTag->equipment->equipment}}</td>
                                                            <td class="text-xs p-2">{{ $item->equipmentTag->equipment_tag}}</td>
                                                            <td class="text-xs p-2">{{ $item->sparePart->spare_part_name }}</td>
                                                            <td class="text-xs p-2">{{ $item->sparePart->spare_part_number}}</td>
                                                            <td class="text-xs p-2">{{ $item->qty }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>


                                    </div>

                                @endempty


                            </div>
                        </div>







    @endisset


</div>
