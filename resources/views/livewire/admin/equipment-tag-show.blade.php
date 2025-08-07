<div
    x-data="{
        showPartNumbers : false,
        showCM : true,
        showServiceRequest:false
    }"
    x-cloak
>


{{-- @use(`Illuminate\Support\Number`) --}}
{{-- @dump($tag->cmRequests[0]->serviceRequest) --}}

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between">
                <span>EQUIPMENT TAG / <x-button class="btn btn-info">{{$tag->equipment_tag}}</x-button></span>

                            {{-- <x-button class="btn btn-close">Total Expenses => {{ $tag->serviceRequests->sum('total') }} Qr</x-button> --}}


                <x-button class="btn btn-info">
                    <a href="{{ route('admin_equipment_show',['id' => $tag->equipment->id]) }}" target="_blank">
                        {{$tag->equipment->equipment}}</a>
                    </x-button>
            </div>
        </div>

        <div class="card-body">


                 <div class="card">
                    <div class="card-header">
                        <div class="card-heading flex justify-between items-center">
                            <span>CM/ {{ $tag->cmEquipmentTags->count() }}</span>
                            <x-button class="btn btn-blue"
                                x-on:click="showCM = !showCM"
                            >EXPAND/CLOSE</x-button>
                        </div>
                    </div>

                    <div class="card-body"
                        x-show="showCM"
                        x-transition.duration.500ms
                    >
                        <ul class="">

                            @if ( $tag->cmEquipmentTags->isNotEmpty())

                                    @foreach ( $tag->cmEquipmentTags  as $cmItem)
                                        <div>
                                           <a href="{{ route('admin_cm_show', ['id' => $cmItem->id])}}">
                                                <x-button class="btn btn-blue">CM# {{ $cmItem->cmNumber->cm_number}}</x-button>
                                           </a>

                                        </div>
                                    @endforeach

                            @else

                            <div class="emptyData bg-red-200">There are no service / maintenance request yet</div>

                            @endif



                        </ul>
                    </div>
                </div>


            @livewire('admin.equipment-tag.material-request-table-equipment-tag-show', ['tag' => $id])


        </div>
    </div>





















</div>
