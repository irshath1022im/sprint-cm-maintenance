

@extends('components.layouts.app')

@section('content')

{{-- @dump($batchOrder) --}}

<div class="card">
    <div class="card-header">
        <div class="card-heading">
            <span>BATCH ORDER REFERENCE DOCUMENTS</span>
            <x-button class="btn btn-info">BATCH ORDER NO: {{ $batchOrder->id }}</x-button>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('uploadBatchOrder.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

                    <div class="flex justify-between">

                            <div class="form-group">
                                <lable class="form-label">Batch Order No</lable>
                                <input type="text" name="batch_order_id" id="batchId" class="form-controll"  value="{{ $batchOrder->id }}" readonly >

                                <x-form-error field="batch_order_id"></x-form-error>
                            </div>

                            <div class="form-group">
                                <lable class="form-label">Batch Number</lable>
                                <input type="text" name="batch_no" id="batch_no" class="form-controll"  value="{{ $batchOrder->batch_no }}" readonly>
                                <x-form-error field="batch_no"></x-form-error>
                            </div>

                                <div class="form-group">
                                <lable class="form-label">SUB CM</lable>
                                <input type="text" name="sub_cm" id="" class="form-controll"  value="{{ $batchOrder->materialRequest->sub_cm }}" readonly>
                            </div>

                    </div>


                    <div class="form-group">
                        <lable class="form-label">Batch Order Reference</lable>
                        <input type="file" name="referenceFile" id="" class="form-controller">
                         <x-form-error field="referenceFile"></x-form-error>
                    </div>

            <x-button class="btn btn-submit" type="submit">UPLOAD</x-button>
        </form>


    </div>
</div>
@endsection
