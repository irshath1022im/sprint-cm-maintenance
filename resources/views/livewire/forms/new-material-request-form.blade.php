<div>

    {{-- @dump($equipmentSpareParts) --}}


 <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>


                    <div class="flex justify-between">

                        <div class="form-group">
                            <label for="" class="form-label">CM NO</label>
                            <input type="text" name="" id="" class="form-controll" disabled value="{{ $cm['cm_number'] }}">
                            <span class="text-red-400">*disabled</span>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">EQUIPMENT NAME</label>
                            <input type="text" name="" id="" class="form-controll" disabled value="{{ $cm->equipment->equipment }}">
                            <span class="text-red-400">*disabled</span>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">EQUIPMENT TAG</label>
                            <input type="text" name="" id="" class="form-controll" disabled value="{{ $cm->tag->equipment_tag}}">
                            <span class="text-red-400">*disabled</span>
                        </div>
                    </div>

                    <div class="form-group flex justify-between">

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

                    <div class="flex justify-between">

                         <div class="form-group flex-1">
                            <div class="form-label">Spare Parts</div>
                            <select name="" id="" class="form-controll" wire:model.live="spare_part_id">
                                <option value="">Select</option>
                                    @foreach ($equipmentSpareParts as $item)
                                        <option value="{{ $item->id }}">{{ $item->spare_part_name  }} / {{ $item->spare_part_number }}</option>
                                    @endforeach

                            </select>

                        <x-form-error field="spare_part_id"></x-form-error>

                        </div>

                        <div class="form-group">
                        <label for="" class="form-label">QTY</label>
                        <input type="number" name="" id="" class="form-controll" wire:model="qty">
                         <x-form-error field="qty"></x-form-error>

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


</div>
