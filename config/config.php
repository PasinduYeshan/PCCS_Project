<?php

    define('DEBUG' ,true);

    define('DB_NAME' ,'mvc');
    define('DB_USER' ,'root');
    define('DB_PASSWORD' ,'');
    define('DB_HOST','127.0.0.1');
    

    define('DEFAULT_CONTROLLER','Home'); //If there's no controller in the URL this will be the default controller
    define('DEFAULT_LAYOUT' ,'default'); //If no layout is set use this layout
    
    define('PROOT','/PCCS/'); //set this to '/' for a live server
    define('SITE_TITLE','PCCS Framework'); //This is set to site title if nothing is set