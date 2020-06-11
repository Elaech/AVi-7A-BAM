<!doctype html>
<!-- Merged by Cretu Bogdan & Ionita Andra -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link href="<?php echo Constants::TEXT_FONT; ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Constants::CSS_ACCOUNTMENU; ?>">
    <link rel="icon" href="<?php echo Constants::FAVICON; ?>" type="image/gif">
    <!-- Script Done by Minut Mihai Dimitrie -->
    <script type="text/javascript">
        var IP = "<?php echo $data['ip']; ?>";
        function getCookie(name) {
            var cookieArr = document.cookie.split(";");
            for (var i = 0; i < cookieArr.length; i++) {
                var cookiePair = cookieArr[i].split("=");
                if (name == cookiePair[0].trim()) {
                    return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
        }

        function updateUsername() {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("PUT", "http://localhost/AVIAUTH/api/update", true);
            xmlhttp.setRequestHeader("Content-type", "text/plain");
            xmlhttp.onreadystatechange = function() {
                //when the response is ready
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    var json = JSON.parse(xmlhttp.responseText);
                    //if it did not fail
                    if (json.status == true) {
                        var now = new Date(); 
                        var time = now.getTime() + 1800 * 1000;
                        now.setTime(time);
                        document.cookie =
                            "token=" + json.token +
                            "; expires=" + now.toUTCString() +
                            "; path=/AVi-7A-BAM";
                        //if the field updated
                        if (json.username == "Username updated!") {
                            var username = localStorage.getItem("new-username");
                            localStorage.removeItem("new-username");
                            document.getElementById("change-username").placeholder = "Username: " + username;
                            document.getElementById("change-username").value = "";
                            
                        //if it did not
                        } else {
                            document.getElementById("change-username").value = "";
                            alert("Failed to update, reason:" + json.username);
                            localStorage.removeItem("new-username");
                        }
                    }
                    //if it failed we delete the cookie and change the page to home
                    else{
                        localStorage.removeItem("new-username");
                        var now = new Date();
                            var time = now.getTime() - 3600 * 1000;
                            now.setTime(time);
                            document.cookie =
                                "token=" +
                                "; expires=" + now.toUTCString() +
                                "; path=/AVi-7A-BAM";
                        document.location = "http://localhost/AVi-7A-BAM/public/home/index";
                    }

                }
                
            };
            var newUsername = document.getElementById("change-username").value;
            localStorage.setItem("new-username",newUsername);
            var token = getCookie("token");
            var data = JSON.stringify({
                "token": token,
                "ip": IP,
                "username": newUsername
            });
            xmlhttp.send(data);
        }
        function updateEmail() {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("PUT", "http://localhost/AVIAUTH/api/update", true);
            xmlhttp.setRequestHeader("Content-type", "text/plain");
            xmlhttp.onreadystatechange = function() {
                //when the response is ready
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    var json = JSON.parse(xmlhttp.responseText);
                    //if it did not fail
                    if (json.status == true) {
                        var now = new Date(); 
                        var time = now.getTime() + 1800 * 1000;
                        now.setTime(time);
                        document.cookie =
                            "token=" + json.token +
                            "; expires=" + now.toUTCString() +
                            "; path=/AVi-7A-BAM";
                        //if the field updated
                        if (json.email == "E-mail updated!") {
                            var email = localStorage.getItem("new-email");
                            localStorage.removeItem("new-email"); 
                            document.getElementById("change-email").placeholder = "Email: " + email;
                            document.getElementById("change-email").value = "";
                        //if it did not
                        } else {
                            localStorage.removeItem("new-email"); 
                            document.getElementById("change-email").value = "";
                            alert("Failed to update, reason:" + json.email);
                        }
                    }
                    //if it failed we delete the cookie and change the page to home
                    else{
                        localStorage.removeItem("new-email"); 
                        var now = new Date();
                            var time = now.getTime() - 3600 * 1000;
                            now.setTime(time);
                            document.cookie =
                                "token=" +
                                "; expires=" + now.toUTCString() +
                                "; path=/AVi-7A-BAM";
                        document.location = "http://localhost/AVi-7A-BAM/public/home/index";
                    }

                }
            };
            var newEmail = document.getElementById("change-email").value;
            localStorage.setItem("new-email",newEmail);
            var token = getCookie("token");
            var data = JSON.stringify({
                "token": token,
                "ip": IP,
                "email": newEmail
            });
            xmlhttp.send(data);
        }
        function updatePassword() {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("PUT", "http://localhost/AVIAUTH/api/update", true);
            xmlhttp.setRequestHeader("Content-type", "text/plain");
            xmlhttp.onreadystatechange = function() {
                //when the response is ready
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    var json = JSON.parse(xmlhttp.responseText);
                    //if it did not fail we reset the token cookie
                    if (json.status == true) {
                        var now = new Date(); 
                        var time = now.getTime() + 1800 * 1000;
                        now.setTime(time);
                        document.cookie =
                            "token=" + json.token +
                            "; expires=" + now.toUTCString() +
                            "; path=/AVi-7A-BAM";
                        //if the field updated
                        if (json.password == "Password updated!") {
                            document.getElementById("change-password").placeholder = "Password Updated: ********";
                            document.getElementById("change-password").value = "";
                        //if it did not
                        } else {
                            document.getElementById("change-password").value = "";
                            document.getElementById("change-password").placeholder = "Password: ********";
                            alert("Failed to update, reason:" + json.password);
                        }
                    }
                    //if it failed we delete the cookie and change the page to home
                    else{
                        var now = new Date();
                            var time = now.getTime() - 3600 * 1000;
                            now.setTime(time);
                            document.cookie =
                                "token=" +
                                "; expires=" + now.toUTCString() +
                                "; path=/AVi-7A-BAM";
                        document.location = "http://localhost/AVi-7A-BAM/public/home/index";
                    }

                }
            };
            var newPassword = document.getElementById("change-password").value;
            var token = getCookie("token");
            var data = JSON.stringify({
                "token": token,
                "ip": IP,
                "password": newPassword
            });
            xmlhttp.send(data);
        }
    </script>
    <!-- End Script Done by Minut Mihai Dimitrie -->
    <meta lang="en-US">
    <title>Account</title>
