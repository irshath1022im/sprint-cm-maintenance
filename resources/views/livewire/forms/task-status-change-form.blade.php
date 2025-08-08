<div>

    @dump($cmStatusLineId)
     <select name="" id="" class="form-controll" wire:model="cmStatus" wire:change="taskChange">
                                    @foreach ($taskStatus as $item)
                                        <option value="{{ $item->id }}">{{ $item->task_status }}</option>
                                    @endforeach
    </select>
</div>
