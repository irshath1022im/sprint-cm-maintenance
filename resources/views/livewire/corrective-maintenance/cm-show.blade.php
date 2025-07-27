<div
    x-data="{
        serviceRequestOpen: false,
        serviceRequestModal : @entangle('serviceRequestModal'),
        partsReplacementBody : true
    }"

    x-cloak
>

<x-success></x-success>


        <div class="card bg-slate-300 border border-orange-200">
                <div class="card-header">
                    <div class="card-heading flex justify-between">
                        <div>

                            CM NO <x-button class="btn btn-info">{{ $cm->cm_number}}</x-button>
                        </div>
                        <div>
                             <span>
                                <x-button class="btn border-orange-400">{{ $cm->request_date }}</x-button>
                            </span>

                            <span>
                                <x-button class="btn bg-slate-200 border border-blue-500">
                                    <a href="{{ route('admin_equipment_show',['id' => $cm->equipment->id]) }}" target="_blank">
                                        {{$cm->equipment->equipment }}
                                    </a>
                                </x-button>
                            </span>

                        </div>
                    </div>
                </div>

        <div class="card-body">

            {{-- SERVICE REPLACEMENT --}}
        {{-- <div class="card">
            <div class="card-header">
                <div class="card-heading flex justify-between">
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
        </div> --}}

            {{-- parts replacement livewire components --}}
                                @livewire('components.parts-replacement-card',['cm' => $cm])


        </div>
            {{-- END OF MAIN CARD BODY --}}

        </div>
                    {{-- END OF MAIN CARD --}}





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


