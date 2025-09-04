<div class="mt-4">

    {{-- @dump($activities) --}}


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    CM#
                </th>

                <th scope="col" class="px-6 py-3">
                    SER TYPE
                </th>
                <th scope="col" class="px-6 py-3">
                   ITEM
                </th>
                 <th scope="col" class="px-6 py-3">
                    S PART NAME
                </th>
                 <th scope="col" class="px-6 py-3">
                    PART #
                </th>
                 <th scope="col" class="px-6 py-3">
                    U/PRICE
                </th>
                 <th scope="col" class="px-6 py-3">
                   QTY
                </th>
                 <th scope="col" class="px-6 py-3">
                   TOTAL
                </th>
                 <th scope="col" class="px-6 py-3">
                   REMARK
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th> --}}
            </tr>
        </thead>
        <tbody>

            {{-- @foreach ($activities as $activity)


            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $activity->cm_number_id }}
                </th>


                <td class="px-6 py-4">
                    {{ $activity->service_type }}
                </td>
                <td class="px-6 py-4">
                    {{ $activity->item->item }}
                </td>
                <td class="px-6 py-4">
                    {{ $activity->sparePart->part_name }}
                </td>
                <td class="px-6 py-4">
                    {{ $activity->spare_part_number }}
                </td>
                  <td class="px-6 py-4">
                  {{ $activity->unit_price }}
                </td>
                  <td class="px-6 py-4">
                  {{ $activity->qty }}
                </td>
                <td class="px-6 py-4">
                   {{ $activity->total }}
                </td>
                  <td class="px-6 py-4">
                   {{ $activity->remark }}
                </td>

                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        @endforeach --}}
        </tbody>
    </table>
</div>







</div>