</head>



<body>
    <!-- Done by Andra Ionita -->
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



    <!-- Done by Andra Ionita -->
    <main class="main-class">
        <div id="account_menu">
            <div class="account_info">
                <div>
                    <img class="user-image-input" src="<?php echo Constants::DEFAULT_USERICON; ?>" width="40" height="40">
                    <output></output>
                    <button class="change-button-image">Change</button>
                </div>

            </div>
            <div class="account_info">
                <div>
                    <input id="change-username" type="text" placeholder="<?php echo "Username: " . $data["username"]; ?>" class="change-input" required>
                    <button onclick="updateUsername()" class="change-button">Change</button>
                    <output></output>
                </div>
            </div>
            <div class="account_info">
                <div>
                    <input id="change-password" type="password" placeholder="Password: *************" class="change-input" required>
                    <button onclick="updatePassword()" class="change-button">Change</button>
                    <output></output>
                </div>

            </div>
            <div class="account_info">
                <div>
                    <input id="change-email" type="email" placeholder="<?php echo "Email: " . $data["email"]; ?>" class="change-input" required>
                    <button onclick="updateEmail()" class="change-button">Change</button>
                    <output></output>
                </div>
            </div>

        </div>

    </main>
    <!-- Finished Section by Andra Ionita -->
    <!-- Done by Minut Mihai Dimitrie -->
    <footer>

        <div class="footer-item1">
            <!--Contact-->
            <p>
                Contact Us! <br>
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
        <li class="navbar-item">

            <a class="nav-link" href='<?php echo Constants::HOME; ?>'>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18" role="img" xmlns="<?php echo Constants::SVG_XML_NAMESPACE; ?>" viewBox="0 0 576 512">
                    <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                </svg>
                <span class="link-text">Home</span>
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

            <a class="nav-link" href='<?php echo Constants::STATISTICS; ?>'>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-bar" class="svg-inline--fa fa-chart-bar fa-w-16" role="img" xmlns="<?php echo Constants::SVG_XML_NAMESPACE; ?>" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path>
                </svg>
                <span class="link-text">Statistics</span>
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
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" class="svg-inline--fa fa-book-reader fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path>
            </svg>
                <span class="link-text">Manual</span>
            </a>

        </li>
        <li class="navbar-item">

            <a class="nav-link" href='<?php echo Constants::SIGNIN_LOGOUT; ?>'>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="<?php echo Constants::SVG_XML_NAMESPACE; ?>" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                </svg>
                <span class="link-text">Log Out</span>
            </a>
        </li>
    </ul>
</nav>
<!-- Finished Section Done By Cretu Bogdan Antonio -->
</html>