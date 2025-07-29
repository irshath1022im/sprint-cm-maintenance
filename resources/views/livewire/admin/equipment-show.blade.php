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
                            <span>EQUIPMENT TAGS / {{ $equipment->tags->count() }}</span>
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

                            @if ($equipment->tags->isNotEmpty())

                                @foreach ($equipment->tags  as $item)
                                    <div class="">
                                        <x-button class="btn btn-blue">
                                            <a href="{{ route('admin_tag_show', ['id'=> $item->id]) }}" target="_blank">
                                                {{ $item->equipment_tag }}</a>
                                        </x-button>
                                    </div>

                                @endforeach

                                @else

                                <div class="emptyData">Sorry!, No More Equipment Tags are registered under this equipment</div>

                            @endif

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

                            @if ($equipment->cmRequests->isNotEmpty())

                                @if ($equipment->has('cmRequests'))

                                        @foreach ($equipment->cmRequests  as $cmItem)
                                            <div>
                                            <a href="{{ route('admin_cm_show', ['id' => $cmItem->id])}}">
                                                    <x-button class="btn btn-blue">CM# {{ $cmItem->cm_number }}</x-button>
                                            </a>


                                            {{-- <x-button class="btn btn-info">
                                                        <a href="{{ route('admin_tag_show', ['id'=> $cmItem->tag->id]) }}" target="_blank">E TAG# {{ $cmItem->tag->equipment_tag }}
                                                        </a>
                                                </x-button> --}}


                                                <a href="">
                                                    <x-button class="btn btn-info">STATUS# {{ $cmItem->status }}</x-button>
                                            </a>

                                            </div>

                                        @endforeach

                                @else

                                No Records Found

                                @endif
                            @endif



                        </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <div class="card-heading">MATERIAL REQUEST</div>
                    </div>


                    {{-- @dump($equipment->materialRequest) --}}

                      @if ($equipment->materialRequest->isNotEmpty())

                                    <div class="card-body">
                                        <table class="table text-[12px]">
                                            <thead class="thead table-head">
                                                <th class="table-th">#</th>
                                                <th class="table-th">CM NO</th>
                                                <th class="table-th">SUB CM NO</th>
                                                <th class="table-th">EQUIPMENT</th>
                                                <th class="table-th">EQU TAG</th>
                                                <th class="table-th">S P NAME</th>
                                                <th class="table-th">S P NUMBER</th>
                                                <th class="table-th">BADGE NO</th>
                                                <th class="table-th">QTY</th>
                                                <th class="table-th">U PRICE</th>
                                                <th class="table-th">TOTAL</th>
                                            </thead>

                                            <tbody>
                                                    @foreach ($equipment->materialRequest as $item)

                                                        <tr class="table-tr">
                                                            <td class="table-td">{{ $loop->iteration }}</td>
                                                            <td class="table-td">{{ $item->cm->cm_number }}</td>
                                                            <td class="table-td">{{ $item->sub_cm }}</td>
                                                            <td class="table-td">{{ $item->equipmentTag->equipment->equipment }}</td>
                                                            <td class="table-td">{{ $item->equipmentTag->equipment_tag }}</td>
                                                            <td class="table-td">{{ $item->sparePart->spare_part_name }}</td>
                                                            <td class="table-td">{{ $item->sparePart->spare_part_number }}</td>
                                                            <td class="table-td">{{ $item->materialReceiving }}</td>
                                                            <td class="table-td">{{ $item->qty }}</td>
                                                            <td class="table-td">u price</td>
                                                            <td class="table-td">total</td>
                                                        </tr>
                                                    @endforeach

                                            </tbody>

                                        </table>
                                    </div>

                                @else

                                    <div class="emptyData">Sorry!, Material Request Not found</div>

                                @endif



                </div>

        </div>
    </div>





















</div>
