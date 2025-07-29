<div class=""
    x-data="{
        showCmNewEquipmentTagModal : @entangle('showCmNewEquipmentTagModal'),
        cmEquipmentTagsShow : false
    }"
>

 <x-success></x-success>


    {{-- @dump($cmEquipmentTags) --}}

      @if($cmEquipmentTags->isNotEmpty())

                        <div class="card bg-blue-200">
                            <div class="card-header">
                                <div class="card-heading flex  items-center justify-between">

                                    <div>

                                        <span>RELATED ASSETS</span>
                                        <x-button type="button" class="btn btn-submit ml-2"
                                                x-on:click="$wire.showCmNewEquipmentTagModal = true">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                                </svg>

                                        </x-button>
                                    </div>

                                    <div>
                                        <x-button class="btn btn-blue"
                                            x-on:click="cmEquipmentTagsShow = ! cmEquipmentTagsShow"
                                        >Expand/close</x-button>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body"
                                x-show="cmEquipmentTagsShow"
                                x-transition.duration.500ms
                            >

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

                <div class="emptyData flex items-center">
                    <span>Please add Related Equipment Tags</span>
                    <x-button type="button" class="btn btn-submit ml-2" x-on:click="$wire.showCmNewEquipmentTagModal = true">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                                </svg>

                       </x-button>
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

                                                    @foreach ($cm->equipment->tags as $item)
                                                        <option value="{{ $item->id }}">{{ $item->equipment_tag  }}</option>
                                                    @endforeach
                                        </select>

                                    <x-form-error field="equipment_tag_id"></x-form-error>

                            </div>

                            <div class="flex justify-center gap-2">
                                <x-button class="btn btn-close"
                                x-on:click="$wire.showCmNewEquipmentTagModal = false"
                                >close</x-button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>





</div>
