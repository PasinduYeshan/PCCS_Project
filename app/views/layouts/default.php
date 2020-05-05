<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$this->_siteTitle ?></title>
    <!---------------- Including css files ---------------->
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css" media="screen" title="no title" charset = "utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css" media="screen" title="no title" charset = "utf-8">
    <!---------------- Including js files ---------------->
    <script src = "<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
    <script src = "<?=PROOT?>js/bootstrap.min.js"></script>

    <!----------------- Connecting to the head in app/view ---------------->
    <?= $this->content('head'); ?>
    
  </head>
  <body>
    <!----------------- Connecting to the body in app/view ---------------->
    <?=$this->content('body'); ?>


    
  </body>
</html>