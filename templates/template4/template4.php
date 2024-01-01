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
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./template4.css" type="text/css" />

    <title>Template 4</title>
</head>

<body class="resume_information">

    <!-- Creating header in hCard microformat with name, address, phone, email, and a picture of me -->
    <!-- Got the formatting for hCard microformat at https://developer.mozilla.org/en-US/docs/Web/HTML/microformats -->
    <section class="h-card_information" id="top">
      <!-- Name -->
      <p class="p-name" id="name"><?php echo $info_decoded["name"]; ?></p>

      <header class="my_information">
        <p class="p-locality" id="location"><?php echo $info_decoded["location"]; ?></p>

        <!-- Phone Number -->
        <p class="p-tel" id="phone"><?php echo $info_decoded["phone"]; ?></p>
        
        <!-- Email Address -->
        <p class="u-email" id="email"><?php echo $info_decoded["email"]; ?></p>
        
      </header>    
    </section>

    <!-- Creating introduction and objective statement -->
    

    <!-- Education Section with High School and College Information -->
    <section class="education"> 
        <h1 class="education_header">Education</h1>
        <h2 class="college_name">Rensselaer Polytechnic Institute</h2>
        <p id="major"><?php echo $info_decoded["major"]; ?></p>
        <p id="edates"><?php echo $info_decoded["rpidates"]; ?></p>
        <ul>
            <li id="activities_accomplishments" class="bringup"> 
                Activities/Accomplishments: <span id="accomplishments"><?php echo $info_decoded["rpiaccomplishments"]; ?></span>
            </li>
        </ul>
        <h2 class="highschool_name" id="hsname"><?php echo $info_decoded["hsname"]; ?></h2>
        <p id="highschool_degree">High School Diploma</p>
        <p id="hsedates"><?php echo $info_decoded["hsdates"]; ?></p>
        <ul>
            <li id="hs_accomplishments" class="bringup">
                Accomplishments: <span id="hsaccomplishments"><?php echo $info_decoded["hsaccomplishments"]; ?></span>
            </li>
        </ul>
    </section>
    

    <!-- Work Experience Section -->
    <section class="work_experience"> 
        <h1 class="workexperience_header">Work Experience</h1>

        <!-- Experience 1 -->
        <h2 class="experience_1_name" id="job1name"><?php echo $info_decoded["job1name"]; ?></h2>
        <p id="job1title"><?php echo $info_decoded["job1title"]; ?></p>
        <p id="job1dates"><?php echo $info_decoded["job1dates"]; ?></p>
        <ul id="job1des">
            <li class="job_description_1 bringup" id="job1des1"><?php echo $info_decoded["job1description1"]; ?></li>
            <li class="job_description_1" id="job1des2"><?php echo $info_decoded["job1description2"]; ?></li>
        </ul>

        <!-- Experience 2 -->
        <h2 class="experience_2_name" id="job2name"><?php echo $info_decoded["job2name"]; ?></h2>
        <p id="job2title"><?php echo $info_decoded["job2title"]; ?></p>
        <p id="job2dates"><?php echo $info_decoded["job2dates"]; ?></p>
        <ul id="job2des">
            <li class="job_description_2 bringup" id="job2des1"><?php echo $info_decoded["job2description1"]; ?></li>
            <li class="job_description_2" id="job2des2"><?php echo $info_decoded["job2description2"]; ?></li>
        </ul>

        <!-- Experience 3 -->
        <h2 class="experience_3_name" id="job3name"><?php echo $info_decoded["job3name"]; ?></h2>
        <p id="job3title"><?php echo $info_decoded["job3title"]; ?></p>
        <p id="job3dates"><?php echo $info_decoded["job3dates"]; ?></p>
        <ul id="job3des">
            <li class="job_description_3 bringup" id="job3des1"><?php echo $info_decoded["job3description1"]; ?></li>
            <li class="job_description_3" id="job3des2"><?php echo $info_decoded["job3description2"]; ?></li>
        </ul>
    </section>

    <!-- Skills Section with Programming Languages, Tools, Software Programs, etc-->
    <section class="skill_set">
        <h1 class="skillset_header">Skills</h1>
        <ul class="skill_description bringup" id="skills">
            <li id="skill1"><?php echo $info_decoded["hardskill1"]; ?></li>
            <li id="skill2"><?php echo $info_decoded["hardskill2"]; ?></li>
        </ul>
    </section>


</body>
</html>