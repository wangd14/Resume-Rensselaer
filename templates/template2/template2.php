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
    <link rel="stylesheet" href="./template2.css" type="text/css">
  
    <title>Template 2</title>
  </head>

  <body id="RESUME_BODY">
    <section class="vcard">
      
      <h1 id="name"><?php echo $info_decoded["name"]; ?> </h1>
      
      <address class="adr">
        <p id="location"><?php echo $info_decoded["location"]; ?></p>
      </address>
      <!-- contact info-->
      <div class="tel">
        <p id="phone"><?php echo $info_decoded["phone"]; ?></p> 
      </div>
      <div>
        <p id="email"><?php echo $info_decoded["email"]; ?></p>
      </div>
    </section>

    <!-- Objective Statement/Intro-->
    <h2 class="RESUME_section RESUME_section_title">Objective Statement/Intro</h2>
    <p class="RESUME_section objective_statement" id="obj"><?php echo $info_decoded["objective"]; ?></p>

    <!-- Education-->
    <h2 class="RESUME_section_title" id="edu">Education</h2>
    <section class="content_header">
      <h3 class="content_title">
        <p id="schoolName">Rensselaer Polytechnic Institute</p>
      </h3>
      <p class="date" id="schoolyear"><?php echo $info_decoded["rpidates"]; ?></p>
    </section>
    <p class="location">Troy, New York</p>
    <ul class="descriptions">
      <li id="major" class="bringup"><?php echo $info_decoded["major"]; ?></li>
      <li id="gpa"><?php echo $info_decoded["gpa"] . "GPA"; ?></li>
      <li id="accomplishments"><?php echo $info_decoded["rpiaccomplishments"]; ?></li>
    </ul>
    
    <section class="content_header">
      <h3 class="content_title">
        <p id="hsname"><?php echo $info_decoded["hsname"]; ?></p>
      </h3>
      <p class="date" id="hsdates"><?php echo $info_decoded["hsdates"]; ?></p>
    </section>
    <ul>
      <li class="bringup"><?php echo $info_decoded["hsgpa"] . "GPA"; ?></li>
      <li id="hsaccomplishments"><?php echo $info_decoded["hsaccomplishments"]; ?></li>
    </ul>

    <!-- Work/Experience-->
    <h2 class="RESUME_section_title">Work/Experience</h2>

    <section class="content_header">
      <h3 class="content_title">
        <p id="job1name"><?php echo $info_decoded["job1name"]; ?></p>
      </h3>
      <p class="date" id="job1dates"><?php echo $info_decoded["job1dates"]; ?></p>
    </section>
    <p class="content_title" id="job1title"><?php echo $info_decoded["job1title"]; ?></p>
    <ul class="descriptions">
        <li id="job1des1" class="bringup"><?php echo $info_decoded["job1description1"]; ?></li>
        <li id="job1des2"><?php echo $info_decoded["job1description2"]; ?></li>
        <?php 
                if (!empty($info_decoded["job1description3"])) {
                    echo "<li>" . $info_decoded["job1description3"] . "</li>";
                }
            ?>
    </ul>

    <section class="content_header">
        <h3 class="content_title">
          <p id="job2name"><?php echo $info_decoded["job2name"]; ?></p>
        </h3>
        <p class="date" id="job2dates"><?php echo $info_decoded["job2dates"]; ?></p>
    </section>
    <p class="content_title" id="job2title"><?php echo $info_decoded["job2title"]; ?></p>
    <ul class="descriptions">
        <li id="job2des1" class="bringup"><?php echo $info_decoded["job2description1"]; ?></li>
        <li id="job2des2"><?php echo $info_decoded["job2description2"]; ?></li>
        <?php 
                if (!empty($info_decoded["job2description3"])) {
                    echo "<li>" . $info_decoded["job2description3"] . "</li>";
                }
            ?>
    </ul>

    <section class="content_header">
        <h3 class="content_title">
          <p id="job3name"><?php echo $info_decoded["job3name"]; ?></p>
        </h3>
        <p class="date" id="job3dates"><?php echo $info_decoded["job3dates"]; ?></p>
    </section>
    <p class="content_title" id="job3title"><?php echo $info_decoded["job3title"]; ?></p>
    <ul class="descriptions">
        <li id="job3des1" class="bringup"><?php echo $info_decoded["job3description1"]; ?></li>
        <li id="job3des2"><?php echo $info_decoded["job3description2"]; ?></li>
        <?php 
                if (!empty($info_decoded["job3description3"])) {
                    echo "<li>" . $info_decoded["job3description3"] . "</li>";
                }
            ?>
    </ul>

    <!-- Skills-->
    <h2 class="RESUME_section_title">Skills</h2>
    <ul class="descriptions" id="skills">
        <li class="bringup"><?php echo $info_decoded["hardskill1"]; ?></li>
        <li><?php echo $info_decoded["hardskill2"]; ?></li>
        <li><?php echo $info_decoded["softskill1"]; ?></li>
    </ul>
   
    <!-- Activities-->
    

  </body>
</html>