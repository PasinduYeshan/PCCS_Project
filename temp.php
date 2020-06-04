<?php
define ("ROOT",dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helpers.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->siteTitle(); ?></title>
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css" media="screen" title = "no title" charset = "utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css" media="screen" title = "no title" charset = "utf-8">
    <script src = "<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
    <script src = "<?=PROOT?>js/bootstrap.min.js"></script>
    <?= $this->content('head'); ?>

</head>
    <body>

        <div class="container-fluid" style="min-height:calc(100% - 125px);">
        <?= $this->content('body'); ?>
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

    </body>
</html>

