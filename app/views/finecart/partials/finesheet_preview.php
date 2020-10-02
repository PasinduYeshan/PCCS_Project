<h3>Payment Summary</h3>
<?php foreach ($this->items as $item): ?>
    <div class="finesheet-preview well">
        <div class="finesheet-preview-info">
            <p>Sheet No: <?=$item->sheet_no?></p>
            <p>Fine: Rs. <?=$item->fine?></p>
            <p>Due Date: <?=$item->due_date?></p>
        </div>
    </div>
<?php endforeach; ?>

<div class="d-flex justify-content-between">
    <div class="text-bold">Total Fine:</div>
    <div class="text-bold">Rs. <?=number_format($this->grandTotal,2)?></div>
</div>