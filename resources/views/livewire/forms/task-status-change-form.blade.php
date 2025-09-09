<div>


    {{-- @dump($lineIdForCmTaskStatus) --}}

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>


    <div class="flex justify-center ">

        <div class="form-group">
                    <select name="" id="" class="form-controll" wire:model.change="task_status_id">
                                           <option value="">Status</option>
                                                   @foreach ($taskStatus as $item)
                                                       <option value="{{ $item->id }}">{{ $item->task_status }}</option>
                                                   @endforeach


                </select>

                <x-form-error field="task_status_id" class="text-[5px]"></x-form-error>

        </div>



        <div class="form-group">
            <input type="date" name="" id="" class="form-controll" wire:model="date">

            <x-form-error field="date"></x-form-error>
        </div>


        @can('create', App\Models\CorrectiveMaintenance::class )

            <div class="form-group">

                <x-button class="btn btn-submit" wire:click="taskChange">UPDATE</x-button>
            </div>

        @endcan

    </div>



</div>
