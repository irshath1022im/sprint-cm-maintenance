<div>


    <div class="card"
    x-data="{
            partsReplacementBody : true
        }"

        x-cloak
>
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



                 @livewire('equipment-tags-for-material-request', ['cm' => $cm])

                {{-- if there is not assigned equipment tags, we don't need to show any this motal  --}}

                @livewire('material-request-module.sub-cm-card', ['cm' => $cm] )


        </div>




</div>




</div>
