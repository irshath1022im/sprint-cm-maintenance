<?php
namespace App\Exports;

use App\Models\CmEquipmentTag;
use App\Models\CorrectiveMaintenance;
use App\Models\EquipmentTag;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportExport implements FromQuery, WithMapping
{
    use Exportable;

    public function query()
    {
        return CorrectiveMaintenance::query();
    }

    public function map($cm): array{
        return [
            $cm->id,
            $cm->cm_number,
            $cm->equipment_id,
            $cm->equipment->equipment,
            $cm->materialRequest ? $cm->materialRequest->id : 'n/a',
            $cm->materialRequest ? $cm->materialRequest->cm_number_id : 'n/a',
            $cm->materialRequest ? $cm->materialRequest->sub_cm : 'n/a',
            $cm->materialRequest ? $cm->materialRequest->expected_date : 'n/a',
            $cm->materialRequest ? $cm->materialRequest->materialRequestItems : 'n/a',

        ];
    }
}
