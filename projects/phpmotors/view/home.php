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
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/header.php';?> 

        <!-- NAV from PHP -->

        <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/navigation.php'; 
            echo $navList; ?>
        </nav>


        <main>
            <!-- Welcome to PHP Motors and Delorian Information -->
            <section>
                <h1>Welcome to PHP Motors!</h1>
                <div id = "delorianDiv">
                    <h3>DMC Delorian</h3>
                    <ul id = "delorianUl">
                        <li>3 Cup holders</li>
                        <li>Superman doors</li>
                        <li>Fuzzy dice!</li>
                    </ul>
                </div>
                <img src="/phpmotors/images/delorean.jpg" alt="Image of the delorean!" id = "delorianImg">
                <img src="/phpmotors/images/site/own_today.png" alt="Button that says own today" id = "ownToday">
            </section>

            <!-- DMC Delorian Reviews -->

            <div id = "largeGrid">
                <section>
                    <h2>DMC Delorian Reviews</h2>
                    <ul id = "reviews">
                        <li>"So fast it's almost like traveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Marty McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day"</li>
                        <li>"80's living and I love it!" (5/5)</li>
                    </ul>
                </section>

                <!-- Delorian Upgrades -->

                <section>
                        <h2>Delorean Upgrades</h2>
                    <div id = "delorianUpgrades">
                        <div class = "upgradesBox">
                            <div class = "upgradesImgDiv">
                                <img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux Capacitor image">
                            </div>
                            <a href="#" title="flux capacitor information link">Flux Capacitor</a>
                            </div>

                        <div class = "upgradesBox">
                            <div class = "upgradesImgDiv">
                                <img src="/phpmotors/images/upgrades/flame.jpg" alt="Flame Decals">
                            </div>
                            <a href="#" title="flame decals information link">Flame Decals</a>
                        </div>

                        <div class = "upgradesBox">
                            <div class = "upgradesImgDiv">
                                <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper sticker image">
                            </div>
                            <a href="#" title="Bumper stickerinformation link">Bumper Sticker</a>
                        </div>

                        <div class = "upgradesBox">
                            <div class = "upgradesImgDiv">
                                <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Hub Cap image">
                            </div>
                            <a href="#" title="hub cap information link">Hub Cap</a>
                        </div>

                    </div>

                </section>

            </div>

        </main>

        <!-- Footer from PHP -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/codeSnipits/footer.php'; ?> 
    </div>   
</body>
</html>