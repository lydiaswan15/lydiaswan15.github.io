<?php

function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
 function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
   }

// Builds the navigation link
function navagationCreation($classifications){
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="
        .urlencode($classification['classificationName']).
        "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
    //  echo($classification['classificationId']);
    }
    $navList .= '</ul>';

    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
   }
   
   function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {       
     $dv .= '<li>';
     $dv .= '<hr>';
     $dv .= "<a href='/phpmotors/vehicles/?action=vehicleInfo&invId=". urlencode($vehicle['invId']) . "'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
     $dv .= "<a href='/phpmotors/vehicles/?action=vehicleInfo&invId=". urlencode($vehicle['invId']) . "'><h3>$vehicle[invPrice]</h3></a>";
     $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
     $dv .= '</li>';
    }
    $dv .= '</ul>';
    // exit;
    return $dv;
   }


   function buildSingleVehicleDisplay($invInfo){
    $output = '<div class = "vehicleGrid">';
    $output .= '<div class = "vehicleInfo">';
    $output .= "<h1>$invInfo[invMake] $invInfo[invModel]</h1>";
    $output .= "<h2>$ $invInfo[invPrice]</h2>";
    $output .= "<p>$invInfo[invDescription]</p>";
    $output .= "<p>Color: $invInfo[invColor]</p>";
    $output .= "<p>Number in stock: $invInfo[invStock]</p>";
    $output .= "<p>ID Number: $invInfo[invId]</p>";
    $output .= '</div>';
    $output .= '<div class = "imgBox">';
    $output .= "<img src='$invInfo[invThumbnail]' alt='Image of $invInfo[invMake] $invInfo[invModel] on phpmotors.com'>";
    $output .= '</div>';
    $output .= '</div>';

    // exit;
    return $output;
   }
