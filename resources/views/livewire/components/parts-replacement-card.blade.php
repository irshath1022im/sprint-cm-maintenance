<div class="card"
    x-data="{
        materialRequestModal: @entangle('materialRequestModal'),
        sparePartsModal : @entangle('sparePartsModal')
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
                            {{-- x-on:click="$wire.set('serviceRequestModal', true)" --}}
                            >MATERIAL RECEIVING</x-button>

                <x-button class="btn btn-blue"
                            {{-- x-on:click="$wire.set('serviceRequestModal', true)" --}}
                            >PARTS REPLACEMENT</x-button>



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


</div>
