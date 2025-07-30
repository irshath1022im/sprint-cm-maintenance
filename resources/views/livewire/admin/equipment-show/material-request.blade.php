<div>
   @if ($equipment->materialRequestItems->isNotEmpty())

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
                </thead>

                <tbody>
                        {{-- @foreach ($materialRequestItems as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $loop->iteration }}</td>
                                <td class="table-td">{{ $item->materialRequest->cm->cm_number}}</td>
                                <td class="table-td">{{ $item->materialRequest->sub_cm}}</td>
                                <td class="table-td">{{ $item->equipmentTag->equipment->equipment }}</td>
                                <td class="table-td">{{ $item->equipmentTag->equipment_tag }}</td>
                                <td class="table-td">{{ $item->sparePart->spare_part_name }}</td>
                                <td class="table-td">{{ $item->sparePart->spare_part_number }}</td>
                                <td class="table-td">{{ $item->qty }}</td>
                                {{-- <td class="table-td">
                                    <x-button class="btn btn-info">Price History</x-button>
                                </td> 
                            </tr>
                        @endforeach --}}

                </tbody>

            </table>
        </div>

    @else

        <div class="emptyData">Sorry!, Material Request Not found</div>

    @endif




</div>
