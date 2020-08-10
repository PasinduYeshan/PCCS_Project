<?php $this->setSiteTitle('Thank You!');?>

<?php $this->start('body')?>
    <div class="row">
        <div class="text-center">
            <h2 class="text-info">Thank You!</h2>
            <p>Your payment of Rs. <?=number_format($this->finesheet->fine,2)?> was successful.</p>


            <a href="<?=PROOT?>" class="btn btn-lg btn-primary">Continue</a>
        </div>
    </div>
<?php $this->end()?>