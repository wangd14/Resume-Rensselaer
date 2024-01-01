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
  <title>Template 3</title>
  <link rel="stylesheet" href="./template3.css" type="text/css">
  
</head>

<body class="individual_page">


  <header>

    <!-- Full name on top left of page -->
    <p id="name"><?php echo $info_decoded["name"]; ?></p>


    <ul class="personalinfo" id="address">
      <li id="location" ><?php echo $info_decoded["location"]; ?></li>
    </ul>
    <ul class="personalinfo" id="contact">
      <li id="email" ><?php echo $info_decoded["email"]; ?></li>
      <li id="phone" ><?php echo $info_decoded["phone"]; ?></li>
    </ul>
  </header>


  <!-- Objective Statement -->
  <section class="objective">
    <h2 class="sectionheader">OBJECTIVE STATEMENT</h2>

    <!-- Objective statement on the left just below location & contact information -->
    <p id="obj"><?php echo $info_decoded["objective"]; ?></p>
  </section>


  <!-- Education -->
  <section class="lowersection">
    <h2 class="sectionheader">EDUCATION</h2>

    <!-- College (RPI) -->
    <span class="schoolname">Rensselaer Polytechnic Institute <span id="dates"><?php echo $info_decoded["rpidates"]; ?></span></span>
    <p id="major"><?php echo $info_decoded["major"]; ?></p>
    <p class="accomplishments">
      <strong>Accomplishments:</strong> <span id="accomplishments"><?php echo $info_decoded["rpiaccomplishments"]; ?></span>
    </p>

    <!-- High School -->
    <span class="schoolname" id="hsname"><?php echo $info_decoded["hsname"]; ?> </span> <span class="schooldates" id="hsdates"><?php echo $info_decoded["hsdates"]; ?></span>
    <p class="accomplishments">
      <strong>Accomplishments:</strong> <span id="hsaccomplishments"><?php echo $info_decoded["hsaccomplishments"]; ?></span>
    </p>
  </section>


  <!-- Work Experiences -->
  <section class="lowersection">
    <h2 class="sectionheader">WORK EXPERIENCE</h2>

    <!-- First Work Experience -->
    <p class="workplace" id="job1name"><?php echo $info_decoded["job1name"]; ?></p>
    <p class="accomplishments"><em id="job1title"><?php echo $info_decoded["job1title"]; ?></em> <span id="job1dates"><?php echo $info_decoded["job1dates"]; ?></span></p>
    <ul class="detailslist" id="job1des">
    <li id="job1des1"><?php echo $info_decoded["job1description1"]; ?></li>
        <li id="job1des2"><?php echo $info_decoded["job1description2"]; ?></li>
        <?php 
            if (!empty($info_decoded["job1description3"])) {
                echo "<li>" . $info_decoded["job1description3"] . "</li>";
            }
        ?>
    </ul>

    <!-- Second Work Experience -->
    <p class="workplace" id="job2name"><?php echo $info_decoded["job2name"]; ?></p>
    <p class="accomplishments"><em id="job2title"><?php echo $info_decoded["job2title"]; ?></em> <span id="job2dates"><?php echo $info_decoded["job2dates"]; ?></span></p>
    <ul class="detailslist" id="job2des">
    <li id="job2des1"><?php echo $info_decoded["job2description1"]; ?></li>
        <li id="job2des2"><?php echo $info_decoded["job2description2"]; ?></li>
        <?php 
            if (!empty($info_decoded["job2description3"])) {
                echo "<li>" . $info_decoded["job2description3"] . "</li>";
            }
        ?>
    </ul>

    <!-- Third Work Experience -->
    <p class="workplace" id="job3name"><?php echo $info_decoded["job3name"]; ?></p>
    <p class="accomplishments"><em id="job3title"><?php echo $info_decoded["job3title"]; ?></em> <span id="job3dates"><?php echo $info_decoded["job3dates"]; ?></span></p>
    <ul class="detailslist" id="job3des">
    <li id="job3des1"><?php echo $info_decoded["job3description1"]; ?></li>
        <li id="job3des2"><?php echo $info_decoded["job3description2"]; ?></li>
        <?php 
            if (!empty($info_decoded["job3description3"])) {
                echo "<li>" . $info_decoded["job3description3"] . "</li>";
            }
        ?>
    </ul>
  </section>


  <!-- Skills -->
  <section class="lowersection">
    <h2 class="sectionheader">SKILLS</h2>

    <!-- First Four Skills -->
    <div id="columnleft">
      <ul class="detailslist" id="skillsl">
        <li id="lskill1"><?php echo $info_decoded["hardskill1"]; ?></li>
        <li id="lskill2"><?php echo $info_decoded["hardskill2"]; ?></li>
      </ul>
    </div>

    <!-- Second Four Skills -->
    <div id="columnright">
      <ul class="detailslist" id="skillsr">
        <li id="rskill1"><?php echo $info_decoded["softskill1"]; ?></li>
        <li id="rskill2"><?php echo $info_decoded["softskill2"]; ?></li>
      </ul>
    </div>
  </section>

</body>
</html>