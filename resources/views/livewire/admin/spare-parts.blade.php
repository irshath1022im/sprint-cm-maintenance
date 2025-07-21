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

        <div class="card-body">
            <table class="table">
                <thead class="table-head">
                    <td class="table-td">IMAGE</td>
                    <td class="table-td">ID</td>
                    <td class="table-td">SPARE PART NAME</td>
                    <td class="table-td">PART NUMBER</td>
                </thead>

                <tbody class="table-body">

                    @if ($spare_parts->count()>1)

                        @foreach ($spare_parts as $item)

                            <tr class="table-tr">
                                <td class="table-td">{{ $item->image }}</td>
                                <td class="table-td">{{ $item->id }}</td>
                                <td class="table-td">{{ $item->part_name }}</td>
                                <td class="table-td">{{ $item->part_number }}</td>
                                <td class="table-td flex justify-end">

                                    <x-button class="btn btn-blue" wire:click="partEdit({{ $item }})">Edit</x-button>
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





{{-- SPARE PARTS MODEL --}}

<div class="modal"
    x-show="newSparePartsModal"
    {{-- x-transition:enter.duration.500ms
    x-transition.duration.500ms --}}
>
    <div class="modal-overlay">
        <div class="modal-body">

            <div class="modal-content">

                <x-success></x-success>

                <div class="card">
                    <div class="card-header">
                        <div class="card-heading">NEW SPARE PARTS CREATION</div>
                    </div>

                    <div class="card-body">

                        <div class="">
                            <div class="form-group">
                                <label for="" class="form-label" >Spare Parts Name</label>
                                <input type="text" class="form-controll" wire:model="part_name">

                                <x-form-error field="part_name"></x-form-error>
                            </div>

                             <div class="form-group">
                                <label for="" class="form-label">Part Number</label>
                                <input type="text" class="form-controll" wire:model="part_number">
                                 <x-form-error field="part_number"></x-form-error>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                         @if ($formMode == 'new')

                            <x-button class="btn btn-submit" wire:click="save">SAVE</x-button>
                        @else
                        <x-button class="btn btn-submit" wire:click="updatePart">UPDATE</x-button>

                         @endif
                        <x-button class="btn btn-close" wire:click="closeModal()">close</x-button>
                    </div>

                </div>
                {{-- end of card --}}



            </div>



        </div>
    </div>
</div>







</div>
