<div>

     <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>

    {{-- @dump($cm->spareParts) --}}
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

                <div class="flex justify-between">
                    <div class="form-group">
                                <label for="" class="form-label">QTY</label>
                                <input type="number" name="" id="" class="form-controll" wire:model="qty">
                                 <x-form-error field="qty"></x-form-error>
                    </div>

                     <div class="form-group">
                                <label for="" class="form-label">U PRICE</label>
                                <input type="number" name="" id="" class="form-controll" wire:model="unit_price">
                                 <x-form-error field="unit_price"></x-form-error>
                    </div>

                    <div class="form-group">
                                <label for="" class="form-label">TOTAL</label>
                                <input type="number" name="" id="" class="form-controll" wire:model="total">
                                 <x-form-error field="total"></x-form-error>
                    </div>
                </div>



        <div class="form-group">
            <label for="" class="form-label">Remark</label>
            <textarea name="" id="" cols="30" rows="2" class="form-controll"></textarea>
        </div>

        <div class="flex justify-center gap-2" wire:loading.remove>
            <x-button class="btn btn-submit" wire:click="formSave">SAVE</x-button>
            <x-button class="btn btn-close" wire:click="formClose">close</x-button>
        </div>





</div>


