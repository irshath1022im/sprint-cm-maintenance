<div>

    <div class="card">

        <div class="card-header">
            <div class="card-heading">NEW MATERIAL REQUEST</div>
        </div>

        <div class="card-body">

            <div class="card">
                <div class="card-header">
                    <div class="card-heading">REQUEST</div>
                </div>

                <div class="card-body bg-slate-200">

                    <div class="form-group">
                        <input type="text" name="" id="" placeholder="Search for cm" class="form-controll">
                    </div>

                    <div class="flex justify-between">

                        <div class="form-group">
                            <label for="" class="form-label">CM NO</label>
                            <input type="text" name="" id="" class="form-controll" disabled>
                            <span class="text-red-400">*disabled</span>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">EQUIPMENT NAME</label>
                            <input type="text" name="" id="" class="form-controll" disabled>
                            <span class="text-red-400">*disabled</span>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">EQUIPMENT TAG</label>
                            <input type="text" name="" id="" class="form-controll" disbaled>
                            <span class="text-red-400">*disabled</span>
                        </div>
                    </div>

                    <div class="form-group flex justify-between">

                            <div class="form-group">
                                <label for="" class="form-label">SUB CM NO</label>
                                <input type="text" name="" id="" class="form-controll">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Request Date</label>
                                <input type="date" name="" id="" class="form-controll">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Expected Date</label>
                                <input type="date" name="" id="" class="form-controll">
                            </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Remark</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-controll"></textarea>
                    </div>

                    <div class="flex justify-center gap-2">
                        <x-button class="btn btn-submit">SAVE</x-button>
                        <x-button class="btn btn-close">close</x-button>
                    </div>

                </div>

            </div>


            <div class="card">
                <div class="card-header">
                    <div class="card-heading">RECEIVING</div>
                </div>

                <div class="card-body bg-slate-200">

                    <div class="flex justify-between">

                        <div class="form-group">
                            <label for="" class="form-label">Meterial Request ID</label>
                            <input type="text" name="" id="" class="form-controll" disabled>
                        </div>
                    </div>

                    <div class="form-group flex justify-between">

                            <div class="form-group">
                                <label for="" class="form-label">Batch No</label>
                                <input type="text" name="" id="" class="form-controll">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Reciving Date</label>
                                <input type="date" name="" id="" class="form-controll">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Supplier</label>
                                <select name="" id="" class="form-controll">
                                    <option value="">Select</option>
                                </select>
                            </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Supporting Documents</label>
                        <input type="file" name=""  class="form-controll"></input>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Remark</label>
                        <textarea name="" id="" cols="30" rows="2" class="form-controll"></textarea>
                    </div>

                    <div class="flex justify-center gap-2">
                        <x-button class="btn btn-submit">SAVE</x-button>
                        <x-button class="btn btn-close">close</x-button>
                    </div>

                </div>

            </div>

        </div>

    </div>



</div>
