<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>

    <link rel = "stylesheet" href = "/phpmotors/css/template.css" media="screen">
</head>

<!-- <img src="images/site/small_check.jpg" alt="Background image of a checkerboard" id = 'backgroundImage'> -->

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
            <h1>Add a Vehicle</h1> 

            <?php
                if (isset($message)){
                    echo $message;
                }
            ?>


            <form id = "checking" method="post" action="/phpmotors/vehicles/index.php">
                <label for="invModel">Inventory Model:</label><br>
                <input type="text" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> id = "invModel"
 required><br>

                <label for="invMake">Inventory Make:</label><br>
                <input type="text" name="invMake" required <?php if(isset($invMake)){echo "value='$invMake'";} ?> id = "invMake"><br>

                <label for="invDescription">Inventory Description:</label><br>
                <input type="text" name="invDescription" <?php if(isset($invDescription)){echo "value='$invDescription'";}  ?> id = "invDescription" required><br>

                <label for="invImage">Inventory Image:</label><br>
                <input type="text" name="invImage" value = "/images/no-image.png" required <?php if(isset($invImage)){echo "value='$invImage'";}  ?> id = "invImage"><br>

                <label for="invThumbnail">Inventory Thumbnail:</label><br>
                <input type="text" name="invThumbnail" value = "/images/no-image.png" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> id = "invThumbnail"><br>

                <label for="invPrice">Inventory Price:</label><br>
                <input type="number" name="invPrice" required <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> id = "invPrice"><br>

                <label for="invStock">Inventory Stock:</label><br>
                <input type="number" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";}  ?> id = "invStock"><br>

                <label for="invColor">Inventory Color:</label><br>
                <input type="text" name="invColor" required <?php if(isset($invColor)){echo "value='$invColor'";}  ?> id = "invColor"><br>

                <label>Inventory Classification:</label><br>
                <?php echo $classificationList?>

                <input type="hidden" name="action" value="add_vehicle">
                <input type="submit" value="Submit">
            </form>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>