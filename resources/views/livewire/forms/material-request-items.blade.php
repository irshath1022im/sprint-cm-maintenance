<div>

    <x-success></x-success>

    <div wire:loading>

        <x-spinner></x-spinner>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">Part Request for Sub Cm</div>
        </div>

        <div class="card-body">

               <x-button type="button" class="btn btn-submit" wire:click.prevent="reloadSpareParts">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                                    </svg>
                </x-button>

                 @if ($equipmentSpareParts->isEmpty())

                                <div class="emptyData">Sorr!, Could not find any spare parts for this Equipment
                                    <span>
                                        <x-button class="btn btn-info"
                                           wire:click="formClose"
                                        >
                                            <a href="{{ route('admin_spare_parts') }}" target="_blank">SpareParts</a>
                                        </x-button>
                                    </a>
                                    </span>


                                </div>

                            @else

                            <div class="flex justify-between">

                                <div class="form-group flex-1">

                                    <div class="form-label flex justify-between items-center align-middle">

                                        <span>Spare Part</span>
                                        <a href="{{ route('admin_spare_parts') }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                    </div>
                                    <select name="" id="" class="form-controll" wire:model.live="spare_part_id">
                                        <option value="">Select</option>

                                        @foreach ($equipmentSpareParts as $item)

                                         <option value="{{ $item->id }}">{{ $item->spare_part_name }}</option>

                                        @endforeach
                                    </select>

                                     <x-form-error  field="spare_part_id"></x-form-error>
                                </div>

                                  <div class="form-group flex-1">

                                    <div class="form-label">Equipment Tag</div>
                                    <select name="" id="" class="form-controll" wire:model="equipment_tag_id">
                                        <option value="">Select</option>

                                        @foreach ($cmEquipmentTags as $item)

                                         <option value="{{ $item->equipmentTag->id }}">{{ $item->equipmentTag->equipment_tag }}</option>

                                        @endforeach
                                    </select>
                                     <x-form-error field="equipment_tag_id"></x-form-error>
                                </div>

                                <div class="form-group flex-1">
                                    <div class="form-label">Qty</div>
                                    <input type="number" name="" id="" class="form-controll" wire:model="qty">
                                    <x-form-error field="qty"></x-form-error>
                                </div>

                                   {{-- <div class="form-group">
                                        <x-button type="button" class="btn btn-submit" wire:click="addItemsToRequest">add</x-button>
                                </div> --}}

                            </div>


                    @endif

                    <div class="form-group">
                        <label for="" class="form-label">Remark</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-controll" wire:model="remark"></textarea>
                    </div>

                    <div class="flex justify-center gap-2">
                        <x-button class="btn btn-submit" wire:click.prevent="formSave" >SAVE</x-button>
                        <x-button class="btn btn-close" wire:click="formClose">close</x-button>
                    </div>

            </form>


        </div>
    </div>




</div>
