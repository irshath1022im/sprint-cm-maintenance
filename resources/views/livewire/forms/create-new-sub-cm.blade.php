<div>

    <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>


     <div class="card">
                <div class="card-header">
                    <div class="card-heading">NEW SUB CM</div>
                </div>

                <div class="card-body">

                    <form action="">

                        <div class="form-group flex justify-between ">

                            <div class="form-group">
                                <label for="" class="form-label">SUB CM NO</label>
                                <input type="text" name="" id="" class="form-controll" wire:model="sub_cm">
                                 <x-form-error field="sub_cm"></x-form-error>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Request Date</label>
                                <input type="date" name="" id="" class="form-controll" wire:model="date">
                                 <x-form-error field="date"></x-form-error>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Expected Date</label>
                                <input type="date" name="" id="" class="form-controll"  wire:model="expected_date">
                                 <x-form-error field="expected_date"></x-form-error>
                            </div>

                        </div>


                        <div class="flex justify-center gap-2">
                            <x-button class="btn btn-submit" wire:click.prevent="formSave" >SAVE</x-button>
                            <x-button class="btn btn-close" wire:click="formClose">close</x-button>
                        </div>

                    </form>
                </div>

    </div>







</div>
