<div
    x-data="{
    createNewSubCmModal:$wire.entangle('createNewSubCmModal').live,
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

                @can('create', App\Models\MaterialRequest::class )
                    <x-button class="btn btn-blue"
                        x-on:click="$wire.createNewSubCmModal=true"
                    >NEW SUB CM</x-button>
                @endcan
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
                                <div>
                                    <span>
                                        SUB CM # <x-button class="btn btn-info">{{ $met_request->sub_cm }}</x-button>
                                    </span>


                                   @can('update', $met_request)


                                                <x-button class="btn btn-blue"
                                                    wire:click="subCmEditRequest({{ $met_request }})"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>

                                                </x-button>

                                                <x-button class="btn btn-close"
                                                wire:confirm="Do you want delete the Sub Task ?"
                                                wire:click="deleteSubTask({{ $met_request }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                                <path d="M2 3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3Z" />
                                                                <path fill-rule="evenodd" d="M13 6H3v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6ZM5.72 7.47a.75.75 0 0 1 1.06 0L8 8.69l1.22-1.22a.75.75 0 1 1 1.06 1.06L9.06 9.75l1.22 1.22a.75.75 0 1 1-1.06 1.06L8 10.81l-1.22 1.22a.75.75 0 0 1-1.06-1.06l1.22-1.22-1.22-1.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                                </svg>

                                                </x-button>

                                             @endcan
                                    </div>


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
                                                <div>Requested Date <x-button class="btn btn-info">{{ Carbon\Carbon::parse($met_request->date)->format('m-d-y') }}</x-button></div>
                                                <div>Expected Date <x-button class="btn btn-info">{{ Carbon\Carbon::parse($met_request->expected_date)->format('m-d-y') }}</x-button></div>


                                            </div>

                                            <div>

                                                @can('create', App\Models\MaterialRequestItems::class)

                                                 <x-button class="btn btn-blue"  wire:click="addPartsToRequest({{ $met_request }})">ADD SPARE PARTS</x-button>

                                                @endcan
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

                                                    <div class="w-full table-overflow">
                                                        <table class=" w-full text-[13px]">
                                                            <thead class="table-head">
                                                                <th class="table-th">#</th>
                                                                <th class="table-th">EQUIPMENT NAME</th>
                                                                <th class="table-th">EQUIPMENT TAG</th>
                                                                <th class="table-th">SPARE PART NUMBER</th>
                                                                <th class="table-th">SPARE PART NAME</th>
                                                                <th class="table-th">QTY</th>
                                                            </thead>

                                                            <tbody class="text-sm">

                                                                @foreach ($met_request->materialRequestItems as $item)
                                                                    <tr class="table-tr text-sm" wire:key ="{{ $item->id }}">

                                                                        <td class="text-xs p-2">{{ $item->id }}</td>
                                                                        <td class="text-xs p-2">{{ $item->equipmentTag->equipment->equipment }}</td>
                                                                        <td class="text-xs p-2">{{ $item->equipmentTag->equipment_tag }}</td>
                                                                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_number }}</td>
                                                                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_name }}</td>
                                                                        <td class="text-xs p-2">{{ $item->qty }}</td>

                                                                        @can('delete', $item)

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

                                            @endif

                                    </div>

                                </div>

                {{-- BATCH ORDER MODULE --}}
                    {{-- each material request have one batchorder --}}


                    @isset($met_request->batchOrder)

                        @livewire('batch-order-module.batch-orders-card', ['batch'=>$met_request->batchOrder, 'cm' => $cm])

                    @else



                        <div class="emptyData">Please Issue the Batch Order<div>

                    @can('create', App\Models\BatchOrder::class )

                        <x-button class="btn btn-blue"
                            wire:click="newBatchOrder({{ $met_request }})"
                        >Creat BatchOrder</x-button>
                    @endcan
                           </div>

                    @endisset





                @endforeach


            @endif

        </div>

    </div>



<div class="modal" wire:iqnore
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
                                    @livewire('forms.new-batch-order',['cm' => $cm])
                                {{-- {{ $materialId }} --}}


                    </div>

                </div>
            </div>
        </div>
    </div>






</div>


@script()

<script>

    $js('mrDeleteStatus', () =>{
        alert('Sorry, This Request is having MaterialRequest Items / Batch Order..Please try again')
    })


</script>

@endscript
