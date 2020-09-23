<?php $this->setSiteTitle('Due Fines'); ?>
<?php $this->start('body'); ?>
<div class="container well formUnderNav">
<h2 class="text-center">Due Finesheets</h2>
	<table class="table table-striped table-condensed table-bordered table-hover">
    <thead>
    <th>Finesheet No</th>
    <th>Vehicle No</th>
    <th>Fine Date</th>
    <th>Fine</th>
    <th></th>
    </thead>
    <tbody>
    <?php foreach ($this->finesheets as $finesheet): ;?>
        <tr>
            <td><?= $finesheet->sheet_no; ?></td>
            <td><?= $finesheet->vehicle_no; ?></td>
            <td><?= $finesheet->fine_date; ?></td>
            <td><?= $finesheet->fine; ?></td>
            <td>
                <a href="<?=PROOT?><?=$this->controller?>/view/<?=$finesheet->sheet_no?>" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-eye-open"></i> View
                </a>
                <?php if ($finesheet->status==0){?>
                    <a href="<?=PROOT?>finecart/addToFineCart/<?=$finesheet->sheet_no?>" class="btn btn-warning btn-sm">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i> Add to Finecart
                    </a>
                <?php }?>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>

</table>
</div>

<?php $this->end(); ?>
