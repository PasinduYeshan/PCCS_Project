<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well formUnderNav">
    <h3 class="text-center">Change your password</h3><hr>
    <form class="form" action="" method="post">
        <div class="bg-danger form-errors"><?= $this->displayErrors ?></div>
        <div class="form-group">
            <label for="password">Current Password</label>
            <input type="password" id="password" name="password" class="form-control" value="<?=$this->post['password']?>">
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="newpassword" name="newpassword" class="form-control" value="<?=$this->post['newpassword']?>">
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm" class="form-control" value="<?=$this->post['confirm']?>">
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-primary btn-large" value="Change Password">
        </div>
    </form>
</div>
<?php $this->end(); ?>
