<?php $this->setSiteTitle('Fine Sheet Search'); ?>
<?php $this->start('body'); ?>
    <div class="row">
    <div class="col-md-8 col-md-offset-2 well formUnderNav">
        <h2 class="text-center">Search for Due Fine Sheets</h2>
        <hr>
        <form class="form" action="" method="post">
            <?= inputBlock('text',"Enter Offender's ID no",'id_no','',['class'=>'form-control'],['class'=>'form-group col-md-6']); ?>
            <div class="col-md-12 text-right">
                <a href="<?=PROOT?>home" class="btn btn-default">Cancel</a>
                <?= submitTag('Search',['class'=>'btn btn-primary', 'name'=>'search']) ;?>
            </div>

        </form>
    </div>
    </div>

    <div class="row">
    <div class="container well px-5">
        <table class="table table-striped table-condensed table-bordered table-hover">
            <thead>
            <th>Finesheet No </th>
            <th>Full Name</th>
            <th>Fine Amount</th>
            <th></th>
            </thead>
            <tbody>
            <?php if ($_POST){ foreach ($this->finesheets as $finesheet):?>
                
                <tr>

                    <td><?= $finesheet->sheet_no; ?></td>
                    <td><?= $finesheet->full_name; ?></td>
                    <td><?=  'Rs. '.$finesheet->fine; ?></td>
                    <td class="text-center">
                        <a href="<?=PROOT?><?=$this->controller?>/counterpayment/<?=$finesheet->sheet_no?>" id="pay" class="btn btn-success btn-sm" onclick="if(!confirm('Are you sure you want to mark this payment?')){return false;}">

                            <i class="glyphicon glyphicon-usd"></i> Mark Payment
                        </a>

                    </td>
                </tr>
            <?php endforeach;}?>
            </tbody>

        </table>

    </div>
    </div>
<?php $this->end(); ?>