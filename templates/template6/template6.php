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
<html lang = "en">
    <head>
        <title>Template 6</title>
        <link rel="stylesheet" href="./template6.css" type="text/css">
        
    </head>

    <!--Has removeMargin and left justify-->
    <body class = "left removeMargin">

        <!-- hcard info (part3)-->
        <section id="horizontal" class = "vcard">
            
            <!--Name and personal info-->
            <h1 class = "personname removeBot given-name" id="firstname"><?php echo $info_decoded["name"]; ?></h1>
            <h2 class = "info street-address" id="location"><?php echo $info_decoded["location"]; ?></h2>

            <p class = "info">|</p>
            <h2 class = "info tel" id="phone"><?php echo $info_decoded["phone"]; ?></h2>
            <p class = "info">|</p>
            <p class = "info email" id="email"><?php echo $info_decoded["email"]; ?></p>
            
        </section>

        <!--Vertical segement of left bar-->
        <section id="vertical">

            <!--Objective statement-->
            <h3 class = "indent subjectleft removeBot">Objective Statement</h3>
            <p class = "indent removeBot removeTop descriptionleft" id="obj"><?php echo $info_decoded["objective"]; ?></p>

            <!--Skills tab-->
            <p class = "indent subjectleft removeBot">Skills:</p>
            <ul class = "indent removeBot removeTop descriptionleft" id="skills">
                <li id ="lskill1"><?php echo $info_decoded["hardskill1"]; ?></li>
                <li id = "rskill1"><?php echo $info_decoded["hardskill2"]; ?></li>
                <li id="lskill2"><?php echo $info_decoded["softskill1"]; ?></li>
            </ul>
        </section>

        <!-- using a div because of warning with section having no header-->
        <!-- This section is the bottom right section with the work exp and education-->
        <div id="main">

            <!--Education-->
            <p class = "indent subject removeBot">Education:</p>
            <!--RPI-->
            <p class = "cname indent removeBot removeTop">Rensselaer Polytechnic Institute (RPI)</p>
            <p class = "cmajor indent removeBot removeTop" id="major"><?php echo $info_decoded["major"]; ?></p>
            <p class = "cdate indent removeBot removeTop" id="edates"><?php echo $info_decoded["rpidates"]; ?></p>

            <ul id = "activities" class = "indent removeBot removeTop description">
                <li id = "cgpa"><?php echo $info_decoded["gpa"] . " GPA"; ?></li>
                <li id = "caward"><?php echo $info_decoded["rpiaccomplishments"]; ?></li>
            </ul>

            <!--High school-->
            <p class = "cname indent removeBot removeTop" id="hsname"><?php echo $info_decoded["hsname"]; ?></p>
            <p class = "cdate indent removeBot removeTop" id="highschool"><?php echo $info_decoded["hsdates"]; ?></p>
            <ul class = "indent removeBot removeTop description" id="hsawards">
                <li><?php echo $info_decoded["hsaccomplishments"]; ?></li>
            </ul>

            <!-- Work Exp-->
            <!--Work experience 1-->
            <p class = "indent subject removeBot">Work Experience:</p>
            
            <p class = "cname indent removeBot removeTop" id="job1name"><?php echo $info_decoded["job1name"]; ?></p>
            <p class = "cmajor indent removeBot removeTop" id="job1title"><?php echo $info_decoded["job1title"]; ?></p>
            <p class = "cdate indent removeBot removeTop" id="job1dates"><?php echo $info_decoded["job1dates"]; ?></p>
            <ul class = "indent removeBot removeTop description">
                <li id="job1des1"><?php echo $info_decoded["job1description1"]; ?></li>
                <li id="job1des2"><?php echo $info_decoded["job1description2"]; ?></li>
                <?php 
            if (!empty($info_decoded["job1description3"])) {
                echo "<li>" . $info_decoded["job1description3"] . "</li>";
            }
        ?>
            </ul>

            <!--Work experience 2-->
            <p class = "cname indent removeBot removeTop" id="job2name"><?php echo $info_decoded["job2name"]; ?></p>
            <p class = "cmajor indent removeBot removeTop" id="job2title"><?php echo $info_decoded["job2title"]; ?></p>
            <p class = "cdate indent removeBot removeTop" id="job2dates"><?php echo $info_decoded["job2dates"]; ?></p>
            <ul class = "indent removeBot removeTop description">
                <li id="job2des1"><?php echo $info_decoded["job2description1"]; ?></li>
                <li id="job2des2"><?php echo $info_decoded["job2description2"]; ?></li>
                <?php 
            if (!empty($info_decoded["job2description3"])) {
                echo "<li>" . $info_decoded["job2description3"] . "</li>";
            }
        ?>
            </ul>

            <!--Work experience 3-->
            <p class = "cname indent removeBot removeTop" id="job3name"><?php echo $info_decoded["job3name"]; ?></p>
            <p class = "cmajor indent removeBot removeTop" id="job3title"><?php echo $info_decoded["job3title"]; ?></p>
            <p class = "cdate indent removeBot removeTop" id="job3dates"><?php echo $info_decoded["job3dates"]; ?></p>
            <ul class = "indent removeBot removeTop description">
                <li id="job3des1"><?php echo $info_decoded["job3description1"]; ?></li>
                <li id="job3des2"><?php echo $info_decoded["job3description2"]; ?></li>
                <?php 
            if (!empty($info_decoded["job3description3"])) {
                echo "<li>" . $info_decoded["job3description3"] . "</li>";
            }
        ?>
            </ul>
        </div>
        

        <!--Profile picture-->
        <span id="profilepicture">
            <img src = "../templatepfp.jpg" alt = "[Profile Picture]" id = "pfp" class = "bubble">
        </span>

    </body>
</html>