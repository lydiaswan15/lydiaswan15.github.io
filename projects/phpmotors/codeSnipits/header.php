<header>
    <div id = 'topBox'>
        <img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo" id = 'phpLogo'>

        <!-- Checks to see if there is a cookie. If so, it adds the cookieFirstname to the top of the header -->
        <?php
            // Pulls up the array with the client's data

            // If the person is logged in, then have the welcome and Logout. If not, have the My Account link. 
            if(isset($_SESSION['loggedin'])){
                $clientData = $_SESSION['clientData'];

                echo "<a href='/phpmotors/accounts/index.php?action=Logout'>Logout</a>";
                echo "<span>Welcome $clientData[clientFirstname]</span>";
            }else{
                echo '<a href = "/phpmotors/accounts/index.php?action=login">My Account</a>';}

        ?>
        
    </div>
</header>