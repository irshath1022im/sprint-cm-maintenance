<div
    x-data="{
        materialReceivingModal: @entangle('materialReceivingModal')
    }"
>


                                    @isset($cm->materialReceiving)

                                        <div class="emptyData bg-green-200 P-4 flex justify-between items-center">

                                            <div>
                                               MATERIAL RECEIVING
                                                <span class="material-symbols-outlined">
                                                    done_outline
                                                    </span>
                                            </div>


                                        </div>

                                         <div>

                                                    @component('components.material-receiving-card', ['material_receiving' => $cm->materialReceiving ])

                                                    @endcomponent
                                        </div>
                                 @else

                                     <div class="emptyData bg-red-300 P-4 flex justify-between items-center">
                                         MATERIAL RECEIVING NOT DONE YET

                                          <x-button class="btn btn-blue"
                                                 x-on:click="$wire.materialReceivingModal = true"
                                                 >MATERIAL RECEIVING
                                        </x-button>

                                        {{-- @if ($material_request->isNotEmpty())



                                        @endif --}}

                                     </div>

                                 @endisset



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
                                        <x-button class="btn btn-close" x-on:click="materialReceivingModal = false">x</x-button>
                                    @endisset
                         </div>


                    </div>

                </div>
            </div>
        </div>
    </div>







</div>
