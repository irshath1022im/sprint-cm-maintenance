<div
    x-data="{
    createNewSubCmModal:@entangle('createNewSubCmModal'),
    requestItemsModal : @entangle('requestItemsModal'),
    materialReceivingModal : @entangle('materialReceivingModal')
    }"

    x-cloak
>

<x-success></x-success>

    <div class="card text-[12px] bg-green-100 mt-2">
        <div class="card-header">
            <div class="card-heading">SUB CMS
                <x-button class="btn btn-blue"
                    x-on:click="$wire.createNewSubCmModal=true"
                >NEW SUB CM</x-button>
            </div>
        </div>

        <div class="card-body">

            @if ($materialRequests->isEmpty())

                <div class="emptyData">Sorry!, Please Create New Sub CM to Proceed with</div>

            @else

                @foreach ($materialRequests as $item)

                    <div class="sm-card p-4 m-4 bg-slate-200">
                        <div class="sm-card-header ">
                            <div class="sm-card-heading text-[12px] flex justify-between">

                                <div class="flex justify-between basis-3/4">

                                    <div>SUB CM # <x-button class="btn btn-info">{{ $item->sub_cm }}</x-button></div>
                                    <div>Requested Date <x-button class="btn btn-info">{{ $item->date }}</x-button></div>
                                    <div>Expected Date <x-button class="btn btn-info">{{ $item->expected_date }}</x-button></div>
                                </div>

                                <div>
                                    <x-button class="btn btn-blue"

                                    wire:click="addPartsToRequest({{ $item }})"
                                    >ADD SPARE PARTS</x-button>
                                </div>

                                <div>
                                        <x-button class="btn btn-blue"
                                            wire:click="receivingRequest({{ $item }})"
                                        >BatchOrder</x-button>
                                    </div>
                            </div>
                        </div>

                        <div class="sm-card-body flex items-center align-middle">

                            {{-- @dump($materialRequests) --}}

                            {{-- materialRequest reqturn collections , use for loos --}}


                                @if ($item->materialRequestItems->isEmpty())

                                        <div class="emptyData">
                                            Sorry!, Could not find any Spare Parts Request for this SUB CM
                                        </div>

                                    @else


                                        <table class=" w-[80%] ml-12 text-[12px]">
                                            <thead class="table-head">
                                                <th class="table-th">#</th>
                                                <th class="table-th">EQUIPMENT NAME</th>
                                                <th class="table-th">EQUIPMENT TAG</th>
                                                <th class="table-th">SPARE PART NAME</th>
                                                <th class="table-th">SPARE PART NUMBER</th>
                                                <th class="table-th">QTY</th>
                                            </thead>

                                            <tbody class="text-sm">

                                                @foreach ($item->materialRequestItems as $item)
                                                    <tr class="table-tr text-sm" wire:key ="{{ $item->id }}">

                                                        <td class="text-xs p-2">{{ $item->id }}</td>
                                                        <td class="text-xs p-2">{{ $item->equipmentTag->equipment->equipment }}</td>
                                                        <td class="text-xs p-2">{{ $item->equipmentTag->equipment_tag }}</td>
                                                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_name }}</td>
                                                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_number }}</td>
                                                        <td class="text-xs p-2">{{ $item->qty }}</td>
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

                                @endif

                        </div>
                    </div>

                @endforeach

                {{-- end of material request / cm  --}}

            @endif

        </div>

    </div>



<div class="modal"
    x-show="createNewSubCmModal"
>
    <div class="modal-overlay">
        <div class="modal-body">
            <div class="modal-content">

                    @livewire('forms.create-new-sub-cm',['cm' => $cm])
            </div>
        </div>
    </div>
</div>


{{-- REQUET ITEMS MODAL --}}
<div class="modal"
    x-show="requestItemsModal"
    >
    <div class="modal-overlay">
        <div class="modal-body">
            <div class="modal-content">

                    @livewire('forms.material-request-items',['cm' => $cm])

            </div>
        </div>
    </div>
</div>


    <div class="modal"
        x-show="materialReceivingModal"
        x-transition.duration.500ms
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    <div class="card">

                        <div class="card-header">
                            <div class="card-heading flex justify-between">
                                <span>MATERIAL RECEIVING</span>

                            </div>
                        </div>

                        {{-- @dump($cm->has('materialRequest')) --}}
                         <div class="card-body bg-slate-200">

                                    {{-- @livewire('forms.material-receiving-form',['materialId' => $materialId]) --}}
                                    @livewire('forms.new-batch-order')
                                {{-- {{ $materialId }} --}}
                         </div>


                    </div>

                </div>
            </div>
        </div>
    </div>






</div>
