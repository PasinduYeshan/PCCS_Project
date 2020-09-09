<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well formUnderNav">
    <h3 class="text-center">Account Details</h3><hr>
    <form class="form" action="" method="post">
        <div class="bg-danger form-errors"><?= $this->displayErrors ?></div>
        <div class="form-group">
            <label for="fname">First Name</label>
            <input readonly type="text" id="fname" name="fname" class="form-control" value="<?=$this->user->fname?>">
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input readonly type="text" id="lname" name="lname" class="form-control" value="<?=$this->user->lname?>">
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input readonly type="text" id="id" name="id" class="form-control" value="<?=$this->user->id?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input readonly type="email" id="email" name="email" class="form-control" value="<?=$this->user->email?>">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input readonly type="text" id="username" name="username" class="form-control" value="<?=$this->user->username?>">
        </div>
        <div class="form-group">
            <label for="password">Change Password</label>
            <input type="password" id="password" name="password" class="form-control" value="<?=$this->post['password']?>">
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
