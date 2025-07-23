<div
    x-data="{
        serviceRequestOpen: true,
        serviceRequestModal : @entangle('serviceRequestModal')
    }"

    x-cloak
>


   <div class="card">
    <div class="card-header">
        <div class="card-heading">
            CORRECTIVE MAINTENANCE NO- <x-button class="btn btn-info">{{ $cm->cm_number}}</x-button>
        </div>
    </div>

    <div class="card-body">

            <div class="card">
                <div class="card-header">
                    <div class="card-heading flex justify-between">
                        <span><x-button class="btn border-blue-500">
                            <a href="{{ route('admin_equipment_show',['id' => $cm->equipment->id]) }}" target="_blank"> {{$cm->equipment->equipment }}
                            </a></x-button></span>
                        <span><x-button class="btn border-blue-500">{{ $cm->request_date }}</x-button></span>
                        <span><x-button class="btn border-orange-500">
                            <a href="{{ route('admin_tag_show', ['id'=> $cm->tag->id]) }}" target="_blank">
                                {{ $cm->tag->equipment_tag }}</a></x-button></span>
                        <span><x-button class="btn btn-info">{{ $cm->status }}</x-button></span>
                    </div>
                </div>

                <div class="card-body">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-heading flex justify-between items-center">
                                <div>
                                    SERVICE REQUEST - <x-button class="btn btn-blue"
                                       x-on:click="$wire.set('serviceRequestModal', true)"
                                    >ISSUE NEW REQUEST</x-button>
                                </div>
                                <x-button
                                class="btn btn-blue"
                                 x-on:click="serviceRequestOpen = !serviceRequestOpen"
                                 >

                                 EXPAND/CLOSE

                                </x-button>
                            </div>
                        </div>

                        <div class=""
                            x-show="serviceRequestOpen"
                            x-transition.duration.500ms
                        >


                          @if ($cm->serviceRequest->isNotEmpty())
                                @component('components.service-request-show-table',['serviceItems' => $cm->serviceRequest])

                                @endcomponent
                        @else

                            <div class="p-2 bg-blue-200 rounded-md m-2 text-sm uppercase">No More Servie Request Found</div>

                        @endif

                        </div>
                    </div>

                </div>
            </div>


    </div>





{{-- MODEL FOR CREATE A SERVICE DESCRIPTION --}}

<div class="modal"
    x-show="serviceRequestModal"
>
    <div class="modal-overlay">
        <div class="modal-body">
            <div class="modal-content">

                <div class="card">

                    <div class="card-header">
                        <div class="card-heading">NEW SERVICE REQUEST</div>
                    </div>

                    <div class="card-body bg-slate-200">

                       @livewire('forms.new-service-request', ['cm' =>$cm])

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



</div>






















</div>
