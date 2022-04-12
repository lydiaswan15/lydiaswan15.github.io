<?php
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
    <title>Document</title>

    <link rel = "stylesheet" href = "/phpmotors/css/template.css">

</head>

<body>

    <div id = "totalText">

        <!-- Header from PHP c-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/header.php'; ?> 

        <!-- NAV from PHP -->
        <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/navigation.php'; 
            echo $navList; ?>
        </nav>


        <main>
            <h1>Client Update</h1> 

            <h2>Account Update</h2>

            <?php
                if (isset($message)){
                    echo $message;
                }
            ?>

            <form id = "accountUpdate" method="post" action="/phpmotors/accounts/index.php">
                <label for="clientFirstname">First Name:</label><br>
                <input type="text" name="clientFirstname" id = "clientFirstname" required <?php if(isset($clientArray)){ echo "value='$clientArray[clientFirstname]'"; } elseif(isset($clientArray['clientFirstname'])) {echo "value='$clientArray[clientFirstname]'"; }?>>

                <label for="clientLastname">Last Name:</label><br>
                <input type="text" name="clientLastname" id = "clientLastname" required <?php if(isset($clientArray)){ echo "value='$clientArray[clientLastname]'"; } elseif(isset($clientArray['clientLastname'])) {echo "value='$clientArray[clientLastname]'"; }?>>

                <label for="clientEmail">Email:</label><br>
                <input type="email" name="clientEmail" id = "clientEmail" required <?php if(isset($clientArray)){ echo "value='$clientArray[clientEmail]'"; } elseif(isset($clientArray['clientEmail'])) {echo "value='$clientArray[clientEmail]'"; }?>>

                <input type="submit" value="Submit">

                <input type="hidden" name="clientId" <?php if(isset($clientArray)){ echo "value='$clientArray[clientId]'"; } elseif(isset($clientArray['clientId'])) {echo "value='$clientArray[clientId]'"; }?>>
                
                <input type="hidden" name="action" value="account-update">
                
            </form>


            <h2>Update Password</h2>
            <?php
                if (isset($passwordMessage)){
                    echo $passwordMessage;
                }
            ?>
            <form id = "accountUpdate2" method="post" action="/phpmotors/accounts/index.php">
                <label for="newPassword">New Password:</label><br>
                <div>Please remember that if you choose to change your password, it will be perminantly altered.</div>
                <div>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character </div>

                <input type="password" name="clientPassword" id="newPassword" required>

                <input type="submit" value="Submit">

                <input type="hidden" name="action" value="password-update">

                <input type="hidden" name="clientId" <?php if(isset($clientArray)){ echo "value='$clientArray[clientId]'"; } elseif(isset($clientArray['clientId'])) {echo "value='$clientArray[clientId]'"; }?>>

                <!-- <input type="hidden" name="action" value="password-update"> -->

            </form>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>

