<div>

        <x-success></x-success>

        <div class="form-group">
            <div class="form-label">Service Date</div>
            <input type="date" name="" id="" class="form-controll" wire:model="service_date">
             <x-form-error field="service_date"></x-form-error>

        </div>

     <div class="flex">

        <div class="form-group">
            <div class="form-label">QTY</div>
            <input type="number" name="" id="" class="form-controll" wire:model="qty">

        </div>

        <div class="form-group">
            <div class="form-label">UNIT PRICE</div>
            <input type="number" name="" id="" class="form-controll" wire:model="unit_price">
        </div>

        <div class="form-group">
            <div class="form-label">TOTAL</div>
            <input type="number" name="" id="" class="form-controll" wire:model="total">
        </div>
    </div>

     <div>
        <textarea name="" id="" class="w-full form-controll" placeholder="Service Description" wire:model="service_description"></textarea>
        <x-form-error field="service_description"></x-form-error>
    </div>

    <x-button class="btn-submit" wire:click='formSubmit'>SUBMIT</x-button>
    <x-button class="btn-close" wire:click='formClose'>CLOSE</x-button>



</div>
