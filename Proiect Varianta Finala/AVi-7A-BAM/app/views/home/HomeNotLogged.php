<!DOCTYPE html>
<html lang="en-US">
<!-- Page merged by Andra Ionita -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link href="<?php echo Constants::TEXT_FONT; ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo Constants::FAVICON; ?>" type="image/gif">
    <link rel="stylesheet" type="text/css" href="<?php echo Constants::CSS_HOME; ?>">
    <meta lang="en-US">
    <title>Home Page</title>
</head>

<body>
<!-- Done by Andra Ionita -->
    <main class="main-class">
        <div class="Home">
            <img src="<?php echo Constants::HOME_BACKIMAGE; ?>" alt="back" class="imagine">
            <div class="introd">Welcome to our site!</div>
        </div>




        <div class="list"><br>

            <div class="scope1">
                <img src="<?php echo Constants::HOME_SCOPEIMAGE; ?>">
                <h3>Scope</h3>
                <p>A site like this exists because it's necesary to know the sad and massive statistic behind the car accidents
                    in our State.</p>
            </div>

            <div class="scope2">
                <img src="<?php echo Constants::HOME_PURPOSEIMAGE; ?>">
                <h3>Purpose</h3>
                <p>The purpose of this site is to inform the population about certain risk areas and to sound an alarm signal
                    regarding prudent driving.</p>
            </div>

            <div class="scope3">
                <img src="<?php echo Constants::HOME_WHYIMAGE; ?>">
                <h3>Why?</h3>
                <p>You know the risk ares.<br>You can take precautionary measures.<br>Safety first, for you and your love ones.
                </p>
            </div>


        </div>

    </main>
    
    <header>
        <div class="header-item1">
            <h1>
                <a href='<?php echo Constants::HOME; ?>'>
                    <img class="logo-icon" src="<?php echo Constants::LOGO_WHITE; ?>">
                </a>
            </h1>
            <!--Insert Logo, everytime when you press logo you will access the home page-->
        </div>

        <div class="header-item2">
            <div class="site-name">
                <h1>Crash<span>Watch</span></h1>
                <!--Insert Name of the Site, everytime when you press the name of the site you will access the home page-->
            </div>
        </div>
    </header>
    <!-- Finished Section Done By Andra Ionita  -->
    <!-- Done by Minut Mihai Dimitrie -->
    <footer>

        <div class="footer-item1">
            <!--Contact-->
            <p>
                Contact Us! <br><br>
                +40 0742 123 123 <br>
                our@contact.com
            </p>
        </div>
        <div class="footer-item2">
            <!--Copyright-->
            <p>
                Web Techologies Faculty Project<br><br>
                &copy; BAM A7 2020 - UAIC FII
            </p>
        </div>
        <div class="footer-item3">
            <p>Powered By:</p>
            <div class="footer-icon-flex">
                <a href="<?php echo Constants::GITHUB; ?>" target="_blank">
                    <img class="footer-icon1" src="<?php echo Constants::GITHUB_ICON; ?>">
                </a>
                <a href="<?php echo Constants::TRELLO; ?>" target="_blank">
                    <img class="footer-icon2" src="<?php echo Constants::TRELLO_ICON; ?>">
                </a>
                <a href="<?php echo Constants::FII; ?>" target="_blank">
                    <img class="footer-icon1" src="<?php echo Constants::FII_ICON; ?>">
                </a>
            </div>
        </div>

    </footer>
<!-- Finished Section Done by Minut Mihai Dimitrie -->

</body>
<!-- Done by Cretu Bogdan Antonio -->
<nav class="navbar">
    <ul class="navbar-ul">
        <li class="navbar-item" id="userButton">

            <a class="nav-link" href='<?php echo Constants::SIGNIN_LOGIN; ?>'>
                <img id="userImage" src="<?php echo Constants::NAV_DEFAULT_USERICON; ?>"></img>
                <span class="link-text">LOG IN</span>
            </a>
        </li>
        <li class="navbar-item">


            <a class="nav-link" href='<?php echo Constants::CREATEACCOUNT; ?>'>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="<?php echo Constants::SVG_XML_NAMESPACE; ?>" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                </svg>
                <span class="link-text">Create Account</span>
            </a>
        </li>
        <li class="navbar-item">

            <a class="nav-link" href='<?php echo Constants::CONTACT; ?>'>
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="address-card" class="svg-inline--fa fa-address-card fa-w-18" role="img" xmlns="<?php echo Constants::SVG_XML_NAMESPACE; ?>" viewBox="0 0 576 512">
                    <path fill="currentColor" d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H48V80h480v352zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2zM360 320h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8z"></path>
                </svg>
                <span class="link-text">Contact</span>
            </a>


        </li>
        <li class="navbar-item">

            <a class="nav-link" href='<?php echo Constants::DOCUMENTATION; ?>'>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" class="svg-inline--fa fa-book fa-w-14" role="img" xmlns="<?php echo Constants::SVG_XML_NAMESPACE; ?>" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                </svg>
                <span class="link-text">Documentation</span>
            </a>

        </li>
        
        <li class="navbar-item">

            <a class="nav-link" href='<?php echo Constants::MANUAL; ?>'>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" class="svg-inline--fa fa-book-reader fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path></svg>
                <span class="link-text">Manual</span>
            </a>

        </li>

    </ul>
</nav>
<!-- Finished Section Done By Cretu Bogdan Antonio -->

</html>