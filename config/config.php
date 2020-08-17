<?php

define('DEBUG',true);

define('DB_NAME','pccsnew');                                                  //database name
define('DB_USER','root');                                                 //database user
define('DB_PASSWORD','');                                                 //database password
define('DB_HOST','127.0.0.1');                                            //database host *** use IP address to avoid DNS lookup


define('DEFAULT_CONTROLLER' , 'Home');                                    // default controller if there isn't one defined in the url
define('DEFAULT_LAYOUT','default');                                       //if no layout is set in the controller use this layout

define('SITE_TITLE','PCCS Traffic System');                             //this will be used if no site title is set
define('MENU_BRAND','PCCS');                                             //this is the brand text in the menu

define('PROOT', '/PCCS/');                                          // set this to '/' for a live server.

define('CURRENT_USER_SESSION_NAME','kdlasfjaKjdfjASLKFDFdgRIG');          //session name for logged in user
define('REMEMBER_ME_COOKIE_NAME','ASLKFSFJO32424AFS8F9AFAF98FHI');       //cookie name for logged in user remember me
define('REMEMBER_ME_COOKIE_EXPIRY',2592000);                               //time in seconds for remember me cookie to live (30 days)

define('ACCESS_RESTRICTED', 'Restricted');                                   //controller name for the restricted redirect

################# Gateway Settings #######################################
define('GATEWAY','stripe'); // could use stripe, paypal
define('STRIPE_PUBLIC','pk_test_51HGTJjKNSpTiEuPG6mHJxsnU1Z74f8sAoonpib96lWVuZ7DZk9jHCHSFjH3AldflMWImlRyPr3sasvsPL6Od9F2n00k3vOMHCw');
define('STRIPE_PRIVATE','sk_test_51HGTJjKNSpTiEuPGbMuiUlskjK4X1RF8iiKH6VST4ymSLZcc72Pp6w4K2gnFGmJEdk1Q0s0QZ8BYQMZJGt67ZC9600uULJAHTx');
