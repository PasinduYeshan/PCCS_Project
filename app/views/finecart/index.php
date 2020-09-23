<?php $this->setSiteTitle("Finesheet Cart"); ?>
<?php $this->start('body'); ?>

<h2>Finesheet Cart (<?=$this->itemCount?> item<?=($this->itemCount == 1)?"" : "s"?>)</h2>
<hr />
<div class="row">
    <?php if (sizeof($this->items)==0): ?>
        <div class="col col-md-8 offset-md-2 text-center">
            <h3>Your Finesheet Cart is empty!</h3>
            <a href="<?=PROOT?>offender/myfines" class="btn btn-lg btn-info">Continue finesheet adding</a>
        </div>
    <?php else:?>
    <div class="col col-md-8">
        <?php foreach ($this->items as $item): ?>
            <div class="finecart-item">
                <div class="finecart-item-img">
                    <img src="<?=PROOT?>css/images/logo.png">
                </div>
                <div class="finecart-">
                    <a href="<?=PROOT?>offender/view/<?=$item->sheet_no?>" title="<?=$item->sheet_no?>"><?=$item->sheet_no?></a>
                    <p>Due date : <?=$item->due_date?></p>
                </div>
                <div class="finecart-item-price">
                    <div>Rs. <?=$item->fine?></div>
                        <div class="remove-item" onclick="confirmRemoveItem('<?=PROOT?>finecart/removeItem/<?=$item->sheet_no?>')">
                            <i class="fa fa-trash"></i> Remove
                        </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    <aside class="col col-md-4">
        <div class="finecart_summary">
            <a href="<?=PROOT?>finecart/checkout/<?=$this->cart_id?>" class="btn btn-lg btn-primary btn-block">Proceed With Checkout</a>
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


<script>
    function confirmRemoveItem(href){
        if(confirm("Are you sure?")){
            window.location.href = href;
        }
        return false;
    }
</script>

<?php $this->end(); ?>
