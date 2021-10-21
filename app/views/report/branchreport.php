<?php $this->setSiteTitle('Branch Report'); ?>
<?php $this->start('head'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well formUnderNav">
    <h2 class="text-center">Details for branch report</h2>
    <hr>
    <form class="form" action="" method="post" target="_self">
        <div class="bg-danger form-errors"><?=$this->displayErrors?></div>
        <?= inputBlock('date','Select start date','start_date','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
        <?= inputBlock('date','Select end date','end_date','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
        <?php
        if (currentUser()->acl=='["HigherOfficer"]') { ?>
           <div class="form-group col-md-6">
               <label for="branch">Select Branch</label>
               <select id="branch" name="branch" class="form-control">
                   <option value="" selected disabled hidden>Select branch</option>
                   <?php foreach ($this->branchlist as $branch):?>
                       <option value="<?= $branch->branch_id;?>"><?=$branch->branch_id." - ".$branch->branch_name?></option>
                   <?php endforeach; ?>
               </select>
           </div>
        <?php } ?>

        <div class="col-md-12 text-right">
            <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
            <?= submitTag('Generate Report',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
        </div>
    </form>


</div>

<script>
    $(document).ready(function() {
        $('#branch').select2()({

        });
    });
</script>
<?php $this->end(); ?>
