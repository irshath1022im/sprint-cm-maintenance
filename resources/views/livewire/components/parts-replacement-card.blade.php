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

                 <x-button class="btn btn-blue"
                            x-on:click="$wire.set('sparePartsModal', true)"
                            >NEW SPARE PARTS</x-button>

                 <x-button class="btn btn-blue"
                            x-on:click="$wire.set('materialRequestModal', true)"
                            >MATERIAL REQUEST</x-button>

                <x-button class="btn btn-blue"
                            x-on:click="$wire.set('materialReceivingModal', true)"
                            >MATERIAL RECEIVING</x-button>

                {{-- <x-button class="btn btn-blue"
                            >PARTS REPLACEMENT</x-button> --}}

                <div class="card mt-2">
                    <div class="card-header">
                        <div class="card-heading">summary</div>
                    </div>
                            <div class="card-body">

                                  @if ($material_request->isNotEmpty())

                                        <table class="table">
                                            <thead class="table-head">
                                                <th class="table-th">SUB CM</th>
                                                <th class="table-th">REQ DATE</th>
                                                <th class="table-th">SPARE PART NAME</th>
                                                <th class="table-th">SPARE PART NUMBER</th>
                                                <th class="table-th">QTY</th>
                                                <th class="table-th">U PRICE</th>
                                                <th class="table-th">TOTAL</th>
                                            </thead>

                                            <tbody class="table-body">
                                                @foreach ($material_request as $item)
                                                    <tr class="table-tr">

                                                        <td class="table-td">{{ $item->sub_cm }}</td>
                                                        <td class="table-td">{{ $item->date }}</td>
                                                        <td class="table-td">{{ $item->sparePart->spare_part_name }}</td>
                                                        <td class="table-td">{{ $item->sparePart->spare_part_number }}</td>
                                                        <td class="table-td">{{ $item->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                     @else

                                         <div class="emptyData">no Material Request Found</div>
                                    @endif
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

                        <div class="card-body bg-slate-200">

                        @livewire('forms.material-receiving-form', ['cm' => $cm])

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
