<?php $this->setSiteTitle('My Licence'); ?>
<?php $this->start('body');?>
    <div class="col-md-8 col-md-offset-2 well">
    <a href="<?=PROOT?>" class="btn btn-xs btn-default">Back</a>
    <h1 class="text-center"><?="DRIVING LICENCE"?></h1>
    <h4 class="text-center"><?="DEMOCRATIC SOCIALIST REPUBLIC OF SRI LANKA"?></h4>
        <hr>
    <div class="col-md-6">
        <p><strong>Licence No: </strong><?=$this->licence[0]->licence_no?></p>
        <p><strong>Full Name: </strong><?=$this->licence[0]->full_name?></p>
        <p><strong>Address: </strong><?=$this->licence[0]->address?></p>
        <p><strong>Date of Birth: </strong><?=$this->licence[0]->dob?></p>
        <p><strong>Issue Date: </strong><?=$this->licence[0]->issue_date?></p>
        <p><strong>Expiry Date: </strong><?=$this->licence[0]->expiry_date?></p>
        <p><strong>Competent to Drive: </strong><?=$this->licence[0]->competent_to_drive?></p>
        <p><strong>Blood Group: </strong><?=$this->licence[0]->blood_group?></p>
    </div>
    <div class="col-md-6">
    <p><strong>NIC: </strong><?=$this->licence[0]->licence_no?></p>
    </div>
    </div>
<?php $this->end(); ?>