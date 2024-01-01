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
  <title>Template 5</title>
  <link rel="stylesheet" href="./template5.css" type="text/css" >
  <script type="text/javascript" src="./jquery-3.6.1.min.js"></script>

 
</head>

<body>

  <!-- Header using hCard microformat -->
  <header class="h-card">

    <!-- p-name class -->
    <h1 class="p-name" id="name"> <?php echo $info_decoded["name"]; ?> </h1>

    <!-- heading for personal information -->
    <h2 class="personalinfo"> 

      <!-- hCard classes for full address -->
      <span id="location"><?php echo $info_decoded["location"]; ?></span>

      <!-- Using a slash to separate location and phone -->
      <span> / </span>

      <!-- hCard class for phone number -->
      <span id="phone"><?php echo $info_decoded["phone"]; ?></span>

      <!-- Slash for separation  -->
      <span> / </span>

      <!-- hCard class for email and mail link, from reference 3 on README -->
      <span id="email"><?php echo $info_decoded["email"]; ?></span>

      <!-- Slash for separation  -->
      <span> / </span>

      <span id="li"><?php echo $info_decoded["linkedin"]; ?></span> 
    </h2>  
  </header>

  <!-- Heading for objective statement -->
  <h3 class="title"> Objective </h3>
  <ul id="description">
    <li id="obj" class="bringup"><?php echo $info_decoded["objective"]; ?></li>
  </ul>


  

  




  <!-- Heading for education section -->
  <h4 class="title"> Education </h4>
  <ul id="description" class="bringup">

    <!-- List of school information with links to RPI and my high school -->
    <b>Rensselaer Polytechnic Institute <span id="schoolyear"><?php echo $info_decoded["rpidates"]; ?></span></b>
    <li><?php echo $info_decoded["gpa"] . " GPA"; ?></li>
    <li id="major"><?php echo $info_decoded["major"]; ?></li>
    <li id="accomplishments"><?php echo $info_decoded["rpiaccomplishments"]; ?></li>
    <br>
    <b> <span id="hsname"><?php echo $info_decoded["hsname"]; ?></span> <span id="hsdates"><?php echo $info_decoded["hsdates"]; ?></span></b> 
    <li id="hsaccomplishments"><?php echo $info_decoded["hsaccomplishments"]; ?></li>
  </ul>



  <!-- Heading for jobs, listed from 2021 - 2023 -->
  <h5 class="title">Job Experience</h5>
  <ul id="description">
    <li class="bringup">
        <b><span id="job1name"><?php echo $info_decoded["job1name"]; ?></span>
        <br>
        <span id="job1title"><?php echo $info_decoded["job1title"]; ?></span></b> 
        <br>
        <span id="job1location"><?php echo $info_decoded["job1location"]; ?></span> <span id="job1dates"><?php echo $info_decoded["job1dates"]; ?></span>
        <ul class="description" id="job1des">
            <li id="job1des1"><?php echo $info_decoded["job1description1"]; ?></li>
            <li id="job1des2"><?php echo $info_decoded["job1description2"]; ?></li>
            <?php 
                if (!empty($info_decoded["job1description3"])) {
                    echo "<li>" . $info_decoded["job1description3"] . "</li>";
                }
            ?>
        </ul>
    </li>


    <li>
        <b><span id="job2name"><?php echo $info_decoded["job2name"]; ?></span>
        <br>
        <span id="job2title"><?php echo $info_decoded["job2title"]; ?></span></b> 
        <br>
        <span id="job2location"><?php echo $info_decoded["job2location"]; ?></span> <span id="job2dates"><?php echo $info_decoded["job2dates"]; ?></span>
        <ul class="description" id="job1des">
            <li id="job1des1"><?php echo $info_decoded["job2description1"]; ?></li>
            <li id="job1des2"><?php echo $info_decoded["job2description2"]; ?></li>
            <?php 
                if (!empty($info_decoded["job2description3"])) {
                    echo "<li>" . $info_decoded["job2description3"] . "</li>";
                }
            ?>
        </ul>
    </li>


    <li>
        <b><span id="job3name"><?php echo $info_decoded["job3name"]; ?></span>
        <br>
        <span id="job3title"><?php echo $info_decoded["job3title"]; ?></span></b> 
        <br>
        <span id="job3location"><?php echo $info_decoded["job3location"]; ?></span> <span id="job3dates">[<?php echo $info_decoded["job3dates"]; ?></span>
        <ul class="description" id="job1des">
            <li id="job1des1"><?php echo $info_decoded["job3description1"]; ?></li>
            <li id="job1des2"><?php echo $info_decoded["job3description2"]; ?></li>
            <?php 
                if (!empty($info_decoded["job3description3"])) {
                    echo "<li>" . $info_decoded["job3description3"] . "</li>";
                }
            ?>
        </ul>
    </li>

  </ul>  

  

  <!-- Heading for skills list -->
  <h5 class="title">Skills</h5>
  <h6 class="skillslist">
    <ul class="skills bringup" id="hardskills">
        <b> Hard Skills: </b>
        <li id="hardskill1"><?php echo $info_decoded["hardskill1"]; ?></li>
        <li id="hardskill2"><?php echo $info_decoded["hardskill2"]; ?></li>
        <?php 
                if (!empty($info_decoded["hardskill3"])) {
                    echo "<li>" . $info_decoded["hardskill3"] . "</li>";
                }
            ?>
    </ul>

    <!-- Soft skills list that will be next to other list -->
    <ul class="skills bringup" id="softskills">
        <b> Soft Skills:</b>
        <li id="softskill1"><?php echo $info_decoded["softskill1"]; ?></li>
        <li id="softskill2"><?php echo $info_decoded["softskill2"]; ?></li>
        <?php 
                if (!empty($info_decoded["softskill3"])) {
                    echo "<li>" . $info_decoded["softskill3"] . "</li>";
                }
            ?>
    </ul>
  </h6>

  



  <object data="temp.pdf" type="application/pdf" height="300px"></object>

</body>
</html>