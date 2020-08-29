<?php $this->setSiteTitle('Overall Report'); ?>
<?php $this->start('body'); ?>

<div class="col-md-8 col-md-offset-2 well formUnderNav">
    <h2 class="text-center">Enter Time Period</h2>
    <hr>
    <form class="form" action="" method="post" target="_blank">
        <?= inputBlock('date','Enter start date','start_date','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
        <?= inputBlock('date','Enter end date','end_date','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
        <div class="col-md-12 text-right">
            <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
            <?= submitTag('Generate Report',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
        </div>

    </form>
</div>


<?php $this->end(); ?>


