<?php
    session_start();

    $servername = 'localhost';
    $username = 'root';
    $password = 'Team12ontop';
    $dbname = 'ResumeRensselaer';



    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $query = "SELECT resume_info FROM user_data WHERE username = '{$_SESSION['username']}'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    
    $info_decoded = json_decode($row['resume_info'], true);


    $conn->close();
?>

<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Resume Rensselaer User Page</title>
        <link rel="stylesheet" href="../src/stylesheet/navbar.css" type="text/css" />
        <link rel="stylesheet" href="../src/stylesheet/userpage.css" type="text/css" />
        <script src="../src/jquery/jquery-3.7.1.js"></script>
         <script src="../src/javascript/userpage.js"></script>
 
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
                        <a href="./loggedin/home.html">Home</a>
                        <a href="./loggedin/about_page.html">About</a>
                        <a href="./loggedin/services.html">Services</a>
                        <a href="./loggedin/contact.html">Contact</a>
                        <a href="#">Profile</a>   
                    </div>
                </div>
            </div>    
        </div>

        <section class="userInterface">
            <div class="user-page-content">
                <div class="user-actions">
                    <ul class="actions">
                        <li><button id="build_resume"><a class="reglink" href="./loggedin/templateselect.html">Create Resume</a></button></li>
                        <li><button id="edit_profile_info">Edit Profile Information</button></li>
                        <li><button id="log_out"><a class="reglink" href="../index.html">Log Out</a></button></li>
                    </ul>
                </div>

                <section class="profile Presenting">
                    <h1><?php echo "Welcome, " . $info_decoded["name"]; ?></h1>
                    

                    <img class="user-image" src="../src/img/icon/profile_icon.png" alt="User's Image">

                    <p><?php echo "Username: " . $_SESSION["username"]; ?></p>
                    <p><?php echo "Email: " . $info_decoded["email"]; ?></p>
                    <p>Membership Type: Free</p>
                </section>

                <section class="account_setting NotPresenting">
                    <h1>Account Settings</h1>
                    <form id="account-settings-form" action="#" method="post">
                        <label for="username">New Username:</label>
                        <input type="text" id="username" name="username" placeholder="New username">
                        <label for="username">Confirm Username:</label>
                        <input type="text" id="confirm-username" name="confirm-username" placeholder="Confirm new username">

                        <label for="email">New Email:</label>
                        <input type="email" id="email" name="email" placeholder="New email address">
                        <label for="username">Confirm Email:</label>
                        <input type="text" id="confirm-email" name="confirm-email" placeholder="Confirm new email">

                        <label for="password">New Password:</label>
                        <input type="password" id="password" name="password" placeholder="New password">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password">
                        
                        <button type="submit" id="update-settings-button">Update Settings</button>
                    </form>
                </section>
    
                <!-- Add more content and functionality as needed -->
            </div>
            
        </section>




    </body>
</html>