<div
    x-data="{
        showPartNumbers : false,
        showCM : false
    }"
    x-cloak
>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between">
                <span>EQUIPMENT TAG / <x-button class="btn btn-info">{{ $id }} /{{$tag->equipment_tag}}</x-button></span>
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
                            <span>CM/ {{ $tag->cmRequests->count() }}</span>
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

                            @if ($tag->has('cmRequests'))

                                    @foreach ($tag->cmRequests  as $cmItem)
                                        <div>
                                           <a href="{{ route('admin_cm_show', ['id' => $cmItem->id])}}">
                                                <x-button class="btn btn-blue">CM# {{ $cmItem->cm_number }}</x-button>
                                           </a>

                                             <a href="">
                                                <x-button class="btn btn-info">E TAG# {{ $cmItem->tags->equipment_tag }}</x-button>
                                           </a>

                                            <a href="">
                                                <x-button class="btn btn-info">STATUS# {{ $cmItem->status }}</x-button>
                                           </a>

                                            <a href="">
                                                <x-button class="btn btn-info">TECHNICIAN# {{ $cmItem->technician ->name}}</x-button>
                                           </a>
                                        </div>

                                    @endforeach

                            @else

                            No Records Found

                            @endif



                        </ul>
                    </div>
                </div>

        </div>
    </div>





















</div>
