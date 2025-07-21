<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <span>ITEMS</span>
                <x-button class="btn btn-blue">NEW ITEM</x-button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-head">
                    <td class="table-td">IMAGE</td>
                    <td class="table-td">ID</td>
                    <td class="table-td">ITEM</td>
                    <td class="table-td">PART NUMBER</td>
                    <td class="table-td">REMARK</td>
                </thead>

                <tbody class="table-body">

                    @if ($items->count()>1)
                        @foreach ($items as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $item->image }}</td>
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td">{{ $item->item }}</td>
                                <td class="table-td">{{ $item->part_number }}</td>
                                <td class="table-td">{{ $item->remark }}</td>
                                <td class="table-td flex justify-end">
                                    <x-button class="btn btn-blue">Edit</x-button>
                                    <x-button class="btn btn-close">Delete</x-button>
                                </td>
                            </tr>

                        @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>

</div>
