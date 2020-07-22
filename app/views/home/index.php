<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?=PROOT?>css/homepage.css" media="screen" title = "no title" charset = "utf-8">
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<?php if (!currentUser()):?>
    <img src = "<?=PROOT?>css/images/homePolice.jpg" class="img-fluid" id= "policeImg">
    <div class="conatiner" id="topic">
        <h1 class="text-center">PCCS Online Traffic Police System</h1>
    </div>
<?php elseif  (currentUser()->acl=='["TrafficOfficer"]'): ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
        </div>
    </header>
    <?php include('TrafficOfficerHome.php') ?>
<?php else : ?>
    <img src = "<?=PROOT?>css/images/homePolice.jpg" class="img-fluid" id= "policeImg">
    <div class="conatiner" id="topic">
        <h1 class="text-center">PCCS Online Traffic Police System. You are Offender</h1>

    </div>

<?php endif; ?>


<?php $this->end(); ?>

