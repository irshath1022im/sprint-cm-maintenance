<div class="">

   <div class="card basis-2/4">
    <div class="card-header">
        <div class="card-heading">RECENT CM</div>
    </div>

    <div class="card-body divide-y-2">
        @foreach ($latestCm as $item)

            <div class="flex p-3 w-full">

                <div class="basis-1/6"><a href="{{ route('admin_cm_show',['id'=>$item->id]) }}" target="_blank"
                    >CM-{{ $item->cm_number }}</a>
                </div>

                 <div class="basis-1/6">{{ $item->request_date }}</div>


                 @isset($item->materialRequest)

                         <div class="basis-2/6">
                                SUB CM - {{ $item->materialRequest->sub_cm}}
                            </div>

                         @else
                           <div class="basis-2/6">
                                NA
                            </div>

                 @endisset

                 {{-- @if($item->has('materialRequest'))

                    @if ($item->materialRequest)

                        <div class="basis-2/6">
                                SUB CM{{ $item->materialRequest->sub_cm}}
                            </div>

                        @else
                                <div class="basis-2/6">
                                NA
                            </div>
                    @endif


                 @endisset --}}



                <div class="basis-2/6">
                    <span class="">
                        <a href="{{ route('admin_equipment_show',['id' => $item->equipment->id]) }}" target="_blank">
                            {{ $item->equipment->equipment}}</a>
                        </span>
                    {{-- <div>{{ $item->remarks }}</div> --}}
                </div>

                @isset($item->cmStatus)

                    <div class="basis-3/6">
                        {{ $item->cmStatus->taskStatus->task_status }}
                    </div>

                    @else

                        <div class="basis-4">NA</div>

                     @endisset

            </div>




        @endforeach

          {{ $latestCm->links() }}


    </div>
   </div>


   




</div>
