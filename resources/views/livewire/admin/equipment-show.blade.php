<div
    x-data="{
        showPartNumbers : false,
        showCM : false
    }"
    x-cloak
>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">EQUIPMENT / <x-button class="btn btn-info">{{ $id }} /{{$equipment->equipment}}</x-button></div>
        </div>

        <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        <div class="card-heading flex justify-between items-center">
                            <span>PART NUMBERS / {{ $equipment->partNumbers->count() }}</span>
                            <x-button class="btn btn-blue"
                                x-on:click="showPartNumbers = !showPartNumbers"
                            >EXPAND/CLOSE</x-button>
                        </div>
                    </div>

                    <div class="card-body"
                        x-show="showPartNumbers"
                        x-transition.duration.500ms
                    >
                        <ul class="flex flex-wrap gap-1">

                             @empty($equipment->partNumbers)
                                        No Records found
                            @endempty

                            @foreach ($equipment->partNumbers  as $item)
                                <div class="">
                                    <x-button class="btn btn-blue">{{ $item->equipment_part_number }}</x-button>
                                </div>

                            @endforeach

                        </ul>
                    </div>
                </div>

                 <div class="card">
                    <div class="card-header">
                        <div class="card-heading flex justify-between items-center">
                            <span>CM/ {{ $equipment->cmRequests->count() }}</span>
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

                            @if ($equipment->has('cmRequests'))

                                    @foreach ($equipment->cmRequests  as $cmItem)
                                        <div>
                                           <a href="{{ route('admin_cm_show', ['id' => $cmItem->id])}}">
                                                <x-button class="btn btn-blue">CM# {{ $cmItem->cm_number }}</x-button>
                                           </a>

                                             <a href="">
                                                <x-button class="btn btn-info">E_PART# {{ $cmItem->equipmentPartNumber->equipment_part_number }}</x-button>
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
