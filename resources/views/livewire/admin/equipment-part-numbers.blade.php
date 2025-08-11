<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <span>EQUIPMENT PART NUMBER <x-button class="btn btn-info">{{ $part_numbers->total() }}</x-button></span>
                <x-button class="btn btn-blue">NEW PART NUMBER</x-button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-head">
                    <td class="table-td">ID</td>
                    <td class="table-td">PART NUMBER</td>
                    <td class="table-td">EQUIPMENT</td>
                </thead>

                <tbody class="table-body">

                    @if ($part_numbers->count()>1)
                        @foreach ($part_numbers as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td">{{ $item->equipment_part_number }}</td>

                                    <td class="table-td">
                                        <a href="{{ route('admin_equipment_show',['id' => $item->equipment->id]) }}" target="_blank">{{ $item->equipment->equipment }}</a></td>

                                <td class="table-td flex justify-end">
                                    <x-button class="btn btn-blue">Edit</x-button>
                                    {{-- <x-button class="btn btn-close">Delete</x-button> --}}
                                </td>
                            </tr>

                        @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>

        <div>
            {{ $part_numbers->links() }}
        </div>

</div>
