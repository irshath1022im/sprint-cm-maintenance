<?php

namespace App\Http\Controllers;

use App\Models\BatchOrder;
use App\Models\BatchOrderDocument;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BatchOrderReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if( $request->has('document_id'))
        {
            $query = BatchOrderDocument::findOrFail($request->document_id);

            // return response()->file(Storage::url($query->path));
            return view('components.batch-order-reference.document-view',['batch_document' => $query]);
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

        if($request->filled('cm_id'))
        {

            //once upploaded the file, direct to this path
            $appUrl = config('app.url');
            $request->session()->put('2ndUrl', $appUrl.'/admin/cm/'.$request->cm_id.'') ;
        }

        //  $request->session()->put('2ndUrl', 'http://localhost:8000/admin/cm/5');

        if($request->filled('batch_order_id'))
        {
             $batchOrder = BatchOrder::findOrFail($request->batch_order_id);

             return view('components.batch-order-reference.new', ['batchOrder' => $batchOrder]);
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    //    dd($request->session());

            request()->validate([
                'batch_order_id' => 'required',
                'batch_no' => 'required',
                'referenceFile' => 'required|file|mimes:pdf|max:10240'
            ]);

            $file = $request->file('referenceFile');

            $path = Storage::disk('public')->putFileAs('batchOrders', $file, $request->batch_no.'.'.$file->guessExtension());

            $result = BatchOrderDocument::updateOrInsert([
                'batch_order_id' => $request->batch_order_id,
                'path' => $path,
                'remark' => ''
            ]);

    // dd($request->session()->get('2ndUrl'));

            return redirect()->to($request->session()->get('2ndUrl'));
            // session()->flash('created', 'Document is being uploaded');
            // ->with('created', 'File Uploaded')

            //  return Redirect::back();







    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
