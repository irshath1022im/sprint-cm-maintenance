<div
    x-data="{
    materialRequestModal : @entangle('materialRequestModal'),
    materialReceivingModal : @entangle('materialReceivingModal'),
    }"

    x-locak
>


{{ $materialRequestModal }}
@if ($material_request->isNotEmpty())

        <div class="emptyData bg-green-200 P-4 flex justify-between items-center">

            <div>
                MATERIAL REQUEST FOUND
                <span class="material-symbols-outlined">
                    done_outline
                    </span>
            </div>

            <x-button class="btn btn-blue"
                x-on:click="$wire.materialRequestModal=true"
                >MATERIAL REQUEST
            </x-button>

        </div>

        <table class=" w-[80%] ml-12 text-[12px]">
            <thead class="table-head">
                <th class="table-th">REQ DATE</th>
                <th class="table-th">SUB CM</th>
                <th class="table-th">EQUIPMENT TAG</th>
                <th class="table-th">SPARE PART NAME</th>
                <th class="table-th">SPARE PART NUMBER</th>
                <th class="table-th">QTY</th>
                <th class="table-th">RECEIVING</th>
            </thead>

            <tbody class="text-sm">

                @foreach ($material_request as $item)
                    <tr class="table-tr text-sm" wire:key ="{{ $item->id }}">

                        <td class="text-xs p-2">{{ $item->date }}</td>
                        <td class="text-xs p-2">{{ $item->sub_cm }}</td>
                        <td class="text-xs p-2">{{ $item->equipment_tag_id }}</td>
                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_name }}</td>
                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_number }}</td>
                        <td class="text-xs p-2">{{ $item->qty }}</td>
                        <td class="text-xs p-2">
                            <x-button type="button" class="btn btn-blue"
                                x-on:click="$wire.set('materialReceivingModal', true)"
                            >Receiving</x-button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        @else

            <div class="emptyData bg-red-300 P-4 flex justify-between items-center">
            <div>
                MATERIAL REQUEST NOT FOUND
            </div>

            <x-button type="button" class="btn btn-blue"
                x-on:click="$wire.materialRequestModal = true"
                >MATERIAL REQUEST
            </x-button>

        </div>
    @endif


    <div class="modal"
        x-show ="materialRequestModal"
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    <div class="card">

                        <div class="card-header">
                            <div class="card-heading flex justify-between items-center">
                                <span> MATERIAL REQUEST FOR</span>
                                <x-button class="btn btn-info">CM NO - {{ $cm->cm_number}}</x-button>
                                <span>
                                    <x-button class="btn bg-slate-200 border border-blue-500">
                                        <a href="{{ route('admin_equipment_show',['id' => $cm->equipment->id]) }}" target="_blank">
                                            {{$cm->equipment->equipment }}
                                        </a>
                                    </x-button>
                                </span>
                            </div>
                        </div>

                        <div class="card-body bg-slate-200">

                            @livewire('forms.new-material-request-form',['cm' =>$cm])

                        </div>

                    </div>

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

                                @isset($cm->materialRequest)

                                    @livewire('forms.material-receiving-form', ['cm' => $cm, ])

                                    @else
                                        <div class="emptyData">There is no Material Request for this CM</div>
                                        <x-button class="btn btn-close" x-on:click="materialReceivingModal = false">x</x-button>
                                    @endisset
                         </div>


                    </div>

                </div>
            </div>
        </div>
    </div>






</div>
