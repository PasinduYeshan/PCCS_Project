<?php $this->setSiteTitle('Officer Details'); ?>
<?php $this->start('body'); ?>
    <div class="row">
    <div class="col-md-8 col-md-offset-2 well formUnderNav">
        <h2 class="text-center">Officer Details</h2>
        <hr>
        <form class="form" action="" method="post">
            <?= inputBlock('text','Enter ID no','id_no','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Enter Officer ID no','officer_id_no','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <div class="col-md-12 text-right" style="float: right;">
                <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
                <?= submitTag('Search',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
            </div>
            <?php if ($_POST):?>
                <?php if ($this->officer != NULL):?>
                    <div class="col-xs-12 col-sm-8">
                        <h2><?=$this->officer->getOfficerName()?></h2>
                        <p><strong>Police ID number: </strong> <?=$this->officer->getPoliceId()?> </p>
                        <p><strong>NIC number: </strong> <?=$this->officer->getIdNo()?> </p>
                        <p><strong>Branch: </strong><?=$this->branchName?> </p>
                        
                    </div>
                <?php else: ?>
                    <div class="col-xs-12 col-sm-8">
                        <p class="text-danger">Invalid ID</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </form>
    </div>
    </div>

    <div class="row">
        <div class="container well">
        <table class="table table-striped table-condensed table-bordered table-hover">
            <thead>
            <th>Finesheet No </th>
            <th>Vehicle No</th>
            <th>Fine Date</th>
            <th>Status</th>
            <th></th>
            </thead>
            <tbody>
            <?php if ($_POST && $this->finesheets != null){ foreach ($this->finesheets as $finesheet):?>
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

    </div>
<?php $this->end(); ?>