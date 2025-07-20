<div class="">


   @if (session()->has('created'))

    <div class="p-4 mb-4 text-sm text-green-100 bg-green-600 rounded-lg" role="alert">
    <span class="font-medium">  {{ session('created') }}</span>
        <a href={{ route('cm_show',['id' => $updated_id]) }}>
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

                <div class="form-group">
                    <label for="" class="form-label">CM NUMBER</label>
                    <input type="text" name="" id="" class="form-controll" wire:model="cm_number">

                    <x-form-error field="cm_number"></x-form-error>
                </div>

                   <div class="form-group">
                    <label for="" class="form-label">CM REQUESTED BY</label>
                        <select name="" id="" class="form-controll" wire:model="technician_id">
                            <option value="" class="form-controll">Select</option>
                            @foreach ($technicians as $technician)
                                <option value="{{ $technician->id }}">{{ $technician['name'] }}</option>
                            @endforeach
                        </select>

                <x-form-error field="technician_id"></x-form-error>

                </div>

                   <div class="form-group">
                    <label for="" class="form-label">REQUEST DATE</label>
                    <input type="date" name="" id="" class="form-controll" wire:model="request_date">
                       <x-form-error field="request_date"></x-form-error>
                </div>

                   <div class="form-group">
                    <label for="" class="form-label">STATUS</label>

                    <select name="" id="" class="form-controll" wire:model="status">
                            <option value="" class="form-controll">Select</option>

                                <option value="active">Active</option>
                                <option value="pending">Pending</option>

                        </select>

                         <x-form-error field="status"></x-form-error>

                </div>

                    <x-button class="btn-submit" wire:click="formSubmit">SUBMIT</x-button>
            </div>
            {{-- END OF FORM  --}}
        </div>
    </div>

























</div>
