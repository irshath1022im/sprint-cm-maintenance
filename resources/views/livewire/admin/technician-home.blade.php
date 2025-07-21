<div>

<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <span>TECHNICIANS</span>
                <x-button class="btn btn-blue">NEW TECHNICIAN</x-button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-head">
                    <td class="table-td">IMAGE</td>
                    <td class="table-td">ID</td>
                    <td class="table-td">NAME</td>
                    <td class="table-td">CONTACT NUMBER</td>
                </thead>

                <tbody class="table-body">

                    @if ($technicians->count()>1)
                        @foreach ($technicians as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $item->image }}</td>
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td">{{ $item->name }}</td>
                                <td class="table-td">{{ $item->contact_number }}</td>
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





























</div>
