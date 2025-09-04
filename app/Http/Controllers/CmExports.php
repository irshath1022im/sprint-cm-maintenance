<?php

namespace App\Http\Controllers;

use App\Exports\CmReportExport;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CorrectiveMaintenance;
use App\Models\Equipment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class CmExports extends Controller
{
    //



public function view():View
    {
        return view('reports.cmreports', [
            'CmCollections' => CorrectiveMaintenance::query()
                                        ->whereHas('cmStatus', function($q){
                                            return $q->where('task_status_id', 6);
                                              })
                                        ->with('cmStatus')
                                        ->orderBy('cm_number','desc')
                                        ->get()
                                ]);
    }


    public function export()
        {
            // return Excel::download(new CmReportExport, 'cmExports.xlsx');
            // return (new CmReportExport)->download('cmExports.xlsx');

        //    return  CorrectiveMaintenance::query()
        //                     ->WhereHas('cmStatus', function($q){
        //                         return $q->where('task_status_id', 6);
        //                             })
        //                 ->with([
        //                     'technician',
        //                     'equipment',
        //                     'cmStatus' => function($q){return $q->with('taskStatus');}
        //                     ])
        //                     ->orderBy('cm_number','desc')
        //                     ->get();

                return CorrectiveMaintenance::with([
                        'equipment:id,equipment',
                        'cmRelatedAssets' => function($q)
                            {
                                $q->with('equipmentTag:id,equipment_tag');},
                        'materialRequest' => function($q){
                                return $q->with([
                                    'materialRequestItems'
                                ]);
                        }])
                ->get();

        }

}
