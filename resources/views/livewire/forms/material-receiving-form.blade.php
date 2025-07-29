<div>

     <x-success></x-success>

     {{-- <x-loading></x-loading> --}}

{{ $cm }}
{{--
     @isset($materialId)
            @dump($materialId)
     @endisset --}}

       
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

        <div class="flex justify-center gap-2">
            <x-button class="btn btn-submit" wire:click="formSave">SAVE</x-button>
            <x-button class="btn btn-close" wire:click="formClose">close</x-button>
        </div>



</div>


