<div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                        <div>
                            PARTS REPLACEMENT REQUEST
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
                {{-- <x-button class="btn btn-blue"
                            >PARTS REPLACEMENT</x-button> --}}

                <div class="card mt-2">
                    <div class="card-header">
                        <div class="card-heading">summary</div>
                    </div>
                            <div class="card-body">


                                @livewire('equipment-tags-for-material-request', ['cm' => $cm])

                                 @livewire('material-request-for-cm-show', ['cm' => $cm])

                            </div>
                </div>

        </div>




</div>
