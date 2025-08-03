<?php

namespace App\Livewire\Admin\EquipmentShow;

use App\Models\Equipment;
use Livewire\Component;

class MaterialRequest extends Component
{
    public $id; //equipmet id is from equipment-show



    public function render()
    // {
    //     $result = Equipment::with(['tags'=>function($q){
    //         return $q->with('batchOrderItems');
    //     }])->find(2);
    {
        $result = Equipment::where('id', $this->id)->has('batchOrderItems')
                            ->with(['materialRequestItems' => function($q){
                                return $q->with('equipmentTag','materialRequest');
                            }])
                            ->withSum('batchOrderItems as totalSpent', 'total')
                        ->get();
        return view('livewire.admin.equipment-show.material-request',['equipment' => $result]);
    }
}
