<div
    x-data="{
        cmCreateModal : @entangle('cmCreateModal')
    }"

    x-cloak
>


{{-- @dump(Request::all()) --}}
<div wire:loading>
        <x-spinner></x-spinner>
</div>

{{-- @dump($this->cmStatus) --}}

    <x-success></x-success>


    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <div>CORRECTIVE MAINTENANCE LISTS</div>

                    <x-button class="btn btn-blue" x-on:click="$wire.set('cmCreateModal', true)">NEW CM</x-button>

            </div>
        </div>

        <div class="card-body">

            <div class="flex items-center justify-between">

                <div class="form-group">
                    <select type="" class="form-controll" wire:model.change="filterStatus">
                        <option value="">Status</option>
                        @foreach ($this->cmStatus as $item)
                         <option value="{{ $item->id }}">{{ $item->task_status }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="flex items-center p-2">
                             <input type="text" name="" id="" class="form-controll" placeholder="Search By CM Number" wire:model.live.debounce.500ms="searchByCmNumber">

                </div>

            </div>



             {{-- @dump($cms->links()->paginator) --}}


                    @if ($cms->count() > 0)

                        <div class="grid grid-cols-12 gap-1 w-full border-b uppercase bg-slate-200 p-2 rounded-t-md">
                            <div class="col-span-1">#</div>
                            <div class="col-span-1">CM NO</div>
                            <div class="col-span-1">REQ DATE</div>
                            {{-- <div class=" col-span-1 text-center">TECHNICIAN</div> --}}
                            <div class="col-span-3">EQUIPMENT</div>
                            <div class="col-span-1">TASK STATUS</div>
                            <div class="col-span-3" ></div>
                        </div>

                            @foreach ($cms as $item)

                            {{-- @dump($item->cmStatus) --}}

                            <div class="grid grid-cols-12 gap-1 items-center space-y-2 mt-2 uppercase text-sm
                                @isset( $item->cmStatus->task_status_id)

                                    @if ( $item->cmStatus->task_status_id == 6 )
                                            bg-green-200
                                    @endif

                                @endisset

                             ">

                                {{-- cm number section --}}

                                @php
                                    if($cms->links()->paginator->currentPage() == 1) {
                                        $pageNumber = 1;
                                        $goneItems = 0;

                                    } else{
                                        //  $goneItems = 8*1;
                                         $pageNumber = $cms->links()->paginator->currentPage();
                                         $goneItems = $cms->links()->paginator->perPage() * ($cms->links()->paginator->currentPage()-1);
                                    }
                                @endphp

                                {{-- @dump($goneItems) --}}

                                    <div class="ml-1  col-span-1">{{ ($loop->index + 1) + $goneItems }}</div>

                                    <div class=" col-span-1 rounded-full w-16 h-16 bg-zinc-500 flex justify-center items-center text-white">
                                        {{$item->cm_number}}
                                    </div>


                                    <div class="col-span-1">{{ $item->request_date }}</div>
                                    {{-- <div class=" col-span-1 ">{{ $item->technician->name }}</div> --}}


                                    <div class="col-span-3">
                                        <span class="">
                                            <a href="{{ route('admin_equipment_show',['id' => $item->equipment->id]) }}" target="_blank">
                                                {{ $item->equipment->equipment}}</a>
                                        </span>
                                        {{-- <div>{{ $item->remarks }}</div> --}}
                                    </div>



                                    @isset($item->cmStatus)

                                        <div class=" col-span-3">{{ $item->cmStatus->taskStatus->task_status }}</div>

                                        @else
                                          <div class=" col-span-3">NA</div>

                                    @endisset

                                    <section class="items-center p-2 flex">

                                        <a href="{{ route('admin_cm_show', ['id' => $item->id])}}">
                                            <x-button class="btn btn-blue">VIEW</x-button>
                                        </a>
                                        <x-button
                                            class="btn btn-close"
                                            wire:click="cmEditRequest({{ $item }})"
                                        >Edit</x-button>
                                        {{-- <x-button class="btn btn-close">DELETE</x-button> --}}

                                    </section>
                            </div>

                            @endforeach

                    @else

                     <x-button class="emptyData">NO CM CREATED</x-button>

                    @endif

            </ul>

            <div class="mt-2">
                {{ $cms->links() }}
            </div>



        </div>

    </div>










<div class="modal"
    x-show="cmCreateModal"
>
    <div class="modal-overlay">
        <div class="modal-body">
            <div class="modal-content">
                @livewire('forms.cm-create')
            </div>
        </div>
    </div>
</div>


</div>
