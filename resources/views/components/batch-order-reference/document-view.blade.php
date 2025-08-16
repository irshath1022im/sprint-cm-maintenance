@extends('components.layouts.app')

@section('content')


    <div>
           {{-- <img src="{{Storage::url($batch_document->path)}}" /> --}}

           <a href="{{Storage::url($batch_document->path)}}">View</a>


    </div>

@endsection
