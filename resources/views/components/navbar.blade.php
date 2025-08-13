<div>
    <nav class="bg-zinc-500 flex justify-between list-none p-4">
        {{-- <a href="{{ route('cmHome') }}"><li class="p-2 border-b border-b-orange-300 bg-slate-400 text-white"></li></a> --}}
        {{-- <a href="{{ route('admin_technician') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">TECHNICIAN</li></a> --}}
        <a href="{{ route('dashBoard') }}">
            <li class="p-2 hover:border hover:border-orange-300   text-white">DASHBOARD</li></a>

        <a href="{{ route('admin_equipment') }}">
            <li class="p-2 hover:border hover:border-orange-300   text-white">EQUIPMENT</li></a>

        <a href="{{ route('admin_tags') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">EQUIPMENT TAGS</li></a>
        <a href="{{ route('cmHome') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">CM</li></a>
        <a href="{{ route('admin_meterial_request') }}">
            <li class="p-2 hover:border hover:border-orange-300  text-white">MATERIAL REQUEST</li></a>
        <a href="{{ route('admin_batch_orders') }}">
            <li class="p-2 hover:border hover:border-orange-300    text-white">BATCH ORDERS</li></a>
        <a href="{{ route('admin_spare_parts') }}">
            <li class="p-2 hover:border hover:border-orange-300  border-b-orange-300  text-white">SPARE PARTS</li></a>
        <a href="">
            <li class="p-2 hover:border hover:border-orange-300    text-white">SERVICE DES</li></a>
    </nav>
</div>
