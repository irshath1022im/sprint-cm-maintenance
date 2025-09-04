<?php

namespace App\Exports;

use App\Models\CorrectiveMaintenance;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CmReportExport implements FromQuery,WithHeadings,WithMapping
{

    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'cm_number',
            'request_date',
            'task_status'
        ];
    }

    public function map($row): array
    {

        $tags=[];

        foreach($row->cmRelatedAssets as $asset) {
            $tags[] = $asset->equipmentTag->equipment_tag;
        }

        return [


                $row->id,
                $row->cm_number,
                $row->request_date,
                $row->cmStatus->taskStatus->task_status,
                implode(',',$tags)

        ];
    }

   public function query()
            {
                return CorrectiveMaintenance::query()
                                                ->whereHas('cmStatus', function($q){
                                                    return $q->where('task_status_id', 6);
                                                    })
                                                ->orderBy('cm_number','desc')
                                        ;
            }
}

