<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well formUnderNav">
    <h3 class="text-center">Register User</h3><hr>
    <form class="form" action="" method="post">
        <div class="bg-danger form-errors"><?= $this->displayErrors ?></div>
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" class="form-control" value="<?=$this->post['fname']?>">
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" class="form-control" value="<?=$this->post['lname']?>">
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?=$this->post['id']?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?=$this->post['email']?>">
        </div>
        <div class="form-group">
            <label for="username">Choose a Username</label>
            <input type="text" id="username" name="username" class="form-control" value="<?=$this->post['username']?>">
        </div>
        <div class="form-group">
            <label for="password">Choose a Password</label>
            <input type="password" id="password" name="password" class="form-control" value="<?=$this->post['password']?>">
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm" class="form-control" value="<?=$this->post['confirm']?>">
        </div>
        <div class="form-group">
            <label for="acl">User Type</label>
            <select name="acl" id="acl" class="form-control">
                <option value="" selected disabled hidden>Select User type</option>
                <option value=["Offender"]>Offender</option>
                <option value=["TrafficOfficer"]>Traffic Officer</option>
                <option value=["HigherOfficer"]>HigherOfficer</option>
                <option value=["BranchOIC"]>Branch OIC</option>
                <option value=["PaymentOfficer"]>Payment Officer</option>
            </select>
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-primary btn-large" value="Register User">
        </div>
    </form>
</div>
<?php $this->end(); ?>
