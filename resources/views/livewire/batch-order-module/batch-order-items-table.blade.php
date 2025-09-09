<div>

    <x-success></x-success>

    <div class="table-overflow">

            <table class="table">
                    <thead class="table-head">
                        <th class="table-th">MRL #</th>
                        <th class="table-th">BATCH NO</th>
                        <th class="table-th">EQU TAG</th>
                        <th class="table-th">SPARE PART NO</th>
                        <th class="table-th">QTY</th>
                        <th class="table-th">U PRICE</th>
                        <th class="table-th">TOTAL</th>
                    </thead>

                    <tbody class="table-body">

                        {{-- @dump($batchOrderItems) --}}
                        @foreach ($batchOrderItems as $item)

                        <tr class="table-tr">
                            <td class="p-2">{{ $item->material_request_item_id }}</td>
                            <td class="p-2">{{ $item->batchOrder->batch_no }}</td>
                            <td class="p-2">{{ $item->equipmentTag->equipment_tag }}</td>
                            <td class="p-2">{{ $item->sparePart->spare_part_number }}</td>
                            <td class="p-2">{{ $item->qty }}</td>
                            <td class="p-2"><x-price price="{{ $item->unit_price }}"></x-price></td>
                            <td class="p-2"><x-price price="{{ $item->total }}"></x-price></td>

                            @can('delete', $item )

                                <td class="text-xs p-2">
                                    <x-button type="button" class="btn btn-close"
                                        wire:click="deletePartsLine({{ $item->id }})"
                                        wire:confirm
                                    >Delete</x-button>
                                </td>
                            @endcan
                        </tr>
                        @endforeach


                    </tbody>
                </table>
    </div>

</div>
