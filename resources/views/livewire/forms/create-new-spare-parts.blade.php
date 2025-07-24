<div>

    {{-- @dump($cm) --}}
    <x-success></x-success>

    <div wire:loading>
        <x-loading></x-loading>
    </div>

        <div class="form-group">
            <div class="form-label">Spare Parts Name</div>
           <input type="text" name="" id="" class="form-controll" wire:model="spare_part_name">
           <x-form-error field="spare_part_name"></x-form-error>
        </div>


        <div class="form-group">
            <div class="form-label">Spare Parts Number</div>
           <input type="text" name="" id="" class="form-controll" wire:model="spare_part_number">
         <x-form-error field="spare_part_number"></x-form-error>

        </div>

        <div class="form-group">
            <div class="form-label">Equipment</div>
            <input type="text" name="" id="" class="form-controll" value="{{ $cm->equipment->equipment }}" disabled>
            {{-- <select name="" id="" class="form-controll" wire:model.live="equipment_id">
                <option value="">Select</option>
                    @foreach ($equipments as $item)
                        <option value="{{ $item->id }}">{{ $item->equipment }}</option>
                    @endforeach

            </select> --}}

          {{-- <x-form-error field="equipment_id"></x-form-error> --}}

        </div>

        <div class="flex justify-center gap-2" wire:loading.remove>
            <x-button class="btn btn-submit" wire:click="formSave">save</x-button>
            <x-button class="btn-close" wire:click="formClose">close</x-button>
        </div>















</div>
