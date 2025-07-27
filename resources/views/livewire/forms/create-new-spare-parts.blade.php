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

        <div class="form-group flex-auto">
                         <div class="form-label">EQUIPMENT</div>
                          <select name="" id="" wire:model="equipment_id" class="form-controll">
                                <option value="">Select</option>
                                    @foreach ($equipment as $item)
                                            <option value="{{ $item->id }}">{{ $item->equipment }}</option>
                                    @endforeach

                            </select>

                              <x-form-error field="equipment_id"></x-form-error>
        </div>


        <div class="flex justify-center gap-2" wire:loading.remove>
            @if ($formMode == 'edit')

                <x-button class="btn btn-submit" wire:click="formUpdate">Update</x-button>

            @else
            <x-button class="btn btn-submit" wire:click="formSave">save</x-button>

            @endif

            <x-button class="btn-close" wire:click="formClose">close</x-button>
        </div>















</div>
