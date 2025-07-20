<div>


        <div class="card">

            <div class="card-header">
                <div class="card-heading">SERVICE DISCRIPTION </div>
            </div>

            <div class="card-body bg-blue-200">

                <div>
                    <div class="form-group">
                        <div class="form-label">SERVICE TYPE</div>
                       <select name="" id="" class="form-controll" wire:model="service_type">
                            <option value="" class="form-controll">Select</option>
                                <option value="replaced">PARTS REPLACE</option>
                                <option value="repaired">PARTS REPAIR</option>

                        </select>
                    </div>
                </div>

                <div class="flex justify-between">

                        <div class="form-group">
                         <div class="form-label">ITEM</div>
                          <select name="" id="" wire:model="item_id">
                                <option value="">Select</option>
                                {{-- {{ $qty? }} --}}
                                    @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->item }}</option>
                                    @endforeach

                            </select>
                       </div>

                       <div class="form-group">
                        <div class="form-label">REPLACED PART</div>
                            <select name="" id="" wire:model.live="spare_part_id">
                                <option value="">Select</option>
                                {{-- {{ $qty? }} --}}
                                    @foreach ($sParts as $item)
                                            <option value="{{ $item->id }}">{{ $item->part_name }}</option>
                                    @endforeach

                            </select>
                      </div>

                       <div class="form-group">
                         <div class="form-label">PART NUMBER</div>
                         <input type="text" name="" id="" class="form-controll" wire:model="spare_part_number">
                       </div>


                       <div class="form-group">
                         <div class="form-label">QTY</div>
                         <input type="text" name="" id="" class="form-controll" wire:model="qty">
                       </div>

                       <div class="form-group">
                         <div class="form-label">UNIT PRICE</div>
                         <input type="text" name="" id="" class="form-controll" wire:model="unit_price">
                       </div>

                       <div class="form-group">
                         <div class="form-label">TOTAL</div>
                         <input type="text" name="" id="" class="form-controll" wire:model="total">
                       </div>
                    </div>

                    <div>
                        <textarea name="" id="" class="w-full" placeholder="Service Description" wire:model="service_description"></textarea>
                    </div>

                     <x-button class="btn-submit" wire:click='formSubmit'>SUBMIT</x-button>

                </div>

        </div>




























</div>
