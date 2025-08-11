<div
    x-data="{
        addBatchItemsModal : @entangle('addBatchItemsModal')
    }"

    x-cloak
>

{{-- @dump($this->batchItems) --}}
<x-success></x-success>

    {{-- @dump($batch->isEmpty()) --}}

                        <div class="sm-card bg-blue-200">

                            <div class="sm-card-header">
                                <div class="sm-card-heading ">
                                    <div>
                                        Batch Order
                                    </div>
                                </div>
                            </div>

                            <div class="sm-card-body">

                                    <div class="sm-card">

                                        <div class="sm-card-header">
                                            <div class="sm-card-heading flex justify-between items-center">

                                                <div class="flex space-x-2 basis-3/4">
                                                    @isset($batch)
                                                        <div>Batch ID # <x-button class="btn btn-info">{{ $batch->id }}</x-button></div>
                                                        <div>Batch No # <x-button class="btn btn-info">{{ $batch->batch_no }}</x-button></div>
                                                        <div>MATERIAL R# <x-button class="btn btn-info">{{ $batch->material_request_id }}</x-button></div>
                                                        <div>SUB CM# <x-button class="btn btn-info">{{ $batch->materialRequest->sub_cm }}</x-button></div>
                                                        <div>Receiving Date <x-button class="btn btn-info">{{ $batch->receiving_date}}</x-button></div>
                                                    @endisset
                                                </div>

                                                 <x-button class="btn btn-blue"
                                                        x-on:click="$wire.addBatchItemsModal=true"
                                                        wire:click="batchOrderMaterialRequest({{ $batch }})"
                                                    >ADD ITEMS
                                                </x-button>

                                            </div>
                                        </div>

                                        <div class="sm-card-body">

                                            {{-- @dump($batch->batchOrderItems) --}}


                                           @if ($this->batchItems)


                                                @livewire('batch-order-module.batch-order-items-table', ['batch_id' => $batch->id])
                                                {{-- this is livewire component, don't forget to add as a public property in class  --}}

                                            @else

                                                <div class="emptyData">Sorry!, Batch Order issued, and could't find any order items </div>


                                            @endif

                                        </div>
                                    </div>

                            </div>
                        </div>


 <div class="modal"
        x-show="addBatchItemsModal"
        x-transition.duration.500ms
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    @isset($batch)

                        @livewire('forms.batch-order-item-form',['cm' => $cm, 'batch' => $batch])
                    @endisset


                </div>
            </div>
        </div>
    </div>





</div>
