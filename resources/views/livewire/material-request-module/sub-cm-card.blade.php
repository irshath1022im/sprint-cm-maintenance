<div
    x-data="{
    createNewSubCmModal:@entangle('createNewSubCmModal'),
    requestItemsModal : @entangle('requestItemsModal'),
    batchOrderModal : @entangle('batchOrderModal'),
    material_request_body : true
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

                @foreach ($materialRequests as $met_request)

                {{-- CM DETAILS CARD --}}

                    <div class="card bg-slate-500 m">
                        <div class="card-header">
                            <div class="card-heading flex justify-between items-center">
                                <div>SUB CM # <x-button class="btn btn-info">{{ $met_request->sub_cm }}</x-button></div>
                                <x-button class="btn btn-blue"
                                        x-on:click="material_request_body = ! material_request_body"
                                    >EXPAND/CLOSE</x-button>
                            </div>
                        </div>

                        <div class="card-body bg-slate-600 "
                            x-show="material_request_body"
                           x-transition.duration.500ms
                            >

                                <div class="sm-card p-4 my-2 bg-slate-200">

                                    <div class="sm-card-header ">
                                        <div class="sm-card-heading text-[12px] flex justify-between">

                                            <div class="flex space-x-2 basis-3/4">

                                                <div>Material R# <x-button class="btn btn-info">{{ $met_request->id }}</x-button></div>
                                                <div>Requested Date <x-button class="btn btn-info">{{ $met_request->date }}</x-button></div>
                                                <div>Expected Date <x-button class="btn btn-info">{{ $met_request->expected_date }}</x-button></div>
                                            </div>

                                            <div>
                                                <x-button class="btn btn-blue"

                                                wire:click="addPartsToRequest({{ $met_request }})"
                                                >ADD SPARE PARTS</x-button>
                                            </div>

                                        </div>
                                    </div>


                {{-- CM REALTED MATERIAL REQUEST ITEMS --}}

                                    <div class="sm-card-body">


                                            @if ($met_request->materialRequestItems->isEmpty())

                                                    <div class="emptyData">
                                                        Sorry!, Could not find any Spare Parts Request for this SUB CM
                                                    </div>

                                                @else

                                                <div class="w-full">

                                                    <div class="w-full">
                                                        <table class=" w-full ml-12 text-[12px]">
                                                            <thead class="table-head">
                                                                <th class="table-th">#</th>
                                                                <th class="table-th">EQUIPMENT NAME</th>
                                                                <th class="table-th">EQUIPMENT TAG</th>
                                                                <th class="table-th">SPARE PART NAME</th>
                                                                <th class="table-th">SPARE PART NUMBER</th>
                                                                <th class="table-th">QTY</th>
                                                            </thead>

                                                            <tbody class="text-sm">

                                                                @foreach ($met_request->materialRequestItems as $item)
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

                                                    </div>


                                                </div>

                                            @endif

                                    </div>

                                </div>

                {{-- BATCH ORDER MODULE --}}
                    {{-- each material request have one batchorder --}}


                    @isset($met_request->batchOrder)

                        @livewire('batch-order-module.batch-orders-card', ['batch'=>$met_request->batchOrder])

                    @else

                        <div class="emptyData">Sorry!, Batch Order Not Received Yet <div>
                                                    <x-button class="btn btn-blue"
                                                        wire:click="newBatchOrder({{ $met_request }})"
                                                    >Creat BatchOrder</x-button>
                                            </div></div>

                    @endisset





                @endforeach


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
        x-show="batchOrderModal"
        x-transition.duration.500ms
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    <div class="card">



                        {{-- @dump($cm->has('materialRequest')) --}}

                                    {{-- @livewire('forms.material-receiving-form',['materialId' => $materialId]) --}}
                                    @livewire('forms.new-batch-order')
                                {{-- {{ $materialId }} --}}


                    </div>

                </div>
            </div>
        </div>
    </div>






</div>
