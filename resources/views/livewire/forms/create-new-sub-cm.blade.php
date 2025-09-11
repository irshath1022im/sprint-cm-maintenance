<div>

    <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>


     <div class="card">
                <div class="card-header">
                    <div class="card-heading" wire:loading.remove>
                        @if ($editMode)
                            EDIT SUB TASK <x-button class="btn btn-blue">{{ $editSubCm }}</x-button>
                        @else
                            NEW SUB TASK
                        @endif
                    </div>
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
                                <span class="text-[12px]">(mm/dd/yyyy)</span>
                                 <x-form-error field="date"></x-form-error>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Expected Date</label>
                                <input type="date" name="" id="" class="form-controll"  wire:model="expected_date">
                                 <span class="text-[12px]">(mm/dd/yyyy)</span>
                                 <x-form-error field="expected_date"></x-form-error>
                            </div>

                        </div>


                        <div class="flex justify-center gap-2" wire:loading.remove>

                            @if ($editMode)
                                <x-button class="btn btn-submit" wire:click.prevent="formUpdate" >Update</x-button>
                            @else
                                <x-button class="btn btn-submit" wire:click.prevent="formSave" >SAVE</x-button>
                            @endif

                            <x-button class="btn btn-close" wire:click.prevent="formCloseSubCm">close</x-button>
                        </div>

                    </form>
                </div>

    </div>







</div>
