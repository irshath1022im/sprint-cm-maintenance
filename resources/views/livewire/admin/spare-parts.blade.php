<div
    x-data = "{
        newSparePartsModal : @entangle('formModalStatus')

    }"
    x-cloak
>

<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading flex justify-between items-center">
                <span>SPARE PARTS</span>
                <x-button class="btn btn-blue"
                    {{-- x-on:click = "newSparePartsModal = 'true'" --}}
                    wire:click="openForm()"
                    >NEW PART</x-button>
            </div>
        </div>

        <div class="card-body text-[12px]">
            <table class="table">
                <thead class="table-head">
                    <td class="table-td">IMAGE</td>
                    <td class="table-td">ID</td>
                    <td class="table-td">SPARE PART NAME</td>
                    <td class="table-td">PART NUMBER</td>
                    <td class="table-td">EQUIPMENT</td>
                </thead>

                <tbody class="table-body text-[12px]">

                    @if ($spare_parts->isNotEmpty())

                        @foreach ($spare_parts as $item)

                            <tr class="table-tr text-[12px]">
                                <td class="table-td text-[13px]">{{ $item->image }}</td>
                                <td class="table-td text-[13px]">{{ $item->id }}</td>
                                <td class="table-td text-[13px]">{{ $item->spare_part_name }}</td>
                                <td class="table-td text-[13px]">{{ $item->spare_part_number }}</td>
                                <td class="table-td text-[13px]">{{ $item->equipment->equipment }}</td>
                                <td class="table-td text-[13px] flex justify-end">

                                    <x-button class="btn btn-blue" wire:click="partEdit({{ $item }})">Edit</x-button>
                                    {{-- <x-button class="btn btn-close">Delete</x-button> --}}
                                </td>
                            </tr>

                        @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>

</div>





{{-- SPARE PARTS MODEL --}}

<div class="modal"
    x-show="newSparePartsModal"
    {{-- x-transition:enter.duration.500ms
    x-transition.duration.500ms --}}
>
    <div class="modal-overlay">
        <div class="modal-body">

            <div class="modal-content">

                @livewire('forms.create-new-spare-parts')


            </div>




        </div>



    </div>
</div>








</div>
