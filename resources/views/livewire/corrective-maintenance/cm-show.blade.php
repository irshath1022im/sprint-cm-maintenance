<div>

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

                    {{-- parts replacement livewire components --}}
                    @livewire('material-request-module.cm-material-request',['cm' => $cm])


                </div>
        </div>

</div>


