<?php $this->setSiteTitle($this->finesheet[0]->displaySheetNo()); ?>
<?php $this->start('body');?>
    <div class="col-md-8 col-md-offset-2 well formUnderNav">
        
        <?php if($this->controller=="trafficofficer"){?>
        <a href="<?=PROOT?><?=$this->controller?>/details" class="btn btn-xs btn-default">Back</a>
        <?php } ?>
        <?php if($this->controller=="offender"){?>
        <a href="<?=PROOT?><?=$this->controller?>/myfines" class="btn btn-xs btn-default">Back</a>
        <?php } ?>
        <?php if($this->controller=="branchOIC"){?>
        <a href="<?=PROOT?><?=$this->controller?>/findOffender" class="btn btn-xs btn-default">Back</a>
        <?php } ?>
        <h3 class="text-center text-primary"><?=$this->finesheet[0]->displaySheetNo()?></h3>
        <h4 class="text-center text-danger"><?=$this->finesheet[0]->displayStatus()?></h4>
        
        <div class="col-md-8">
            <p><strong>Vehicle No: </strong><?=$this->finesheet[0]->vehicle_no?></p>
            <hr>
            <p><strong>Date, Time, Place: </strong><?=$this->finesheet[0]->displayDateTimePlace()?></p>
            <p><strong>Nature of the offence: </strong>
                <ul>
                    <?php foreach($this->offenceList as $offence): ?> 
                    <li><?= $offence ?></li>
                    <?php endforeach ?>
                </ul>
            </p>
            <p><strong>Name of driver: </strong><?=$this->finesheet[0]->full_name?></p>
            <p><strong>Address of driver: </strong><?=$this->finesheet[0]->address?></p>
        </div>
        <div class="col-md-4">
            <p class="text-right"><strong>Driver Licence No: </strong><?=$this->finesheet[0]->licence_no?></p>
        </div>
    </div>
<?php $this->end(); ?>