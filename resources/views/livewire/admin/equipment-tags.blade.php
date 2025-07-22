<div>
   <div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <span>EQUIPMENT TAG <x-button class="btn btn-info">{{ $tags->total() }}</x-button></span>
                <x-button class="btn btn-blue">NEW PART NUMBER</x-button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-head">
                    <td class="table-td">ID</td>
                    <td class="table-td">EQUIPMENT TAG</td>
                    <td class="table-td">EQUIPMENT</td>
                </thead>

                <tbody class="table-body">

                    @if ($tags->count()>1)
                        @foreach ($tags as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td"><a href="{{ route('admin_tag_show', ['id'=> $item->id]) }}" target="_blank">{{ $item->equipment_tag }}</a></td>

                                    <td class="table-td">
                                        <a href="{{ route('admin_equipment_show',['id' => $item->equipment->id]) }}" target="_blank">{{ $item->equipment->equipment }}</a></td>

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

        <div>
            {{ $tags->links() }}
        </div>

</div>





</div>
