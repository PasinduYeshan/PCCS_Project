
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
<?php include 'trafficofficer_menu.php' ?>
<div class="container-fluid" style="min-height:calc(100% - 125px);">
    <?= $this->content('body'); ?>
</div>

</body>
</html>
