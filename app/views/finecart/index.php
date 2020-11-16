<?php $this->setSiteTitle("Finesheet Cart"); ?>
<?php $this->start('body'); ?>
<div class="container-fluid pb-5">

<hr />
<div class="row">
    <?php if (sizeof($this->items)==0): ?>
    <div class="container text-center">
        <div class="grid">
            <!--
            <div class="alert alert-info " role="alert">
                Your Finesheet Cart is empty!
            </div>
            -->
                <div class="col col-md-4">
                    <img  src="<?=PROOT?>css/images/finecarthome.svg" class="rounded"  alt="finecart" id="finecartlogo">
                </div>
            
                <div class="col col-md-8">
                    <div class="row">
                        <h3 class="display-4 text-center">Your Finesheet Cart is empty!</h3>
                    </div>
                    <div class="row">
                        <h5 class="display-4 text-center">
                            Add fine sheets to your cart to pay at once
                        </h5>
                    </div>
   
                    <a href="<?=PROOT?>offender/myfines" class="btn btn-md btn-info text-center">Continue finesheet adding</a>
                </div>
            </div>
        </div>
    </div>
    
       
    
        
        
    <?php else:?>
    <h2>Finesheet Cart (<?=$this->itemCount?> item<?=($this->itemCount == 1)?"" : "s"?>)</h2>
    <div class="col col-md-8">
        <?php foreach ($this->items as $item): ?>
            <div class="finecart-item">
                <div class="finecart-item-img">
                    <img src="<?=PROOT?>css/images/logo.png">
                </div>
                <div class="finecart-item-name">
                    <a href="<?=PROOT?>offender/view/<?=$item->sheet_no?>" title="<?=$item->sheet_no?>"><?=$item->sheet_no?></a>
                    <p>Due date : <?=$item->due_date?></p>
                </div>
                <div class="finecart-item-price">
                    <div>Rs. <?=$item->fine?></div>
                    <div class="remove-item" onclick="confirmRemoveItem('<?=PROOT?>finecart/removeItem/<?=$item->sheet_no?>')">
                            <i class="fa fa-trash"></i> Remove
                </div>
                <!-- <div class="sendBottom">
                    
                </div> -->
                
                </div>
                

            </div>
        <?php endforeach; ?>
        <a href="<?=PROOT?>offender/duefines" class="btn btn-lg btn-info continueAddingbtn">Continue Adding <span class="glyphicon glyphicon-plus"></span> </a>
    </div>
    <aside class="col col-md-4">
        <div class="finecart_summary">
            <a href="<?=PROOT?>finecart/checkout/<?=$this->cart_id?>" class="btn btn-lg btn-primary btn-block btn-success">Checkout <span class="glyphicon glyphicon-play"></span></a>
            <div class="cart-line-item">
                <div>Item<?=($this->itemCount == 1)?"" : "s"?> (<?=$this->itemCount?>)</div>
                <div>Rs. <?=$this->grandTotal?></div>
            </div>
            <hr />
            <div class="cart-line-item grand-total">
                <div>Total:</div>
                <div>Rs. <?=$this->grandTotal?></div>
            </div>
        </div>
    </aside>
    <?php endif;?>
</div>
</div>

<script>
    function confirmRemoveItem(href){
        if(confirm("Are you sure?")){
            window.location.href = href;
        }
        return false;
    }
</script>

<?php $this->end(); ?>
