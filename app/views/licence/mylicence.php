<?php $this->setSiteTitle('My Licence'); ?>
<?php $this->start('body');?>
    
    <div class="col-md-8 col-md-offset-2 well formUnderNav" id="licenseBody">
    
        <div class="col-md-2">
            <img  src="<?=PROOT?>css/images/sri-lanka-flag.svg" class="float-left license-thumbnail"  alt="Sri Lankan flag" >
        </div>
    
        <div class="col-md-8" >
        
            <h1 class="text-center"><?="DRIVING LICENCE"?></h1>
            <h4 class="text-center"><?="DEMOCRATIC SOCIALIST REPUBLIC OF SRI LANKA"?></h4>
        </div>  

        <div class="col-md-2">
            <img  src="<?=PROOT?>css/images/sri-lanka-government.svg" class=" float-right license-thumbnail"  alt="SL government" >
        </div>
    

        <hr>
        <div class="container">
            <div class="col-md-4">
                <img src="<?=PROOT?>css/images/license/<?=$this->licence[0]->licence_no?>.jpg" class="rounded float-right license-thumbnail"  alt="default dp" >
            </div>
            <div class="col-md-8" >
                <p><strong>NIC: </strong><?=$this->licence[0]->id_no?></p>
                <p><strong>Licence No: </strong><?=$this->licence[0]->licence_no?></p>
                <p><strong>Full Name: </strong><?=$this->licence[0]->full_name?></p>
                <p><strong>Address: </strong><?=$this->licence[0]->address?></p>
                <p><strong>Date of Birth: </strong><?=$this->licence[0]->dob?></p>
                <p><strong>Issue Date: </strong><?=$this->licence[0]->issue_date?></p>
                <p><strong>Expiry Date: </strong><?=$this->licence[0]->expiry_date?></p>
                <p><strong>Competent to Drive: </strong><?=$this->licence[0]->competent_to_drive?></p>
                <p><strong>Blood Group: </strong><?=$this->licence[0]->blood_group?></p>
                
            </div>
            <a href="<?=PROOT?>" class="btn btn-s inline btn-success pull-right">Back</a>
        </div>
    
    </div>
    
    
<?php $this->end(); ?>