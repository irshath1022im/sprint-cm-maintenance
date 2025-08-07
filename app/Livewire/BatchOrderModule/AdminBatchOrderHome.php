<?php

namespace App\Livewire\BatchOrderModule;

use App\Models\BatchOrder;
use Livewire\Component;

class AdminBatchOrderHome extends Component
{

    public $searchValue;
    public $searchType;

    public function updatedSearchType()
    {
        $this->reset('searchValue');
    }



    public function render()
    {


                    $batches = BatchOrder::query()
                                    ->when($this->searchType=='tag', function($q){
                                        return $q->withWhereHas('batchOrderItems.equipmentTag', function($query){
                                            return $query->where('equipment_tag', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                    ->when($this->searchType=='equipment', function($q){
                                        return $q->withWhereHas('materialRequest.cm.equipment', function($query){
                                            return $query->where('equipment', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })

                                     ->when($this->searchType=='sparePartName', function($q){
                                        return $q->withWhereHas('batchOrderItems.sparePart', function($query){
                                            return $query->where('spare_part_name', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                     ->when($this->searchType=='sparePartNumber', function($q){
                                        return $q->withWhereHas('batchOrderItems.sparePart', function($query){
                                            return $query->where('spare_part_number', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                   ->with([
                                        'batchOrderItems' => function($q){ return $q->with([
                                                        'equipmentTag','sparePart']);},

                                        'materialRequest'=> function($q) {
                                                return $q->with([
                                                        'cm' =>function($q){return $q->with('equipment');},
                                                        'materialRequestItems'
                                                    ]);
                                            }
                                        ])
                                  ;

                    $result = $batches->get();
        return view('livewire.batch-order-module.admin-batch-order-home',['batchOrders' =>$result])
                        ->extends('components.layouts.app');
    }

}
