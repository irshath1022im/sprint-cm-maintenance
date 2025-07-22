<div class="">


   @if (session()->has('created'))

    <div class="p-4 mb-4 text-sm text-green-100 bg-green-600 rounded-lg" role="alert">
    <span class="font-medium">  {{ session('created') }}</span>
        <a href={{ route('admin_cm_show',['id' => $updated_id]) }}>
            <x-button class="btn btn-info">GO TO</x-button>
        </a>
    </div>

    @endif


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
                          <select name="" id="" wire:model.live="equipment_id" class="form-controll">
                                <option value="">Select</option>
                                {{-- {{ $qty? }} --}}
                                    @foreach ($equipment as $item)
                                            <option value="{{ $item->id }}">{{ $item->equipment }}</option>
                                    @endforeach

                            </select>

                              <x-form-error field="equipment_id"></x-form-error>
                    </div>

                    <div class="form-group flex-auto">
                         <div class="form-label">EQUIPMENT PART</div>
                          <select name="" id="" wire:model.live="equipment_part_id" class="form-controll">
                                <option value="">Select</option>
                                {{-- {{ $qty? }} --}}
                                    @foreach ($equipmentParts as $equParts)
                                            <option value="{{ $equParts->id }}">{{ $equParts->equipment_part_number }}</option>
                                    @endforeach

                            </select>

                              <x-form-error field="equipment_part_id"></x-form-error>
                    </div>

                     <div class="form-group">

                        <label for="" class="form-label">STATUS</label>
                        <select name="" id="" class="form-controll" wire:model="status">
                                <option value="" class="form-controll">Select</option>

                                    <option value="active">Active</option>
                                    <option value="completed">Completed</option>

                            </select>

                         <x-form-error field="status"></x-form-error>

                    </div>

                </div>

                <div>
                    <textarea name="" id="" cols="30" rows="5" wire:model="remarks" class="form-controll" placeholder="Remark"></textarea>
                </div>



                <x-button class="btn-submit" wire:click="formSubmit">SUBMIT</x-button>

            </div>
            {{-- END OF FORM  --}}
        </div>
    </div>

























</div>
