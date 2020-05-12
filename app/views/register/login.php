<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?=PROOT?>css/login.css" media="screen" title = "no title" charset = "utf-8">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="card col-md-6 col-md-offset-3 well" id="form_1">
    <div class="img-class">
    <img class="card-img-top" id='login_avatar' src="<?=PROOT?>css/images/login_avatar.svg" alt="Card image cap">
    </div>
    <div class="car-body">
        <div class="">
            <div class="card-title">
                <h3 class="text-center">Log In</h3>
            </div>
            <form class="form" action="<?=PROOT?>register/login" method="post">
                <div class="bg-danger form-errors"><?=$this->displayErrors?></div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value="on"></label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-large btn-primary">
                </div>
                <div class="text-right">
                    <a href="<?=PROOT?>register/register" class="text-primary">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->end(); ?>

