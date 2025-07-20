<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use App\Models\ServiceActivity;
use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Component;



class CreateNewActivity extends Component
{
    public $cm_number_id;
    public $technician_id;

    #[Validate('required')]
    public $service_type;

    #[Validate('required')]
    public $item_id;
    public $spare_part_id;
    public $spare_part_number;
    public $qty;
    public $unit_price;
    public $total;
    public $service_description;
    public $remark;

    public $sParts;
    public $items;


    public function formSubmit()
    {
        $data = [
            'cm_number_id' => $this->cm_number_id,
            'technician_id'=> $this->technician_id,
            'service_type' => $this->service_type,
            'item_id' => $this->item_id,
            'spare_part_id' => $this->spare_part_id,
            'spare_part_number' => $this->spare_part_number,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'total' => $this->total,
            'service_description' => $this->service_description,
            'remark' => $this->remark
        ];

        ServiceActivity::create($data);
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

    public function mount($cm_number_id, $technician_id)
    {
        $this->cm_number_id = $cm_number_id;
        $this->technician_id = $technician_id;
        $this->sParts = SparePart::get();
        $this->items = Item::get();
    }

    public function render()
    {
        return view('livewire.forms.create-new-activity');
    }
}
