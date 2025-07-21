<?php

namespace App\Livewire\Forms;

use App\Models\CorrectiveMaintenance;
use App\Models\Item;
use App\Models\ServiceActivity;
use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Component;



class CreateNewActivity extends Component
{
    public $cm_number_id;

    #[Validate('required')]
    public $service_type;

    public $spare_part_id;
    public $qty;
    public $unit_price;
    public $total;
    public $service_description;
    public $remark;

    public $sParts;
    public $items;
    public $spare_part_number;


    public function formSubmit()
    {

        $this->validate();
        $data = [
            'cm_number_id' => $this->cm_number_id,
            'service_type' => $this->service_type,
            'spare_part_id' => $this->spare_part_id,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'total' => $this->total,
            'service_description' => $this->service_description,
        ];

        ServiceActivity::create($data);

        session()->flash('created', 'New Service has been Addedd!!!');
        $this->resetExcept('cm_number_id', 'sParts','items');
    }

    public function updatedSparePartId()
    {
        if(!empty($this->spare_part_id)) {
                $query = SparePart::findOrFail($this->spare_part_id);
                $this->spare_part_number = $query->part_number;
                // $this->spare_part_number = 1;
        } else{
            $this->spare_part_number = null;
        }
    }

    public function mount($cm_number_id)
    {
        $this->cm_number_id = $cm_number_id;
        $this->sParts = SparePart::get();
        $this->items = Item::get();
        // $this->cmDetails = CorrectiveMaintenance::find($cm_number_id);
    }

    public function render()
    {
        return view('livewire.forms.create-new-activity');
    }
}
