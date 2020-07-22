<?php $this->setSiteTitle('Add Fine Sheet'); ?>
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
            <?= inputBlock('date','Fine Date','fine_date',$this->finesheet->fine_date,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('time','Fine Time','fine_time',$this->finesheet->fine_time,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Place','place',$this->finesheet->place,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Offence','offence',$this->finesheet->offence,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Licence No','licence_no',$this->finesheet->licence_no,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','ID No','id_no',$this->finesheet->id_no,['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('number','Fine Rs.','fine',$this->finesheet->fine,['class'=>'form-control','min'=>0.00,'step'=>'.01'],['class'=>'form-group col-md-6']); ?>
            <div class="col-md-12 text-right">
                <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
                <?= submitTag('Save',['class'=>'btn btn-primary']) ;?>
            </div>

        </form>
    </div>
<?php $this->end(); ?>