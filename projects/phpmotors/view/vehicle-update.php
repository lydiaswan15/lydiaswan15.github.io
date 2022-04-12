<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><?php
//dynamic drop down list
  $classificationList = '<select id="class" name="classificationId" required>';
  $classificationList .= '<option selected>Choose car classification</option>';
  foreach ($classifications as $classification) {
      $classificationList .= "<option value = '$classification[classificationId]'";
      if(isset($classificationId)){
          if($classification['classificationId'] === $classificationId){
              $classificationList .= ' selected ';
          }
          } elseif(isset($invInfo['classificationId'])){
            if($classification['classificationId'] === $invInfo['classificationId']){
            $classificationList .= ' selected ';
            }
      }
       $classificationList .= ">$classification[classificationName]</option>";
  }
  $classificationList .= '</select>';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?></title>

    <link rel = "stylesheet" href = "/phpmotors/css/template.css" media="screen">
</head>

<body>

    <div id = "totalText">

        <!-- Header from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/header.php'; ?> 

        <!-- NAV from PHP -->
        <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/navigation.php'; 
            echo $navList; ?>
        </nav>


        <main>

            <?php
                if (isset($message)){
                    echo $message;
                }
            ?>

        <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	        echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
            elseif(isset($invMake) && isset($invModel)) { 
	        echo "Modify$invMake $invModel"; }?></h1>


            <form id = "checking" method="post" action="/phpmotors/vehicles/index.php">
                <label for="invModel">Inventory Model:</label><br>
                <input type="text" name="invModel" id="invModel" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
								
                <label for="invMake">Inventory Make:</label><br>
                <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>

                <label for="invDescription">Inventory Description:</label><br>
                <input type="text" name="invDescription" <?php if(isset($invDescription)){echo "value='$invDescription'";} elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; }
 ?> id = "invDescription" required><br>

                <label for="invImage">Inventory Image:</label><br>
                <input type="text" name="invImage"  required <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }
 ?> id = "invImage"><br>

                <label for="invThumbnail">Inventory Thumbnail:</label><br>
                <input type="text" name="invThumbnail"  required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }
 ?> id = "invThumbnail"><br>

                <label for="invPrice">Inventory Price:</label><br>
                <input type="text" name="invPrice" required <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }
 ?> id = "invPrice"><br>

                <label for="invStock">Inventory Stock:</label><br>
                <input type="text" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }
 ?> id = "invStock"><br>

                <label for="invColor">Inventory Color:</label><br>
                <input type="text" name="invColor" required <?php if(isset($invColor)){echo "value='$invColor'";} elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }
 ?> id = "invColor"><br>

                <label>Inventory Classification:</label><br>
                <?php echo $classificationList?>

                <input type="hidden" name="action" value="updateVehicle">
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])) {echo $invInfo['invId'];} else if(isset($invId)){echo $invId;}?>">
                
                <input type="submit" name="submit" value="Update Vehicle">
            </form>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>