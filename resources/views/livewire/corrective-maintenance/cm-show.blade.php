<div>


   <div class="card">
    <div class="card-header">
        <div class="card-heading">
            CORRECTIVE MAINTENANCE NO- <x-button class="btn btn-info">{{ $cm_number }}</x-button>
        </div>
    </div>

    <div class="card-body">
        <div class="flex justify-between bg-slate-400">
            <div class="form-group">
                <div class="form-label">Technician Name</div>
                <input type="text" name="" id="" class="form-controll" value="{{ $technician_id }}" disabled>
            </div>

             <div class="form-group">
                <div class="form-label">Requested Date</div>
                <input type="text" name="" id="" class="form-controll" value="{{ $requested_date }}" disabled>
            </div>

             <div class="form-group">
                <div class="form-label">Status</div>
                <input type="text" name="" id="" class="form-controll" value="{{ $status }}" disabled>
            </div>
        </div>

        {{-- {{ $activities->count() }} --}}

        <div class="mt-2">
            @if($activities->count() > 0 )
               @livewire('components.show-service-request-card',['activities' => $activities])
            @else

                <div class="p-4 mb-4 text-sm text-green-100 bg-orange-400 rounded-lg" role="alert">
                    <span class="font-medium"> NO SERVICE ACTIVITY DONE YET !!!</span>
                        <x-button class="btn btn-info">NEW ACTIVITY</x-button>
                </div>
            @endif
        </div>


        {{-- SHOW SERVICE DISCRIPTION --}}


        @livewire('forms.create-new-activity', ['cm_number_id' => $cm_number_id, 'technician_id' => $technician_id,  ])


        </div>


    </div>





{{-- MODEL FOR CREATE A SERVICE DESCRIPTION --}}





</div>






















</div>
