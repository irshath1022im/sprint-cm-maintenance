<div class="">

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

    <div class="card bg-stone-400">
        <div class="card-header">
            <div class="card-heading">
                NEW CORRECTIVE MAINTENANCE CREATION FORM
            </div>
        </div>

        <div class="card-body bg-slate-200">
            <div>

                <div class="flex justify-between">

                    <div class="form-group flex-auto">
                        <label for="" class="form-label">CM NUMBER</label>
                        <input type="text" name="" id="" class="form-controll" wire:model="cm_number">

                        <x-form-error field="cm_number"></x-form-error>
                    </div>

                    <div class="form-group flex-auto">
                        <label for="" class="form-label">REQUEST DATE</label>
                        <input type="date" name="" id="" class="form-controll" wire:model="request_date">
                        <x-form-error field="request_date"></x-form-error>
                    </div>

                     <div class="form-group flex-auto">
                        <label for="" class="form-label">CM REQUESTED BY</label>
                            <select name="" id="" class="form-controll" wire:model="technician_id">
                                <option value="" class="form-controll">Select</option>
                                @foreach ($technicians as $technician)
                                    <option value="{{ $technician->id }}">{{ $technician['name'] }}</option>
                                @endforeach
                            </select>

                        <x-form-error field="technician_id"></x-form-error>

                    </div>

                </div>


                <div class="flex justify-between">
                    <div class="form-group flex-auto">
                         <div class="form-label">EQUIPMENT</div>
                          <select name="" id="" wire:model="equipment_id" class="form-controll">
                                <option value="">Select</option>
                                {{-- {{ $qty? }} --}}
                                    @foreach ($equipment as $item)
                                            <option value="{{ $item->id }}">{{ $item->equipment }}</option>
                                    @endforeach

                            </select>

                              <x-form-error field="equipment_id"></x-form-error>
                    </div>


                </div>

                <div>
                    <textarea name="" id="" cols="30" rows="5" wire:model="remarks" class="form-controll" placeholder="Remark">

                    </textarea>

                      <x-form-error field="remarks"></x-form-error>
                </div>





                @if ($formMode == 'edit')

                    <x-button class="btn-submit" wire:click="formEdit">UPDATE</x-button>

                 @else

                  <x-button class="btn-submit" wire:click="formSubmit">SUBMIT</x-button>

                @endif



                <x-button class="btn-close" wire:click="formClose">CLOSE</x-button>

            </div>
            {{-- END OF FORM  --}}
        </div>
    </div>

























</div>
