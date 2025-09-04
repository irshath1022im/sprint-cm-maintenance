
<table>
    <thead>
        <tr>
            <td>#</th>
            <td>CM NUMBER</th>
            <td>REQUEST DATE</th>
            <td>EQUIPMENT</th>
            <td>TASK STATUS</th>
           <td>RELATED ASSETS</td>
           <td>SUB CM</td>
        </tr>
    </thead>

    <tbody>
        {{-- @foreach ($CmCollections as $item)

         @php

            $requestDate = Carbon\Carbon::parse($item->request_date);
            $completionDate = Carbon\Carbon::parse($item->cmStatus->date);
        @endphp

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->cm_number }}</td>
                <td>{{ $item->request_date }}</td>
                <td> {{ $item->equipment->equipment}}</td>
                <td> {{ $item->cmStatus->taskStatus->task_status }}</td>
                <td>{{ $requestDate->diffInDays($completionDate) }}</td>
                <td>
                    <table>
                            <tr><td>tag1</td>
                            <tr><td>tag2</td>
                    </table>

                </td>

                <td>sub cm</td>
            </tr>
        @endforeach --}}

    </tbody>
</table>
