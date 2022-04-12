<!-- Accounts Controller -->


<?php

require_once '../library/connections.php';

require_once '../model/main-model.php';

require_once '../model/accounts-model.php';

require_once '../library/functions.php';

// Create or access a Session
session_start();

 $classifications = getClassifications();
//  var_dump($classifications);
//  exit;


// Build a navigation bar using the $classifications array
$navList = navagationCreation($classifications);


$action = filter_input(INPUT_GET, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_POST, 'action');
}

switch($action){
    
    case 'login':
        include '../view/login.php';
    break;


    case 'registration':
        include '../view/registration.php';
        break;

    case 'register':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword');


        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if($existingEmail){
        $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
        include '../view/login.php';
        exit;
        }
        
        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if($regOutcome === 1){

            // This sets the cookies for first name, last name, and email. 
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            setcookie('lastname', $clientLastname, strtotime('+1 year'), '/');
            setcookie('email', $clientEmail, strtotime('+1 year'), '/');

            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }


    break;


    case 'Login':

        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword');

        $clientEmailCheck = checkEmail($clientEmail);
        $passwordCheck = checkPassword($clientPassword);

        // Run basic checks, return if errors
        if (empty($clientEmailCheck) || empty($passwordCheck)) {
        $message = '<p class="notice">Please provide a valid email address and password.</p>';
        include '../view/login.php';
        exit;
        }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
        }

        // Creates array named clientArray with all the information for the client 

        $clientFirstname = $clientData["clientFirstname"];
        $clientLastname = $clientData["clientLastname"];
        $clientEmail = $clientData["clientEmail"];
        $clientLevel = $clientData["clientLevel"];

        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        setcookie('lastname', $clientLastname, strtotime('+1 year'), '/');
        setcookie('email', $clientEmail, strtotime('+1 year'), '/');
        setcookie('level', $clientLevel, strtotime('+1 year'), '/');


        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        header('Location: ../accounts/index.php');
        exit;
    break;


    case 'Logout':
        session_destroy();
        include '../index.php';
    break;

    case 'update_account':
        include '../view/client-update.php';
    break;

    case 'account-update':
        
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientId = intval($clientId);
        $clientData = getClient($clientEmail);

        $clientInfo = getUserInfo($clientId);

        $clientEmail = checkEmail($clientEmail);
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if($existingEmail){
        $message = '<p class="notice">That email address already exists. Please enter an updated email address</p>';
        include '../view/client-update.php';
        exit;
        }


        // Check for missing data and create variable 'message' that is desplayed in the page. 
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit; 
        }
        // Update the information within the database
        $updateResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);

        
    if ($updateResult) {

        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        setcookie('lastname', $clientLastname, strtotime('+1 year'), '/');
        setcookie('email', $clientEmail, strtotime('+1 year'), '/');

     $message = "<p class='notice'>Congratulations, the $clientFirstname's account was successfully updated.</p>";
        $_SESSION['message'] = $updatedAccountMessage;
        header('location: /phpmotors/accounts/');
        exit;
    } else {
        $message = "<p class='notice'>Error. $clientFirstname's account was not updated.</p>";
         include '../view/account-update.php';
         exit;
        }

        
    break;

    break;
    

    case 'password-update':

         // Filter and store the data
         $clientFirstname = $_COOKIE['firstname'];
         $clientPassword = filter_input(INPUT_POST, 'clientPassword');
         $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
         $userInfo = getUserInfo($clientId);
        //  $clientId = intval($clientId);

         $checkPassword = checkPassword($clientPassword);

 
         
         // Check for missing data
         if (empty($checkPassword)) {
             $passwordMessage = '<p>Please provide information for all empty form fields.</p>';
             include '../view/client-update.php';
             exit; 
         }
 
         // Hash the checked password
         $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
 
         // Check and report the result
         
         $updateResult = updatePassword($hashedPassword, $clientId);

         if ($updateResult) {
          $message = "<p class='notice'>Congratulations, the $clientFirstname's account was successfully updated.</p>";
             $_SESSION['message'] = $message;
             header('location: /phpmotors/accounts/');
             exit;
         } else {
             $message = "<p class='notice'>Error. $clientFirstname's account was not updated.</p>";
              include '../view/client-update.php';
              exit;
             }


    break;

    default: include '../view/admin.php';
}