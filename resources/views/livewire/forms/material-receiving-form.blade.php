<div>

     <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>

    
        <div class="form-group">
            <label for="" class="form-label">Material Request ID</label>
            <input type="text" name="" id="" class="form-controll" disabled>
        </div>


        <div class="form-group flex justify-between">

                <div class="form-group">
                    <label for="" class="form-label">Batch No</label>
                    <input type="text" name="" id="" class="form-controll">
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Reciving Date</label>
                    <input type="date" name="" id="" class="form-controll">
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Supplier</label>
                    <select name="" id="" class="form-controll">
                        <option value="">Select</option>
                    </select>
                </div>

        </div>

                <div class="flex justify-between">
                    <div class="form-group">
                                <label for="" class="form-label">QTY</label>
                                <input type="number" name="" id="" class="form-controll">
                    </div>

                     <div class="form-group">
                                <label for="" class="form-label">U PRICE</label>
                                <input type="number" name="" id="" class="form-controll">
                    </div>

                    <div class="form-group">
                                <label for="" class="form-label">TOTAL</label>
                                <input type="number" name="" id="" class="form-controll">
                    </div>
                </div>

        {{-- <div class="form-group">
            <label for="" class="form-label">Supporting Documents</label>
            <input type="file" name=""  class="form-controll"></input>
        </div> --}}

        <div class="form-group">
            <label for="" class="form-label">Remark</label>
            <textarea name="" id="" cols="30" rows="2" class="form-controll"></textarea>
        </div>

        <div class="flex justify-center gap-2" wire:loading.remove>
            <x-button class="btn btn-submit">SAVE</x-button>
            <x-button class="btn btn-close" wire:click="formClose">close</x-button>
        </div>




</div>


