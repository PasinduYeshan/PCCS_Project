<?php $this->setSiteTitle('Branch Report'); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well formUnderNav">
    <h2 class="text-center">Details for branch report</h2>
    <hr>
    <form class="form" action="" method="post" target="_blank">
        <?= inputBlock('date','Enter start date','start_date','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
        <?= inputBlock('date','Enter end date','end_date','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
        <?= inputBlock('number','Enter branch id','branch_id','',['class'=>'form-control'],['class'=>'form-group col-md-2']); ?>
        <small id="branch_id" class="text-muted">Enter branch id in the range 1-15</small>
        <div class="col-md-12 text-right">
            <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
            <?= submitTag('Generate Report',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
        </div>
    </form>
</div>


<?php $this->end(); ?>
