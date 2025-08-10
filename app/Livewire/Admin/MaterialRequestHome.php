<?php

namespace App\Livewire\Admin;

use App\Models\MaterialRequest;
use Livewire\Attributes\On;
use Livewire\Component;

class MaterialRequestHome extends Component
{


    public $searchValue;
    public $searchType;

    public function updatedSearchType()
    {
        $this->reset('searchValue');
    }



    public function render()
    {

        $result = MaterialRequest::query()
                                    ->when($this->searchValue !='' && $this->searchType=='sub_cm', function($q){
                                        return $q->where('sub_cm', 'LIKE' , $this->searchValue.'%');
                                    })
                                ->when($this->searchValue !='' && $this->searchType=='equipment', function($q){
                                        return $q->withWhereHas('cm.equipment', function($query){
                                            return $query->where('equipment', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                  ->when($this->searchValue !='' && $this->searchType=='tag', function($q){
                                        return $q->withWhereHas('materialRequestItems.equipmentTag', function($query){
                                            return $query->where('equipment_tag', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                ->when($this->searchValue !='' && $this->searchType=='sparePartName', function($q){
                                        return $q->withWhereHas('materialRequestItems.sparePart', function($query){
                                            return $query->where('spare_part_name', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                ->when($this->searchValue !='' && $this->searchType=='sparePartNumber', function($q){
                                        return $q->withWhereHas('materialRequestItems.sparePart', function($query){
                                            return $query->where('spare_part_number', 'LIKE' , $this->searchValue.'%');
                                        });
                                    })
                                ->with(['materialRequestItems' => function($q){
                                                return $q->with('equipmentTag','sparePart');
                                            },'cm' => function($q){
                                            return $q->with('equipment');
                                         }])

                            ->get();

        return view('livewire.admin.material-request-home',['material_requests' => $result])
            ->extends('components.layouts.app');
    }
}
