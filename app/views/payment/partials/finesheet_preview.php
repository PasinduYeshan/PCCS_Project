<h3>Finesheet Summary</h3>
<div class="finesheet-preview">
    <div class="finesheet-preview-info">
        <p>Sheet No: <?=$this->sheet_no?></p>
        <p>Fine Date: <?=$this->fine_date?></p>
        <p>Fine Time: <?=$this->fine_time?></p>
        <p>Due Date: <?=$this->due_date?></p>
    </div>
</div>
<div class="d-flex justify-content-between">
    <div class="text-bold">Total Fine:</div>
    <div class="text-bold">Rs. <?=number_format($this->fine,2)?></div>
</div>