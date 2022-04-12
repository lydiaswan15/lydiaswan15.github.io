<?php

//Changes the scope so that you can use functions from those files 
require_once '../library/connections.php';

require_once '../model/main-model.php';

require_once '../model/vehicles-model.php';

require_once '../library/functions.php';

// Create or access a Session
session_start();

// Creating a variable called classifications that calls getClassifications from the main-model.php and stores the classifications
$classifications = getClassifications();
$navList = navagationCreation($classifications);



// Creating the classifications list. Similar to the navList above, however we are also adding the classificationId to the value of each element. 

$classificationList = '<select id = "classificationList" name="classificationId">';

// $classification is the variable for the CURRENT classification from the list. 
foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]' >$classification[classificationName]</option>";

}
$classificationList .= '</select>';


// Watch for and capture name-value pairs for decision making

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_POST, 'action');
}

// This switch statement controls what page is displayed. 

switch($action){
    case 'vehicle_registration':
        include '../view/add_vehicle.php';
    break;

    case 'classification_registration':
        include '../view/add_classification.php';
        break;

    // case 'classification':
    //         // Filter and store the data
    //         $classificationName = filter_input(INPUT_POST, 'classificationName');
    //         // $classificationId = filter_input(INPUT_POST, 'classificationId');
    
    //         // Check for missing data
    //         if(empty($classificationName)){
    //              $message = '<p>Please provide the classification name.</p>';
    //             include '../view/add_classification.php';
    //            exit; 
    //          }
    
    //         // // Send the data to the model
    //         $classificationOutcome = newClassification($classificationName);
    
    //         // // Check and report the result
    //        if($classificationOutcome === 1){
    //             header('Location: http://localhost/phpmotors/vehicles/');
    //            exit;
    //         } else {
    //             $message = "<p>Sorry but we were not able to add $classificationName. Please try again.</p>";
    //              include '../view/add_classification.php';
    //              exit;
    //          }
    
    //         break;

    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
        $vehicles = getVehiclesByClassification($classificationName);
        if(!count($vehicles)){
         $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
         $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }


        include '../view/classification.php';
        break;

            case 'add_vehicle':

                // Filter and store the data
                $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
                $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
                $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
                $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
                $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
                $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
                $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_STRING);

                // Check for missing data
                if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
                    $message = '<p>Please provide information for all empty form fields.</p>';
                    include '../view/add_vehicle.php';
                    exit; 
                };
        
                // Send the data to the model
                $addVehicleOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        
                echo($addVehicleOutcome);
                // Check and report the result
                if($addVehicleOutcome === 1){
                    $message = "<p>Thanks for registering that vehicle.</p>";
                    include '../view/add_vehicle.php';
                    exit;
                } else {
                    $message = "<p>Sorry, but the registration failed. Please try again.</p>";
                    include '../view/add_vehicle.php';
                    exit;
                }
                break;

                        /* * ********************************** 
            * Get vehicles by classificationId 
            * Used for starting Update & Delete process 
            * ********************************** */ 
            case 'getInventoryItems': 
                // Get the classificationId 
                $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
                // Fetch the vehicles by classificationId from the DB 
                $inventoryArray = getInventoryByClassification($classificationId); 
                // Convert the array to a JSON object and send it back 

                echo json_encode($inventoryArray); 
                
                exit;
                break;


            case 'mod':
                $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
                $invInfo = getInvItemInfo($invId);
                if(count($invInfo)<1){
                    $message = 'Sorry, no vehicle information could be found.';
                   }
                   include '../view/vehicle-update.php';
                   exit;
            break;
   
            case 'updateVehicle':
                $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
                $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
                $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
                $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
                $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
                $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
                $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
                $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
                $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

                if (empty($classificationId) || empty($invMake) || empty($invModel) 
                || empty($invDescription) || empty($invImage) || empty($invThumbnail)
                || empty($invPrice) || empty($invStock) || empty($invColor)) {
              $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
                 include '../view/vehicle-update.php';
             exit;
            }
            
            $updateResult = updateVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $invId);
            if ($updateResult) {
             $message = "<p class='notice'>Congratulations, the $invMake $invModel was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/vehicles/');
                exit;
                
            } else {
                $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
                 include '../view/vehicle-update.php';
                 exit;
                }
            break;

                case 'del':
                    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
                    $invInfo = getInvItemInfo($invId);
                    if (count($invInfo) < 1) {
                            $message = 'Sorry, no vehicle information could be found.';
                        }
                        include '../view/vehicle-delete.php';
                        exit;
                        break;

                        case 'deleteVehicle':
                            $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
                            $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
                            $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
                            
                            $deleteResult = deleteVehicle($invId);
                            if ($deleteResult) {
                                $message = "<p class='notice'>Congratulations the car was successfully deleted.</p>";
                                $_SESSION['message'] = $message;
                                header('location: /phpmotors/vehicles/');
                                exit;
                            } else {
                                $message = "<p class='notice'>Error: $invMake $invModel was not
                            deleted.</p>";
                                $_SESSION['message'] = $message;
                                header('location: /phpmotors/vehicles/');
                                exit;
                            }
                            break;


                            case 'Classification':
                                
                                $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
                                $vehicles = getVehiclesByClassification($classificationName);
                                if(!count($vehicles)){
                                 $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
                                } else {
                                 $vehicleDisplay = buildVehiclesDisplay($vehicles);
                                }

                                
                                include '../view/classification.php';
                                break;

            case 'vehicleInfo':
                
                $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
                //gets all the info from the function in 'functions' based off of 
                $invInfo = getInvItemInfo($invId);

                if (!$invInfo) {
                  $message = "<p class='notice'>Sorry, no vehicle information could be found.</p>";
                } else {
                  $infoDisplay = buildSingleVehicleDisplay($invInfo);
                }
                include '../view/vehicle-detail.php';
                break;

            default:
            $classificationList = buildClassificationList($classifications);

                include '../view/vehicle_management.php';
            break;
}




