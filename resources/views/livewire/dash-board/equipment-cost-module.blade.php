<div>


    {{-- @dump($equipment) --}}
    <div class="uppercase font-bold text-xl bg-orange-100 p-4 text-center rounded-md">
        high rate equipment
    </div>


    <div class="space-y-4 mb-2 mt-3">

        @foreach ($equipment as $item)

            <div class=" h-[123px] bg-[linear-gradient(to_right,#9AFFD3,#03C463)] rounded-md flex flex-col items-center justify-center">
                <div class="uppercase font-bold text-[20px] text-[2D4A00]">
                      <a href="{{ route('admin_equipment_show', ['id'=>$item->id]) }}" target="_blank">
                        {{ $item->equipment }}
                      </a>
                </div>

                <div class="text-[5702FF] font-bold text-[20px]" >
                       <x-price class="text-lg" price="
                       {{$item->batch_order_items_sum_total }}"></x-price>
                </div>

        </div>
        @endforeach

        {{$equipment->links() }}

    </div>


</div>
