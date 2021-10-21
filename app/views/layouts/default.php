
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->siteTitle(); ?></title>
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css" media="screen" title = "no title" charset = "utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css" media="screen" title = "no title" charset = "utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/font-awesome-4.7.0/css/font-awesome.min.css" media="screen" title = "no title" charset = "utf-8">
    <script src = "<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
    <script src = "<?=PROOT?>js/bootstrap.min.js"></script>
    <?= $this->content('head'); ?>

</head>
    <body>
        <?php include 'main_menu.php' ?>
        <!-- class="container-fluid pb-5" -->
        <div style="min-height: calc(100vh - 72px);">
            <?= Session::displayMsg() ?>
            <?= $this->content('body'); ?>
        </div>
        <!-- <div class="container-fluid" style="min-height:calc(100% - 125px);">
            
        </div> -->

        

    </body>
</html>
