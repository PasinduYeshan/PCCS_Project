<?php $this->setSiteTitle('Fine Sheet Details'); ?>
<?php $this->start('body'); ?>
    <div class="row">
    <div class="col-md-8 col-md-offset-2 well formUnderNav">
        <h2 class="text-center">Fine Sheet Details</h2>
        <hr>
        <form class="form" action="" method="post">
            <?= inputBlock('text','Enter ID no','id_no','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <?= inputBlock('text','Enter Finesheet no','sheet_no','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <div class="col-md-12 text-right">
                <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
                <?= submitTag('Search',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
            </div>

        </form>
    </div>
    </div>

    <div class="row">
        <div class="container well">
        <table class="table table-striped table-condensed table-bordered table-hover">
            <thead>
            <th>Finesheet No</th>
            <th>ID No</th>
            <th>Full Name</th>
            <th>Vehicle No</th>
            <th>Fine Date</th>
            <th>Status</th>
            <th></th>
            </thead>
            <tbody>
            <?php if ($_POST){ foreach ($this->finesheets as $finesheet):?>
                <tr>

                    <td><?= $finesheet->sheet_no; ?></td>
                    <td><?= $finesheet->id_no; ?></td>
                    <td><?= $finesheet->full_name; ?></td>
                    <td><?= $finesheet->vehicle_no; ?></td>
                    <td><?= $finesheet->fine_date; ?></td>
                    <td><?= ($finesheet->status == 0)? 'Unpaid': 'Paid'; ?></td>
                    <td class="text-center">
                        <a href="<?=PROOT?><?=$this->controller?>/view/<?=$finesheet->sheet_no?>" class="btn btn-info btn-sm">
                            <i class="glyphicon glyphicon-eye-open"></i> View
                        </a>

                    </td>
                </tr>
            <?php endforeach;}?>
            </tbody>

        </table>
        </div>
    </div>
<?php $this->end(); ?>