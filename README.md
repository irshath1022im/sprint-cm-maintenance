|| Equipment ID

each quipment will have moer then one part numbers
    create a equipment_part table and link with equipment

ex: laptop is a equupment, this will laptop will have multiple equipment id

CM - based on item equipment id 

** when the user select new cm,  select the item, then select the equipment id


spare parts should link with Item...need to modify the admin form


once the service ticket created, status will be change to completed

all the reports, should match based on equipment id

when we create the cm
    tere will be subtask based on requirments

    ex: task 1 > wil be repair only....no cost -> no subtask

        task 2 > part replace request ....(material reqwuest)
            1st will issue the subtask, this will create new sub cm
            if they issues the sub task, badge order will be given

            note: if the part purchased / taken from outsite the store, there should be badge order if not, not required

            badge order:
            subtask cm no
            purchadse from
            qty, price, total, service chargge , parts, invoices details, qutaion numberrs

 Schema::create('batch_orders', function (Blueprint $table) {
            $table->id();
            $table->string('batch_oder_no');
            $table->date('date')
            $table->unsignedBigInteger('spare_part_id')
            $table->manufacture()
            $table->supplier()
            $table->paymentStatus -> payid or not
            $table->purcahseStatus -> parts delivered or not
            $table->support_documents
            $table->emails
            $table->in
            $table->timestamps();


<a href="{{ route('admin_equipment_show',['id' => $item->equipment->id]) }}" target="_blank">
<a href="{{ route('admin_tag_show', ['id'=> $item->id]) }}" target="_blank">


request meterial
spare part name, spare part number,qty

recevubg
batch order, uprice qty total 


CM Creation:
01.	Each CM belongs to one Equipment
02.	Each CM can have one / more equipment tags

Material Requests:
01.	MR can have one / more spare parts 
02.	MR when we have more than 1 spare part, the material request will be number of based on equipment tag
03.	When the parts are the same for bath tags, there will be one one material request
04.	


$table->unsignedBigInteger('equipment_tag_id');
$table->foreign('equipment_tag_id')->references('id')->on('equipment_tags');

Conditions:

if any equipment tag having material request, cannot delete the tag 

