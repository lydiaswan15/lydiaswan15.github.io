<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><?php
if($_SESSION['clientData']['clientLevel'] < 2){
 header('location: /phpmotors/');
 exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Delete $invMake $invModel"; }?></title>

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
	        echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
            elseif(isset($invMake) && isset($invModel)) { 
	        echo "Delete $invMake $invModel"; }?></h1>


            <form id = "checking" method="post" action="/phpmotors/vehicles/index.php">
                <label for="invModel">Inventory Model:</label><br>
                <input type="text" name="invModel" id="invModel" required readonly <?php if(isset($invModel)){ echo "value='$invModel'"; } ?>>
								
                <label for="invMake">Inventory Make:</label><br>
                <input type="text" name="invMake" id="invMake" required readonly <?php if(isset($invMake)){ echo "value='$invMake'"; } ?>>

                <label for="invDescription">Inventory Description:</label><br>
                <input type="text" name="invDescription" readonly <?php if(isset($invDescription)){echo "value='$invDescription'";} ?> id = "invDescription" required><br>

                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])) {echo $invInfo['invId'];}?>">
                
                <input type="submit" name="submit" value="Delete Vehicle">
            </form>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>