<div class=""
    x-data="{
        showCmNewEquipmentTagModal : @entangle('showCmNewEquipmentTagModal')
    }"
>

 <x-success></x-success>


    {{-- @dump($cmEquipmentTags) --}}

      @if($cmEquipmentTags->isNotEmpty())

                        <div class="card">
                            <div class="card-header">
                                <div class="card-heading flex justify-between items-center">
                                    <span>RELATED ASSETS</span>
                                    <x-button class="btn btn-blue"
                                        x-on:click="$wire.showCmNewEquipmentTagModal = true"
                                    >ADD EQUIPMENT TAGS TO CM</x-button>
                                </div>
                            </div>

                            <div class="card-body">

                                @foreach ($cmEquipmentTags as $item)

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
                        </div>


            @else

                <div class="emptyData flex justify-between items-center">
                    <span>Please add Related Equipment Tags</span>
                    <x-button class="btn btn-blue"  x-on:click="$wire.showCmNewEquipmentTagModal = true">ADD EQUIPMENT TAGS TO CM</x-button>
                </div>

            @endif








<div class="modal"
        x-show="showCmNewEquipmentTagModal"
        >
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">

                    <div class="card">

                        <div class="card-header">
                            <div class="card-heading flex justify-between items-center">
                                <span>New Equipment Tag</span>
                                <x-button class="btn btn-info">CM NO - {{ $cm->cm_number}}</x-button>
                                <span>
                                    <x-button class="btn bg-slate-200 border border-blue-500">

                                            {{$cm->equipment->equipment }}

                                    </x-button>
                                </span>
                            </div>
                        </div>

                        <div class="card-body bg-slate-200">

                            <div class="form-group flex-1">
                                        <div class="form-label">EQUIPMENT TAG</div>
                                        <select name="" id="" class="form-controll"
                                            wire:model.live="equipment_tag_id"
                                            >
                                            <option value="">Select</option>

                                                    @foreach ($equipmentTags as $item)
                                                        <option value="{{ $item->id }}">{{ $item->equipment_tag  }}</option>
                                                    @endforeach
                                        </select>

                                    <x-form-error field="equipment_tag_id"></x-form-error>

                            </div>

                            <div class="flex justify-center gap-2">
                                <x-button class="btn btn-close"
                                x-on:click="$wire.set('showCmNewEquipmentTagModal', false)"
                                >close</x-button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>





</div>
