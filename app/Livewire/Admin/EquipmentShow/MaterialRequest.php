<?php

namespace App\Livewire\Admin\EquipmentShow;

use App\Models\Equipment;
use Livewire\Component;

class MaterialRequest extends Component
{
    public $equipment_id; //equipmet id is from equipment-show



    public function render()
    // {
    //     $result = Equipment::with(['tags'=>function($q){
    //         return $q->with('batchOrderItems');
    //     }])->find(2);
    {
        $result = Equipment::with([
                        'cmRequests' => function($q) {
                            return $q->with([
                                'materialRequest' => function($q){ return $q->with([
                                                        'materialRequestItems' => function($q){ return $q->with(['equipmentTag','sparePart']);}
                                                    ]);},
                                'equipment']);
                        }
                        ])
                            ->find($this->equipment_id);


        return view('livewire.admin.equipment-show.material-request',['equipment' => $result]);
    }
}


// ->with(['materialRequestItems' => function($q){
//                                 return $q->with('equipmentTag','materialRequest');
//                             }])
//                             ->withSum('batchOrderItems as totalSpent', 'total')
