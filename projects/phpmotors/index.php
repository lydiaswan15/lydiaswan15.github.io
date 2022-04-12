<?php

require_once 'library/connections.php';

require_once 'model/main-model.php';

require_once 'library/functions.php';


// Create or access a Session
session_start();

 $classifications = getClassifications();
//  var_dump($classifications);
//  exit;

$navList = navagationCreation($classifications);
// echo $navList;
// exit;

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_POST, 'action');
}

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }

switch($action){
    case 'template':
        include 'view/template.php';
    break;

    default:
    include 'view/home.php';
}