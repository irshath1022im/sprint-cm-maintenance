<div>


    {{-- @dump($lineIdForCmTaskStatus) --}}

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

     <select name="" id="" class="form-controll" wire:model="cmStatus" wire:change="taskChange">
                            <option value="">Status</option>
                                    @foreach ($taskStatus as $item)
                                        <option value="{{ $item->id }}">{{ $item->task_status }}</option>
                                    @endforeach
    </select>


</div>
