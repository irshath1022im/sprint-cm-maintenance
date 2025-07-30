<div
    x-data="{
        materialRequestPopup: @entangle('materialRequestPopup')
    }"

    x-cloak
>

    @inject('carbon', 'Carbon\Carbon')


    <div class="card">

        <div class="card-header">
            <div class="card-heading">MATERIAL REQUEST</div>
        </div>

        <div class="card-body">

            @if ($material_requests->isNotEmpty())

                    <table class="table">
                        <thead class="table-head">
                            <th class="table-th p-2">#</th>
                            <th class="table-th p-2">REQ DATE</th>
                            <th class="table-th p-2">CM#</th>
                            <th class="table-th p-2">SUB CM #</th>
                            {{-- <th class="table-th p-2">EQUIPMENT</th>
                            <th class="table-th p-2">EQUIPMENT TAG</th>
                            <th class="table-th p-2">SPARE P NAME</th>
                            <th class="table-th p-2">SPARE P NUM</th>
                            <th class="table-th p-2">QTY</th> --}}
                            <th class="table-th p-2">EXPECTED DATE</th>
                            <th class="table-th p-2">REMAINING DAYS</th>
                        </thead>

                        <tbody class="table-body">

                            @foreach ($material_requests as $item)

                            @php $expectedDate = Carbon\Carbon::parse($item->expected_date)->toDateString() @endphp
                            @php $today = Carbon\Carbon::parse(now())->toDateString() @endphp
                            @php $remaingDays = Carbon\Carbon::parse(now()->toDateString())->diff($expectedDate) @endphp
                            @php $remaingDays1 = Carbon\Carbon::parse($expectedDate)->diffForHumans(Carbon\Carbon::now()) @endphp


                            <tr class="table-tr">
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td">{{ $item->date }}</td>
                                <td class="table-td">
                                    <a href="{{ route('admin_cm_show', ['id' => $item->cm->id])}}" target="_blank">
                                        {{ $item->cm->cm_number }}</a>
                                </td>
                                <td class="table-td">{{ $item->sub_cm }}</td>
                                {{-- <td class="table-td">{{ $item->equipmentTag->equipment_tag }}</td> --}}
                                {{-- <td class="table-td">{{ $item->sparePart->spare_part_name }}</td> --}}
                                {{-- <td class="table-td">{{ $item->sparePart->spare_part_number }}</td> --}}
                                {{-- <td class="table-td">{{ $item->qty }}</td> --}}
                                <td class="table-td">{{ $expectedDate}}</td>
                                {{-- <td class="table-td">{{Carbon\Carbon::parse($remaingDays)->diffForHumans()}}</td> --}}
                                <td class="table-td">

                                @if ($expectedDate < $today )
                                    <x-button class="btn btn-close">Expired</x-button>
                                @else
                                    <x-button class="btn btn-submit">{{ $remaingDays }}</x-button>
                                @endif
                            </td>

                            <td>
                                <x-button class="btn btn-blue"
                                    {{-- x-on:click="materialRequestPopup = ! materialRequestPopup" --}}
                                    wire:click="openRequestItems({{ $item->id}})"
                                >ITEMS</x-button>
                            </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                    {{ $material_requests->links() }}

            @else

                    <div class="emptyData">no Material Request Found</div>

            @endif



{{--

        </div>

    </div>


    {{-- For Reminder --}}


    <div class="modal"
        x-show="materialRequestPopup"
    >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">
                        @livewire('material-request-module.admin-material-request-items-table')
                </div>
            </div>
        </div>
    </div>




</div>
