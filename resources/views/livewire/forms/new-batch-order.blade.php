<div>


     <x-success></x-success>

     <div wire:loading>
        <x-spinner></x-spinner>
     </div>


    @isset($materialRequestId)
 {{-- check first, the materialRequestId is taken to compoennts --}}


                    <div class="sm-card">
                            <div class="sm-card-header">
                                <div class="sm-card-heading">New Batch Order for Cm
                                    <x-button class="btn btn-info"> {{ $materialRequestRetails['sub_cm'] }} </x-button>
                                    MaterialRequestID <x-button class="btn btn-info">{{ $materialRequestId }}</x-button>
                                </div>
                            </div>

                            <div class="sm-card-body">
                                {{--
                                1. register new batch order
                                2. input data for batch order number supplier and remarks
                                --}}

                                 <div class="form-group flex justify-between">

                                        <div class="form-group">
                                            <label for="" class="form-label">Batch No</label>
                                            <input type="text" name="" id="" class="form-controll" wire:model="batch_no">
                                            <x-form-error field="batch_no"></x-form-error>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Reciving Date</label>
                                            <input type="date" name="" id="" class="form-controll" wire:model="receiving_date">
                                            <x-form-error field="receiving_date"></x-form-error>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Supplier</label>
                                            <select name="" id="" class="form-controll" wire:model="supplier_id">
                                                <option value="">Select</option>

                                                @foreach ($suppliers as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-form-error field="supplier_id"></x-form-error>
                                        </div>

                                </div>


                            </div>
                        </div>



                    <div class="flex justify-center gap-2">
                            <x-button class="btn btn-submit" wire:click="formSave">SAVE</x-button>
                            <x-button class="btn btn-close" wire:click="formClose">close</x-button>
                    </div>



 @endisset


</div>
