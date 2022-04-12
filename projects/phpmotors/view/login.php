<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
            <h1>Login</h1> 

            <?php
                if(isset($message)){
                    echo $message;
                 }
            ?>

            <form method="post" action="/phpmotors/accounts/">
                <label for="clientEmail">Email:</label><br>
                <input type="email" id="clientEmail" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>  required><br>
                <label for="password">Password:</label><br>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>

                <input type="hidden" name="action" value="Login">
                <input type="submit" value="Submit">
            </form>

            <p>Don't have an account? <a href="/phpmotors/accounts/index.php?action=registration" title = "My Account">Create one.</a></p>
        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>