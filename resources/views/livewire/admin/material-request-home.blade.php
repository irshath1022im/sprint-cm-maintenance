<div>

    @inject('carbon', 'Carbon\Carbon')

    <div class="card">

        <div class="card-header">
            <div class="card-heading">NEW MATERIAL REQUEST</div>
        </div>

        <div class="card-body">

            @if ($material_requests->isNotEmpty())

                    <table class="table">
                        <thead class="table-head">
                            <th class="table-th p-2">#</th>
                            <th class="table-th p-2">REQ DATE</th>
                            <th class="table-th p-2">CM#</th>
                            <th class="table-th p-2">SUB CM #</th>
                            <th class="table-th p-2">EQUIPMENT</th>
                            <th class="table-th p-2">EQUIPMENT TAG</th>
                            <th class="table-th p-2">SPARE P NAME</th>
                            <th class="table-th p-2">SPARE P NUM</th>
                            <th class="table-th p-2">QTY</th>
                            <th class="table-th p-2">EXP DATE</th>
                            <th class="table-th p-2">REMAINING DAYS</th>
                        </thead>

                        <tbody class="table-body">

                            @foreach ($material_requests as $item)

                            @php $expectedDate = Carbon\Carbon::parse($item->expected_date)->toDateString() @endphp
                            @php $today = Carbon\Carbon::parse(now())->toDateString() @endphp
                            @php $remaingDays = Carbon\Carbon::parse(now()->toDateString())->diff($expectedDate) @endphp
                            @php $remaingDays1 = Carbon\Carbon::parse($expectedDate)->diffForHumans(Carbon\Carbon::now()) @endphp


                            <tr class="table-tr">
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td">{{ $item->date }}</td>
                                <td class="table-td">
                                    <a href="{{ route('admin_cm_show', ['id' => $item->cm->id])}}" target="_blank">
                                        {{ $item->cm->cm_number }}</a>
                                </td>
                                <td class="table-td">{{ $item->sub_cm }}</td>
                                <td class="table-td">{{ $item->equipment->equipment}}</td>
                                <td class="table-td">{{ $item->equipmentTag->equipment_tag }}</td>
                                <td class="table-td">{{ $item->sparePart->spare_part_name }}</td>
                                <td class="table-td">{{ $item->sparePart->spare_part_number }}</td>
                                <td class="table-td">{{ $item->qty }}</td>
                                <td class="table-td">{{ $expectedDate}}</td>
                                {{-- <td class="table-td">{{Carbon\Carbon::parse($remaingDays)->diffForHumans()}}</td> --}}
                                <td class="table-td">

                                @if ($expectedDate < $today )
                                    <x-button class="btn btn-close">Expired</x-button>
                                @else
                                    <x-button class="btn btn-submit">{{ $remaingDays }}</x-button>
                                @endif
                            </td>
                                {{-- <td class="table-td"><x-button class="btn btn-info">{{ Carbon\Carbon::parse($remaingDays)->diffForHun}}</x-button></td> --}}
                                {{-- <td class="table-td">{{ Carbon\Carbon::parse($item->expected_date)->toDateString()->diffInDays(Carbon\Carbon::now()->toDateString() )}}Days</td> --}}
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

            @else

                    <div class="emptyData">no Material Request Found</div>

            @endif

            {{-- <div class="card">
                <div class="card-header">
                    <div class="card-heading">REQUEST</div>
                </div>

                <div class="card-body bg-slate-200">

                    <div class="form-group">
                        <input type="text" name="" id="" placeholder="Search for cm" class="form-controll">
                    </div>

                    <div class="flex justify-between">

                        <div class="form-group">
                            <label for="" class="form-label">CM NO</label>
                            <input type="text" name="" id="" class="form-controll" disabled>
                            <span class="text-red-400">*disabled</span>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">EQUIPMENT NAME</label>
                            <input type="text" name="" id="" class="form-controll" disabled>
                            <span class="text-red-400">*disabled</span>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">EQUIPMENT TAG</label>
                            <input type="text" name="" id="" class="form-controll" disbaled>
                            <span class="text-red-400">*disabled</span>
                        </div>
                    </div>

                    <div class="form-group flex justify-between">

                            <div class="form-group">
                                <label for="" class="form-label">SUB CM NO</label>
                                <input type="text" name="" id="" class="form-controll">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Request Date</label>
                                <input type="date" name="" id="" class="form-controll">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Expected Date</label>
                                <input type="date" name="" id="" class="form-controll">
                            </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Remark</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-controll"></textarea>
                    </div>

                    <div class="flex justify-center gap-2">
                        <x-button class="btn btn-submit">SAVE</x-button>
                        <x-button class="btn btn-close">close</x-button>
                    </div>

                </div>

            </div> --}}

{{--
            
        </div>

    </div>


    {{-- For Reminder --}}


    {{-- <div class="modal">
        <div class="modal-overlay">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-heading flex justify-between items-center">
                                <span>Reminders</span>
                                <x-button class="btn btn-close">x</x-button>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




</div>
