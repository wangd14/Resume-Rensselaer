<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Resume Rensselaer Login</title>
    <link rel="stylesheet" href="../src/stylesheet/navbar.css" type="text/css" />
    <link rel="stylesheet" href="../src/stylesheet/login.css" type="text/css" />
    <link rel="stylesheet" href="../src/stylesheet/footer.css" type="text/css" />

    <script type="text/javascript" src="../src/jquery/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="../src/javascript/login.js"></script>
    
</head>

<body>
    <div class="header">
        <div class="navbar_wrap">
            <div class="navbar">
                <a href="../index.html">
                    <img class="navbar_logo" src="../src/img/logo/ResumeRensselaer_removedBackground.png"
                        alt="Resume Rensselaer Logo">
                </a>
                
                <div class="navbar_link">
                    <a href="../index.html">Home</a>
                    <a href="./about_page.html">About</a>
                    <a href="./services.html">Services</a>
                    <a href="./contact.html">Contact</a>
                    <a href="./login.php">Login</a>
                </div>
                
            </div>
        </div>
    </div>

    <section class="login_signup">
        <section id="slogan">
            <h1>Crafting Careers,<br>One Click at a Time</h1>
        </section>
        
        <section class="login_signup_form">
            <div class="form-tabs">
                <button class="active login loginForm">Login</button>
                <button class="inactive signup signupForm">Sign Up</button>
            </div>
            
            <!-- using required to force user to input credentials-->

            <form id="loginForm" name="loginForm" method="GET" action="#">
                <h1>Login</h1>
            
                <label for="loginuserID">Username:</label>
                <input type="text" id="loginuserID" name="loginuserID" placeholder="Enter your username" required>
            
                <label for="loginPassWD">Password:</label>
                <input type="password" id="loginPassWD" name="loginPassWD" placeholder="Enter your password" required>
            
                <div class="form-links">
                    <a href="#" class="forgot-password-link">Forgot Password?</a>
                    <input type="submit" value="Log In" id="loginSubmit" name="loginSubmit">
                    <p>— OR LOGIN WITH —</p>
                </div>
            </form>
                    
            <form id="signupForm" name="signupForm" method="POST" action="#"

                style="display: none;">
                <h1>Sign Up</h1>
        
                <label for="signupuserID">Username:</label>
                <input type="text" id="signupuserID" name="signupUsername" placeholder="Choose a username" required>
        
                <label for="signupPassWD1">Password:</label>
                <input type="password" id="signupPassWD1" name="signupPassWD1" placeholder="Enter a password" required>
        
                <label for="signupPassWD2">Confirm Password:</label>
                <input type="password" id="signupPassWD2" name="signupPassWD2" placeholder="Confirm your password" required>
        
                <input type="submit" value="Sign Up" id="signupSubmit" name="signupSubmit">
        
                <p>— OR REGISTER WITH —</p>
            </form>

        </section>
                
    </section>

    <footer class="ResumeRensselaerFooter">
        <div class="footer-logo">
            <a href="./index.html">
                <img src="../src/img/logo/ResumeRensselaer_removedBackground.png" alt="Resume Rensselaer Logo">
            </a>
        </div>
        <div class="footer-info">
            <div class="footer-link">
                <a href="./pages/contact.html">Privacy</a>
                <a href="./pages/contact.html">Report</a>
                <a href="./pages/contact.html">Contact Us</a>
                <a href="./pages/contact.html">Join Us</a>
            </div>
            <div class="footer-descrip">
                <p>Copyright © 2023 ResumeRensselaer</p>
                <p><a href="mailto:ResumeRensselaer@rpi.edu">ResumeRensselaer@rpi.edu</a></p>
            </div>
            <div class="footer-icon">
                <img src="../src/img/icon/linkedin.png">
                <img src="../src/img/icon/twitter.png">
                <img src="../src/img/icon/facebook.png">
            </div>
        </div>
    </footer>


</body>


</html>