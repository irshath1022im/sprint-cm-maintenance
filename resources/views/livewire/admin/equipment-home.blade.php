<div class="">

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                {{-- <span>EQUIPMENT <x-button class="btn btn-info">{{ $equipment->total() }}</x-button></span> --}}
                <x-button class="btn btn-blue">NEW EQUIPMENT</x-button>
            </div>
        </div>

        <div class="card-body">
            <form action="" class="w-[50%] flex justify-center mx-auto sticky top-0">
                <input type="text" name="" id="" class="form-controll" placeholder="Equipment Name" wire:model.live ="equipmentSearch">
            </form>

            <table class="table">
                <thead class="table-head">
                    <td class="table-td">IMAGE</td>
                    <td class="table-td">ID</td>
                    <td class="table-td">EQUIPMENT</td>
                    <td class="table-td">TAGS COUNT</td>
                    <td class="table-td">REMARK</td>
                </thead>

                <tbody class="table-body">

                    @if ($equipment->count()>1)
                        @foreach ($equipment as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $item->image }}</td>
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td"><a href="{{ route('admin_equipment_show',['id'=>$item->id]) }}">{{ $item->equipment }}</a></td>
                                <td class="table-td">{{ $item->tags->count() }}</td>
                                <td class="table-td">{{ $item->remark }}</td>

                                @can('update', $item)

                                    <td class="table-td flex justify-end">
                                        <x-button class="btn btn-blue">Edit</x-button>
                                        <x-button class="btn btn-close">Delete</x-button>
                                    </td>
                                @endcan
                            </tr>

                        @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>


</div>
