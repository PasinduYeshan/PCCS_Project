<?php $this->setSiteTitle('Officer Details'); ?>
<?php $this->start('body'); ?>
    <div class="col-md-8 col-md-offset-2 well formUnderNav">
        <h2 class="text-center">Officer Details</h2>
        <hr>
        <form class="form" action="" method="post">
            <?= inputBlock('text','Enter ID no','id_no','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <div class="col-md-12 text-right" style="float: right;">
                <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
                <?= submitTag('Search',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
            </div>
            <?php if ($_POST):?>
            <div class="col-xs-12 col-sm-8">
                <h2><?=$this->officer->getOfficerName()?></h2>
                <p><strong>Police ID number: </strong> <?=$this->officer->getPoliceId()?> </p>
                <p><strong>NIC number: </strong> <?=$this->officer->getIdNo()?> </p>
                <p><strong>Branch: </strong><?=$this->officer->getBranch()?> </p>
                
            </div>

            <?php endif; ?>

        </form>
    </div>

    <div>
        <table class="table table-striped table-condensed table-bordered table-hover">
            <thead>
            <th>Finesheet No </th>
            <th>Vehicle No</th>
            <th>Fine Date</th>
            <th>Status</th>
            <th></th>
            </thead>
            <tbody>
            <?php if ($_POST){ foreach ($this->finesheets as $finesheet):?>
                <tr>

                    <td><?= $finesheet->getSheetNo(); ?></td>
                    <td><?= $finesheet->getVehicleNo(); ?></td>
                    <td><?= $finesheet->getFineDate(); ?></td>
                    <td><?= ($finesheet->getStatus() == 0)? 'Unpaid': 'Paid'; ?></td>
                    <td>
                        <a href="<?=PROOT?><?=$this->controller?>/view/<?=$finesheet->getSheetNo()?>" class="btn btn-info btn-sm">
                            <i class="glyphicon glyphicon-eye-open"></i>View
                        </a>

                    </td>
                </tr>
            <?php endforeach;}?>
            </tbody>

        </table>

    </div>
<?php $this->end(); ?>