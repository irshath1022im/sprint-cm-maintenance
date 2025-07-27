<div>

    {{-- @dump($equipmentSpareParts) --}}


 <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>

            <form class="text-[12px]">
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

                    <div class="card bg-orange-200 text-[12px]">
                        <div class="card-header">
                            <div class="card-heading">ADD EQUIPMENT TAG</div>
                        </div>

                        <div class="card-body">


                                {{-- @livewire('components.show-cm-equipment-tags',['cmEquipmentTags' => $cmEquipmentTags]) --}}



                                <div class="flex justify-between">

                                    <div class="form-group flex-1">
                                        <div class="form-label">EQUIPMENT TAG</div>
                                        <select name="" id="" class="form-controll" wire:model.live="equipment_tag_id">
                                            <option value="">Select</option>

                                                    @foreach ($equipmentTags as $item)
                                                        <option value="{{ $item->id }}">{{ $item->equipment_tag  }}</option>
                                                    @endforeach
                                        </select>

                                    <x-form-error field="equipment_tag_id"></x-form-error>

                                    </div>

                                    <div class="form-group">
                                    <label for="" class="form-label">QTY</label>
                                    <input type="number" name="" id="" class="form-controll" wire:model="qty">
                                    <x-form-error field="qty"></x-form-error>

                                    </div>


                                </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="" class="form-label">Remark</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-controll" wire:model="remark"></textarea>
                    </div>

                    <div class="flex justify-center gap-2">
                        <x-button class="btn btn-submit" wire:click="formSave">SAVE</x-button>
                        <x-button class="btn btn-close" wire:click="formClose">close</x-button>
                    </div>

            </form>

</div>
