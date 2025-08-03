<div
    x-data="{
        showPartNumbers : false,
        showCM : true,
        showServiceRequest:false
    }"
    x-cloak
>

{{-- @dump($tag->cmRequests[0]->serviceRequest) --}}

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between">
                <span>EQUIPMENT TAG / <x-button class="btn btn-info">{{ $id }} /{{$tag->equipment_tag}}</x-button></span>
                        {{-- @if ($tag->equipcmRequests->isNotEmpty())

                            <x-button class="btn btn-close">Total Expenses => {{ $tag->serviceRequests->sum('total') }} Qr</x-button>
                        @endif --}}

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
                            <span>CM/ {{ $tag->equipment->cmRequests->count() }}</span>
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

                            @if ($tag->equipment->cmRequests->isNotEmpty())

                                    @foreach ($tag->equipment->cmRequests  as $cmItem)
                                        <div>
                                           <a href="{{ route('admin_cm_show', ['id' => $cmItem->id])}}">
                                                <x-button class="btn btn-blue">CM# {{ $cmItem->cm_number }}</x-button>
                                           </a>

                                        </div>
                                    @endforeach

                            @else

                            <div class="emptyData bg-red-200">There are no service / maintenance request yet</div>

                            @endif



                        </ul>
                    </div>
                </div>


            @livewire('admin.equipment-tag.material-request-table-equipment-tag-show',)


        </div>
    </div>





















</div>
