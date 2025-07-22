<div
    x-data="{
        showPartNumbers : false
    }"
    x-soak
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
                        <ul class="">
                            @foreach ($equipment->partNumbers  as $item)
                                <div>

                                    <x-button class="btn btn-blue">{{ $item->equipment_part_number }}</x-button>
                                </div>

                            @endforeach

                        </ul>
                    </div>
                </div>

                 <div class="card">
                    <div class="card-header">
                        <div class="card-heading flex justify-between items-center">
                            <span>SERVICE REQUESTS / {{ $equipment->partNumbers->count() }}</span>
                            <x-button class="btn btn-blue"
                                x-on:click="showPartNumbers = !showPartNumbers"
                            >EXPAND/CLOSE</x-button>
                        </div>
                    </div>

                    <div class="card-body"
                        x-show="showPartNumbers"
                        x-transition.duration.500ms
                    >
                        <ul class="">
                            @foreach ($equipment->partNumbers  as $item)
                                <div>

                                    <x-button class="btn btn-blue">{{ $item->equipment_part_number }}</x-button>
                                </div>

                            @endforeach

                        </ul>
                    </div>
                </div>

        </div>
    </div>





















</div>
