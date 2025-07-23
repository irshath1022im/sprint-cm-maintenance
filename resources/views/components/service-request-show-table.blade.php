<table class="table">
    <thead class="table-head">
        {{-- <th class="table-th">#</th> --}}
        <th class="table-th">DATE</th>
        <th class="table-th">SER DESC</th>
        <th class="table-th">U PRICE</th>
        <th class="table-th">QTY</th>
        <th class="table-th">TOTAL</th>
    </thead>

    <tbody class="table-body">

        @foreach ($serviceItems as $item)

            <tr class="table-tr text-[12px]">
                {{-- <td class="table-td text-[12px]">{{ $item->id }}</td> --}}
                <td class="table-td text-[12px]">{{ $item->service_date }}</td>
                <td class="table-td text-[12px]">{{ $item->service_description }}</td>
                <td class="table-td text-[12px]">{{ $item->unit_price }}Qr</td>
                <td class="table-td text-[12px]">{{ $item->qty }}</td>
                <td class="table-td text-[12px]">{{ $item->total }} Qr</td>
            </tr>
        @endforeach
    </tbody>
</table>
