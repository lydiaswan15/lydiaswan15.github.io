<?php
    //This if statement looks to see if there is cookie. If there is not, it redirects the page to the main contoller. 
    //Otherwise, it creates a variable called cookieFirstname. This variable can store the information from the user. 

    if(isset($_COOKIE['firstname']) == false){
        header('Location: ../index.php');
    }
    else{
        $cookieEmail = filter_input(INPUT_COOKIE, 'email', FILTER_SANITIZE_EMAIL);
        $clientArray = getClient($cookieEmail);
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

            <!-- Header with whoever is logged in's first name -->
            <?php
                echo("<h1>$clientArray[clientFirstname] $clientArray[clientLastname]</h1>");
            ?>
            
            <!-- Unordered list of all the user's information -->
            
                <?php
                    echo("You are logged in!");
                    echo("<p><a href = '/phpmotors/accounts/index.php?action=update_account'>update account information</a></p>");

                    if($_COOKIE['level'] > 1){
                        echo("<h3>Inventory Management!</h3>");
                        echo("<p>Hey! It looks like you are above a level 1 client! If you would like administer inventory, click <a href = '../vehicles/index.php'>here</a> ");
                    }

                ?>

           
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>