@extends('components.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-heading">Reports</div>
        </div>

        <div class="card-body">
            <form action="{{ route('convertReport.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-label">File</div>
                    <input type="file" name="file" id="file" class="form-controller">
                </div>

                <x-button class="btn btn-submit">Submit</x-button>
            </form>
        </div>
    </div>

@endsection
