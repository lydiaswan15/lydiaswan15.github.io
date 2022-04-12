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
    <title>Add Classification</title>

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
            <h1>Add a Classification</h1> 

            <?php
                if (isset($message)){
                    echo $message;
                }
            ?>


            <form id = "checking" method="post" action="/phpmotors/vehicles/index.php">
                <label for="classificationName">Classification Name:</label><br>
                <input type="text" id="classificationName" name="classificationName" required><br>

                <input type="submit" value="Submit">

                <input type="hidden" name="action" value="classification">
            </form>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>