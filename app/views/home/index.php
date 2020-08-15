<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?=PROOT?>css/homepage.css" media="screen" title = "no title" charset = "utf-8">
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<?php if (!currentUser()):?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
            <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> -->
        </div>
    </header>
<?php elseif  (currentUser()->acl=='["TrafficOfficer"]'): ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
            
        </div>
    </header>
    <?php include('TrafficOfficerHome.php') ?>
<?php elseif  (currentUser()->acl=='["Offender"]'): ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
        </div>
    </header>
    <?php include('OffenderHome.php') ?>
<?php elseif  (currentUser()->acl=='["PaymentOfficer"]'): ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
        </div>
    </header>
    <?php include('PaymentOfficerHome.php') ?>
<?php elseif  (currentUser()->acl=='["BranchOIC"]'): ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
        </div>
    </header>
    <?php include('BranchOICHome.php') ?>
<?php elseif  (currentUser()->acl=='["HigherOfficer"]'): ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
        </div>
    </header>
    <?php include('HigherOfficerHome.php') ?>
<?php else : ?>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Page!</div>
            <div class="masthead-heading text-uppercase">PCCS Online Traffic Police System</div>
            
        </div>
    </header>

<?php endif; ?>
<?php include('footer.php') ?>


<?php $this->end(); ?>

