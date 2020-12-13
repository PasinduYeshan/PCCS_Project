<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well formUnderNav">
    <h3 class="text-center">Account Details</h3><hr>
    <form class="form" action="" method="post">
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
        <div class="pull-left">
            <a href = "<?=PROOT?>register/changePassword">
            <input type="button" class="btn btn-primary btn-large" value="Change Password" id = "changePasswordBtn">
            </a>
        </div>
    </form>
</div>
<!-- <script src = "<?=PROOT?>js/custom.js"></script> -->
<?php $this->end(); ?>
