<div>


    {{-- @dump($cmStatus) --}}

    <div class="card">
        <div class="card-heading">
            <div class="card-header">cm status <x-button class="btn btn-info">{{ $cmStatus->sum('cm_task_status_count') }}</x-button></div>
        </div>

        <div class="card-body">

            @isset($cmStatus)
                @foreach ($cmStatus as $item)

                @php
                    $totalCm = $cmStatus->sum('cm_task_status_count');
                    $per = round($item->cm_task_status_count / $totalCm * 100);
                @endphp

                    <div class="flex p-4 justify-between transition-all ease-out duration-500 hover:scale-95 hover:shadow-md">
                        <div class="basis-1/4 hover:underline uppercase transition duration-300 ease-in-out" >
                            <a href="{{ route('cmHome',['task_status_id' =>  $item->id])}}" target="_blank">{{ $item->task_status }}</a>
                        </div>
                        <div class="flex-1 ">
                            <div class="basis-3/4 w-full bg-blue-200 rounded-full h-7 ">
                                <div class="bg-green-400 h-7 rounded-full " style="width:{{ $per }}%"><span class="ml-2">{{ $per }}%</span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset


        </div>
    </div>

</div>
