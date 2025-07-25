<div class="card"
    x-data="{
        materialRequestModal: @entangle('materialRequestModal'),
        sparePartsModal : @entangle('sparePartsModal'),
        materialReceivingModal :  @entangle('materialReceivingModal')
    }"
>
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                        <div>
                            PARTS REPLACEMENT -
                        </div>

                        <x-button
                        class="btn btn-blue"
                        x-on:click="partsReplacementBody = !partsReplacementBody"
                        >

                        EXPAND/CLOSE

                        </x-button>
                    </div>
        </div>

        <div class="card-body"
                x-show="partsReplacementBody"
                x-transition.duration.500ms
            >
                {{-- 01. check this cm has assigned parts
                02. create new sub cm
                03. create new meterial request
                04. create parts receiving
                05. assigne the parts to cm
                06. open the cm and request the assinged parts to
                07. close the cm --}}







                {{-- <x-button class="btn btn-blue"
                            >PARTS REPLACEMENT</x-button> --}}

                <div class="card mt-2">
                    <div class="card-header">
                        <div class="card-heading">summary</div>
                    </div>
                            <div class="card-body">

                                {{-- @dump($cm->spareParts) --}}

                                 @isset($cm->spareParts)
                                        <div class="emptyData bg-green-200 P-4 flex justify-between items-center">

                                            <div>
                                               SPARE PARTS HAS BEEN ASSIGNED TO CM
                                                <span class="material-symbols-outlined">
                                                    done_outline
                                                    </span>
                                            </div>

                                            <x-button class="btn btn-blue"
                                                x-on:click="$wire.set('sparePartsModal', true)"
                                                >ADD SPARE PARTS
                                            </x-button>

                                        </div>
                                 @else
                                    <div class="emptyData p-4 flex justify-between">spare parts is not added to this CM
                                          <x-button class="btn btn-blue"
                                                x-on:click="$wire.set('sparePartsModal', true)"
                                                >ADD SPARE PARTS
                                            </x-button>
                                    </div>
                                 @endisset



                                  @if ($material_request->isNotEmpty())

                                        <div class="emptyData bg-green-200 P-4 flex justify-between items-center">

                                            <div>
                                               MATERIAL REQUEST FOUND
                                                <span class="material-symbols-outlined">
                                                    done_outline
                                                    </span>
                                            </div>

                                            <x-button class="btn btn-blue"
                                                x-on:click="$wire.set('materialRequestModal', true)"
                                                >MATERIAL REQUEST
                                            </x-button>

                                        </div>

                                        <table class=" w-[80%] ml-12 text-[8px]">
                                            <thead class="table-head">
                                                <th class="table-th">SUB CM</th>
                                                <th class="table-th">REQ DATE</th>
                                                <th class="table-th">SPARE PART NAME</th>
                                                <th class="table-th">SPARE PART NUMBER</th>
                                                <th class="table-th">QTY</th>
                                                <th class="table-th">U PRICE</th>
                                                <th class="table-th">TOTAL</th>
                                            </thead>

                                            <tbody class="text-sm">
                                                @foreach ($material_request as $item)
                                                    <tr class="table-tr text-sm">

                                                        <td class="text-xs p-2">{{ $item->sub_cm }}</td>
                                                        <td class="text-xs p-2">{{ $item->date }}</td>
                                                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_name }}</td>
                                                        <td class="text-xs p-2">{{ $item->sparePart->spare_part_number }}</td>
                                                        <td class="text-xs p-2">{{ $item->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                     @else

                                         <div class="emptyData bg-red-300 P-4 flex justify-between items-center">
                                            <div>
                                               MATERIAL REQUEST NOT FOUND
                                            </div>

                                            <x-button class="btn btn-blue"
                                                x-on:click="$wire.set('materialRequestModal', true)"
                                                >MATERIAL REQUEST
                                            </x-button>

                                        </div>
                                    @endif

                                    @isset($cm->materialReceiving)
                                        <div class="emptyData bg-green-200 P-4 flex justify-between items-center">

                                            <div>
                                               MATERIAL RECEIVING
                                                <span class="material-symbols-outlined">
                                                    done_outline
                                                    </span>
                                            </div>


{{--
                                                    <x-button class="btn btn-blue"
                                                        x-on:click="$wire.set('materialReceivingModal', true)"
                                                        >MATERIAL RECEIVING
                                                    </x-button> --}}



                                        </div>

                                          <div>

                                                    @component('components.material-receiving-card', ['material_receiving' => $cm->materialReceiving ])

                                                    @endcomponent
                                        </div>
                                 @else

                                     <div class="emptyData bg-red-300 P-4 flex justify-between items-center">
                                         MATERIAL RECEIVING NOT DONE YET

                                         @if ($material_request->isNotEmpty())

                                         <x-button class="btn btn-blue"
                                                 x-on:click="$wire.set('materialReceivingModal', true)"
                                                 >MATERIAL RECEIVING
                                        </x-button>

                                        @endif

                                     </div>

                                 @endisset

                            </div>
                </div>









        </div>




    <div class="modal"
        x-show="materialRequestModal"
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    <div class="card">

                        <div class="card-header">
                            <div class="card-heading flex justify-between">
                                <span>MATERIAL REQUEST</span>
                                <x-button class="btn btn-close"
                                    x-on:click="$wire.set('materialRequestModal', false)"
                                >X</x-button>
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
        x-show="sparePartsModal"
        x-transition.duration.500ms
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    <div class="card">

                        <div class="card-header">
                            <div class="card-heading flex justify-between">
                                <span>NEW SPARE PARTS</span>

                            </div>
                        </div>

                        <div class="card-body bg-slate-200">

                        @livewire('forms.create-new-spare-parts', ['cm' => $cm])

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

                                    @livewire('forms.material-receiving-form', ['cm' => $cm])

                                    @else
                                        <div class="emptyData">There is no Material Request for this CM</div>
                                    @endisset
                         </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
