
<div class=" ">
    <x-success></x-success>

    {{-- {{ $lineId }} --}}

        @foreach ($tags as $item)

            <div class="flex  justify-between items-center p-2 bg-slate-200 m-2 text-[12px]">

                <li class="list-none"  >
                    {{ $item->equipmentTag['equipment_tag']}}
                </li>

                <div>
                    <x-button class="btn btn-close"
                        wire:click="cmEquipmentTagDelete({{ $item->id}})"
                        wire:confirm="Are you sure you want to delete this post?">Delete
                    </x-button>
                </div>
            </div>
        @endforeach

</div>
