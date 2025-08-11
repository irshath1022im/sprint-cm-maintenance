<div>

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

    <x-success></x-success>

    {{-- @dump($cm) --}}

    {{-- @dump($material_request_items) --}}

            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-heading">ADD BATCH ITEMS</div>
                </div>

                <div class="sm-card-body">

                @isset($this->materialRequestItems)

                    @if ($this->materialRequestItems->isNotEmpty())



                                       <form>


                                            <div class="form-group">

                                                <select name="" id="" wire:model.change="materialRequestLineId" class="form-controll">
                                                     <option value="">Select Item</option>
                                                        @foreach ($this->materialRequestItems as $item)

                                                        {{-- get the line id of material request items as a value --}}
                                                            <option value={{ $item->id }}>{{ $item->equipmentTag->equipment_tag }}</option>
                                                        @endforeach

                                                </select>
                                                <x-form-error field="materialRequestLineId"></x-form-error>
                                            </div>

                                            <div class="form-group flex justify-between">

                                                  <div>
                                                        <div class="form-label">Spare Part Number</div>
                                                        <input type="text" name="" id="" wire:model="spare_part_number"  class="form-controll" disabled>
                                                    </div>
                                                    <div>
                                                        <div class="form-label">S P Name</div>
                                                        <input type="text" name="" id="" wire:model="spare_part_name"  class="form-controll" disabled>
                                                    </div>

                                                    <div>
                                                        <div class="form-label">Qty</div>
                                                        <input type="number" name="" id="" wire:model="qty"  class="form-controll" disabled>
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


                                            <div wire:loading.remove>
                                                <x-button type="button" class="btn btn-submit" wire:click="addItems">Add</x-button>
                                                <x-button class="btn btn-close" wire:click="formClose">close</x-button>
                                            </div>

                                        </form>
                        {{-- <form action="">

                            <div class="form-group grid grid-cols-12 gap-2" >
                                <label for="" class="form-label col-span-3">Equipment Tag</label>
                                <label for="" class="form-label col-span-2">Spare Part Number</label>
                                <label for="" class="form-label col-span-1">Spare Part Name</label>
                                <label for="" class="form-label  col-span-1">Qty</label>
                                <label for="" class="form-label  col-span-2">Unit Price</label>
                                <label for="" class="form-label  col-span-2">Total</label>
                                <label for="" class="form-label  col-span-1">ACTION</label>
                            </div>

                            @foreach ($material_request_items as $item)

                            {{-- @dump($item) --}}

                                {{-- <div class="form-group grid grid-cols-12 gap-2 text-[12px]" >
                                    <input type="text" name="" id="" class="form-controll col-span-3"  wire:model="equipmen_tag_id" placeholder="{{ $item->equipmentTag->equipment_tag }}" wire:model.fill={{ $item->equipment_tag_id }}>
                                    <input type="text" name="" id="" class="form-controll col-span-2" placeholder="Spare Part Number">
                                    <input type="text" name="" id="" class="form-controll col-span-1" placeholder="Spare Part Name">
                                    <input type="number" name="" id="" class="form-controll col-span-1" placeholder="Qty">
                                    <input type="number" name="" id="" class="form-controll col-span-2" placeholder="Unit Price">
                                    <input type="number" name="" id="" class="form-controll col-span-2" placeholder="Total">
                            </input>
                            @endforeach

                        </form> --}}



                    @else

                        <div class="emptyData">Sorry!, No Material Request Items has been added</div>
                    @endif

                @endisset


                </div>
            </div>



</div>
