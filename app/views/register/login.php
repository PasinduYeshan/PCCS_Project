<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?=PROOT?>css/login.css" media="screen" title = "no title" charset = "utf-8">
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div id="loginDIV">
<div class="container">
    <div class="row justify-content-md-center">
        <div class="card-signin col col-md-6 col-md-offset-3 well formUnderNav tranp" id="form_1">
            <div class="img-class"> 
            <img class="card-img-top" id='login_avatar' src="<?=PROOT?>css/images/login_avatar.svg" alt="Card image cap">
            </div>
            <div class="card-body">
                <h2 class="card-title text-center">Log In</h2>
                <form class="form form-signin" action="<?=PROOT?>register/login" method="post">
                    <div class="bg-light text-danger form-errors"><?=$this->displayErrors?></div>
                    <div class="form-label-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" name="username" placeholder="Username" id="username" class="form-control" required autofocus>
                    </div>
                    <div class="form-label-group">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value="on"></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block text-uppercase">
                    </div>
                    <div class="text-right">
                        <a href="<?=PROOT?>register/register" class="text-primary">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->end(); ?>

