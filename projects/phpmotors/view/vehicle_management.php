<?php
    if ($_SESSION['clientData']['clientLevel'] < 2) {
        header('location: /phpmotors/');
        exit;
       }
       if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Classification</title>

    <link rel = "stylesheet" href = "/phpmotors/css/template.css">
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
            <h1>Vehicle Management</h1> 

            <?php
                if (isset($message)){
                    echo $message;
                }
            ?>


            <p><a href="/phpmotors/vehicles/index.php?action=classification_registration" title = "My Account">Add a Car Classification</a></p>
            <p><a href="/phpmotors/vehicles/index.php?action=vehicle_registration" title = "My Account">Add a Vehicle</a></p>


            <?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?>
            <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
            </noscript>
            <table id="inventoryDisplay"></table>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
    <script src="../js/inventory.js"></script>

</body>
</html>
<?php unset($_SESSION['message']); ?>
