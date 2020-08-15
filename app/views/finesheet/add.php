<?php $this->setSiteTitle('Add Fine Sheet'); ?>
<?php $this->start('head'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<?php $this->end(); ?>
<?php $this->start('body'); ?>
    <div class="col-md-8 col-md-offset-2 well formUnderNav">
        <h2 class="text-center">Add Fine Sheet</h2>
        <hr>
        <form class="form" action="<?=$this->postAction?>" method="post">
            <div class="bg-danger form-errors"><?=$this->displayErrors?></div>
            <?= inputBlock('text','Sheet No','sheet_no',$this->finesheet->sheet_no,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Vehicle No','vehicle_no',$this->finesheet->vehicle_no,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Full Name','full_name',$this->finesheet->full_name,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Address ','address',$this->finesheet->address,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('date','Fine Date','fine_date',$this->finesheet->fine_date,['class'=>'form-control'],['class'=>'form-group col-md-3']); ?>
            <?= inputBlock('time','Fine Time','fine_time',$this->finesheet->fine_time,['class'=>'form-control'],['class'=>'form-group col-md-3']); ?>
            <?= inputBlock('text','Place','place',$this->finesheet->place,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            
            <div class="form-group col-md-6">
                <label for="vehicletype">Vehicle Type</label>
                <select id="vehicletype" name="vehicletype" class="form-control">
                    <option value="" selected disabled hidden>Select vehicle type</option>
                    <?php foreach ($this->vehicleTypes as $vehicle):?>
                        <option value="<?= $vehicle["vehicle_type"];?>"><?= $vehicle["vehicle_type"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="offence">Offence</label>
                <select id="offence" name="offence[]" multiple class="form-control">
                    <?php foreach ($this->offencelist as $offence):?>
                        <option value="<?= $offence->offence_id;?>"><?= $offence->offence_name?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?= inputBlock('text','Licence No','licence_no',$this->finesheet->licence_no,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','ID No','id_no',$this->finesheet->id_no,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <div class="form-group col-md-6">
                <label for="fine_time">Fine Rs:</label>
                <div id="result">Rs. 0.00</div>
            </div>


            <div class="col-md-12 text-right">
                <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
                <?= submitTag('Save',['class'=>'btn btn-primary']) ;?>
            </div>

        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#offence').multiselect({
                nonSelectedText: 'Select Offence',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth:'100%',
                maxHeight: 200
            });

            /*    $('#framework_form').on('submit', function(event){
                    event.preventDefault();
                    var form_data = $(this).serialize();
                    $.ajax({
                        url:"insert.php",
                        method:"POST",
                        data:form_data,
                        success:function(data)
                        {
                            $('#framework option:selected').each(function(){
                                $(this).prop('selected', false);
                            });
                            $('#framework').multiselect('refresh');
                            alert(data);
                        }
                    });
                });*/




        });

        $(document).ready(function(){
            function displayData(){
                $('#offence').on('change',function () {
                    var offence = $( "#offence" ).val() || [];
                    // alert(offence);
                    $.ajax({
                        url:"<?=PROOT?>trafficofficer/fineamount",
                        method:"POST",
                        data:{offence:offence},
                        success:function(data)
                        {
                            $('#result').html(data);
                            //$('#result').html(data);
                        }
                    });
                })}
            displayData();
        })
    </script>
<?php $this->end(); ?>
