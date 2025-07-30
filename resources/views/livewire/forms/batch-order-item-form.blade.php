<div>

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

    <x-success></x-success>

    {{-- @dump($material_request_items) --}}

            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-heading">ADD BATCH ITEMS</div>
                </div>

                <div class="sm-card-body">

                        @isset($material_request_items)

                    @if ($material_request_items)

                                        <div>


                                            <div class="form-group">

                                                <select name="" id="" wire:model.live="equipment_tag_id" class="form-controll">
                                                     <option value="">Select Item</option>
                                                        @foreach ($material_request_items as $item)
                                                            <option value={{ $item->equipmentTag['id'] }}>{{ $item->equipmentTag['equipment_tag'] }}</option>
                                                        @endforeach

                                                </select>
                                                <x-form-error field="equipment_tag_id"></x-form-error>
                                            </div>

                                            <div class="form-group flex justify-between">

                                                  <div>
                                                        <div class="form-label">Spare Part</div>
                                                        <input type="number" name="" id="" wire:model="spare_part_id"  class="form-controll">
                                                        <x-form-error  field="spare_part_id"></x-form-error>
                                                    </div>

                                                    <div>
                                                        <div class="form-label">Qty</div>
                                                        <input type="number" name="" id="" wire:model="qty"  class="form-controll">
                                                        <x-form-error  field="qty"></x-form-error>
                                                    </div>

                                                    <div>
                                                        <div class="form-label">Unit Price</div>
                                                        <input type="number" name="" id="" wire:model.blur="unit_price" class="form-controll">
                                                        <x-form-error field="unit_price"></x-form-error>
                                                    </div>

                                                    <div>
                                                        <div class="form-label">Total</div>
                                                        <input type="number" name="" id="" wire:model.blur="total" class="form-controll">
                                                        <x-form-error field="total"></x-form-error>

                                                    </div>
                                            </div>


                                            <div>
                                                <x-button class="btn btn-submit" wire:click="addItems">Add</x-button>
                                                <x-button class="btn btn-close" wire:click="formClose">close</x-button>
                                            </div>

                                        </div>




                    @endif

                @endisset


                </div>
            </div>



</div>
