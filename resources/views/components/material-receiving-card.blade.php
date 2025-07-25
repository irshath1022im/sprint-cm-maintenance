<table class=" w-[80%] ml-12 text-[8px]">
        <thead class="table-head">
            <th class="table-th">BATCH NO</th>
            <th class="table-th">REQ DATE</th>
            <th class="table-th">SUPPLIER</th>
            <th class="table-th">QTY</th>
            <th class="table-th">U PRICE</th>
            <th class="table-th">TOTAL</th>
        </thead>

        <tbody class="text-sm">

            {{-- @dump($material_receiving) --}}

                <tr class="table-tr text-sm">

                    <td class="text-xs p-2">{{ $material_receiving['batch_no'] }}</td>
                    <td class="text-xs p-2">{{ $material_receiving['receiving_date'] }}</td>
                    <td class="text-xs p-2">{{ $material_receiving['supplier_id'] }}</td>
                    <td class="text-xs p-2">{{ $material_receiving['qty'] }}</td>
                    <td class="text-xs p-2">{{ $material_receiving['unit_price'] }}</td>
                    <td class="text-xs p-2">{{ $material_receiving['total'] }}</td>
                </tr>

        </tbody>
    </table>
