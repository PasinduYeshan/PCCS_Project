<?php

//This function can be used for debugging "dump and die = dnd"
function dnd($data){
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
    die();
}
function diplay($data){
    echo '<pre>';
    var_dump($data);
    echo '<pre>'; 
}

function sanitize($dirty){
    return htmlentities($dirty, ENT_QUOTES,'UTF-8');
}