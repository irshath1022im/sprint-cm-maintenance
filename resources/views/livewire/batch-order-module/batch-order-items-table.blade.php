<div>

    <x-success></x-success>

    <table class="table">
            <thead class="table-head">
                <th class="table-th">#</th>
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

                <tr class="table-tr text-sm">
                    <td class="text-xs p-2">{{ $item->id }}</td>
                    <td class="text-xs p-2">{{ $item->batchOrder->batch_no }}</td>
                    <td class="text-xs p-2">{{ $item->equipmentTag->equipment_tag }}</td>
                    <td class="text-xs p-2">{{ $item->sparePart->spare_part_number }}</td>
                    <td class="text-xs p-2">{{ $item->qty }}</td>
                    <td class="text-xs p-2">{{ $item->unit_price }}</td>
                    <td class="text-xs p-2">{{ $item->total }}</td>
                    <td class="text-xs p-2">
                        <x-button type="button" class="btn btn-close"
                            wire:click="deletePartsLine({{ $item->id }})"
                            wire:confirm
                        >Delete</x-button>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

</div>
