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
<html>
 <head>
    <title>Edit Profile Information</title>
    <link href="../src/stylesheet/profileinfo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../src/stylesheet/navbar.css" type="text/css" />
    <link rel="stylesheet" href="../src/stylesheet/userpage.css" type="text/css" />
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
                    <a href="./userpage.php">Profile</a>   
                </div>
            </div>
        </div>    
    </div>


    <br><br><br>
     
    <form id="addForm" name="addForm" method="POST" action="./updateprofile.php">
        <fieldset>
           <legend>Edit Profile Information</legend>
           <div class="formData">

              <label class="field" for="name">Name:</label>
              <div class="value">
                <input type="text" size="60" value="" name="name" id="name" />
                <br><span class="current">Current Name: <?php echo $info_decoded["name"];?>
            </div>
            <br>

              <label class="field" for="location">Location:</label>
              <div class="value">
                <input type="text" size="60" value="" name="location" id="location" />
                <br><span class="current">Current Location: <?php echo $info_decoded["location"];?>
              </div>
            <br>
              <label class="field" for="email">Email:</label>
              <div class="value"><input type="text" size="60" value="" name="email" id="email" />
              <br><span class="current">Current Email: <?php echo $info_decoded["email"];?>
            </div>
            <br>

              <label class="field" for="phone">Phone Number:</label>
              <div class="value"><input type="text" size="60" value="" name="phone" id="phone" />
              <br><span class="current">Current Phone Number: <?php echo $info_decoded["phone"];?>
            </div>
            <br>

              <label class="field" for="linkedin">LinkedIn URL:</label>
              <div class="value"><input type="text" size="60" value="" name="linkedin" id="linkedin" />
            <br><span class="current">Current LinkedIn URL: <?php echo (!empty($info_decoded["linkedin"])) ? $info_decoded["linkedin"] : "{not set}";?>
            </div>
            <br>

              <label class="field" for="obj">Objective Statement:</label>
              <div class="value"><textarea rows="10" cols="53" name="obj" id="obj" ></textarea>
              <br><span class="current">Current Objective Statement: <?php echo "\n" . $info_decoded["objective"];?>
            </div>
            <br>

              <label class="field" for="rpidates">Dates Enrolled at RPI:</label>
              <div class="value"><input type="text" size="60" value="" name="rpidates" id="rpidates" />
              <br><span class="current">Current RPI Dates: <?php echo $info_decoded["rpidates"];?>
            </div>
            <br>

              <label class="field" for="major">Major:</label>
              <div class="value"><input type="text" size="60" value="" name="major" id="major" />
              <br><span class="current">Current Major: <?php echo $info_decoded["major"];?>
            </div>
            <br>

              <label class="field" for="gpa">RPI GPA:</label>
              <div class="value"><input type="text" size="60" value="" name="gpa" id="gpa" />
              <br><span class="current">Current GPA: <?php echo $info_decoded["gpa"];?>
            </div>
            <br>

              <label class="field" for="accomplishments">RPI Accomplishments</label>
              <div class="value"><textarea rows="3" cols="53" name="accomplishments" id="accomplishments"></textarea>
              <br><span class="current">Current RPI Accomplishments: <?php echo "\n" . $info_decoded["rpiaccomplishments"];?>
            </div>
            <br>

               <br><br>

              <label class="field" for="hsname">High School Name</label>
              <div class="value"><input type="text" size="60" value="" name="hsname" id="hsname" />
              <br><span class="current">Current High School Name: <?php echo $info_decoded["hsname"];?>
            </div>
            <br>

              <label class="field" for="hsdates">High School Enrollment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="hsdates" id="hsdates" />
              <br><span class="current">Current High School Enrollment Dates: <?php echo $info_decoded["hsdates"];?>
            </div>
            <br>

              <label class="field" for="hsgpa">High School GPA</label>
              <div class="value"><input type="text" size="60" value="" name="hsgpa" id="hsgpa" />
              <br><span class="current">Current High School GPA: <?php echo $info_decoded["hsgpa"];?>
            </div>
            <br>

              <label class="field" for="hsactivities">High School Activities</label>
              <div class="value"><textarea rows="3" cols="53" name="hsactivities" id="hsactivities"></textarea>
              <br><span class="current">Current High School Activities: <?php echo (!empty($info_decoded["hsactivities"])) ? "\n" . $info_decoded["hsactivities"] : "{not set}";?>
            </div>
            <br>

              <label class="field" for="hsaccomplishments">High School Accomplishments</label>
              <div class="value"><textarea rows="3" cols="53" name="hsaccomplishments" id="hsaccomplishments"></textarea>
              <br><span class="current">Current High School Accomplishments: <?php echo "\n" . $info_decoded["hsaccomplishments"];?>
            </div>
            <br>

              <br><br>

              <label class="field" for="job1name">Job 1 Company Name</label>
              <div class="value"><input type="text" size="60" value="" name="job1name" id="job1name" />
              <br><span class="current">Current Job 1 Company Name: <?php echo $info_decoded["job1name"];?>
            </div>
            <br>

              <label class="field" for="job1title">Job 1 Position Title</label>
              <div class="value"><input type="text" size="60" value="" name="job1title" id="job1title" />
              <br><span class="current">Current Job 1 Position Title: <?php echo $info_decoded["job1title"];?>
            </div>
            <br>

              <label class="field" for="job1location">Job 1 Location</label>
              <div class="value"><input type="text" size="60" value="" name="job1location" id="job1location" />
              <br><span class="current">Current Job 1 Location: <?php echo $info_decoded["job1location"];?>
            </div>
            <br>

              <label class="field" for="job1dates">Job 1 Employment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="job1dates" id="job1dates" />
              <br><span class="current">Current Job 1 Employment Dates: <?php echo $info_decoded["job1dates"];?>
            </div>
            <br>

              <label class="field" for="job1description1">Job 1 Description 1</label>
              <div class="value"><textarea rows="3" cols="53" name="job1description1" id="job1description1"></textarea>
              <br><span class="current">Current Job 1 Description 1: <?php echo "\n" . $info_decoded["job1description1"];?>
            </div>
            <br>

              <label class="field" for="job1description2">Job 1 Description 2</label>
              <div class="value"><textarea rows="3" cols="53" name="job1description2" id="job1description2"></textarea>
              <br><span class="current">Current Job 1 Description 2: <?php echo "\n" . $info_decoded["job1description 2"];?>
            </div>
            <br>

              <label class="field" for="job1description3">Job 1 Description 3</label>
              <div class="value"><textarea rows="3" cols="53" name="job1description3" id="job1description3"></textarea>
              <br><span class="current">Current Job 1 Description 3: <?php echo (!empty($info_decoded["job1description3"])) ? "\n" . $info_decoded["job1description3"] : "{not set}";?>
            </div>
            <br>

              <br><br>

              <label class="field" for="job2name">Job 2 Company Name</label>
              <div class="value"><input type="text" size="60" value="" name="job2name" id="job2name" />
              <br><span class="current">Current Job 2 Company Name: <?php echo $info_decoded["job2name"];?>
            </div>
            <br>

              <label class="field" for="job2title">Job 2 Position Title</label>
              <div class="value"><input type="text" size="60" value="" name="job2title" id="job2title" />
              <br><span class="current">Current Job 2 Position Title: <?php echo $info_decoded["job2title"];?>
            </div>
            <br>

              <label class="field" for="job2location">Job 2 Location</label>
              <div class="value"><input type="text" size="60" value="" name="job2location" id="job2location" />
              <br><span class="current">Current Job 2 Location: <?php echo $info_decoded["job2location"];?>
            </div>
            <br>

              <label class="field" for="job2dates">Job 2 Employment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="job2dates" id="job2dates" />
              <br><span class="current">Current Job 2 Employment Dates: <?php echo $info_decoded["job2dates"];?>
            </div>
            <br>

              <label class="field" for="job2description1">Job 2 Description 1</label>
              <div class="value"><textarea rows="3" cols="53" name="job2description1" id="job2description1"></textarea>
              <br><span class="current">Current Job 2 Description 1: <?php echo "\n" . $info_decoded["job2description1"];?>
            </div>
            <br>

              <label class="field" for="job2description2">Job 2 Description 2</label>
              <div class="value"><textarea rows="3" cols="53" name="job2description2" id="job2description2"></textarea>
              <br><span class="current">Current Job 2 Description 2: <?php echo "\n" . $info_decoded["job2description 2"];?>
            </div>
            <br>

              <label class="field" for="job2description3">Job 2 Description 3</label>
              <div class="value"><textarea rows="3" cols="53" name="job2description3" id="job2description3"></textarea>
              <br><span class="current">Current Job 2 Description 3: <?php echo (!empty($info_decoded["job2description3"])) ? "\n" . $info_decoded["job2description3"] : "{not set}";?>
            </div>
            <br>

              <br><br>

              <label class="field" for="job3name">Job 3 Company Name</label>
              <div class="value"><input type="text" size="60" value="" name="job3name" id="job3name" />
              <br><span class="current">Current Job 3 Company Name: <?php echo $info_decoded["job3name"];?>
            </div>
            <br>

              <label class="field" for="job3title">Job 3 Position Title</label>
              <div class="value"><input type="text" size="60" value="" name="job3title" id="job3title" />
              <br><span class="current">Current Job 3 Position Title: <?php echo $info_decoded["job3title"];?>
            </div>
            <br>

              <label class="field" for="job3location">Job 3 Location</label>
              <div class="value"><input type="text" size="60" value="" name="job3location" id="job3location" />
              <br><span class="current">Current Job 3 Location: <?php echo $info_decoded["job3location"];?>
            </div>
            <br>

              <label class="field" for="job3dates">Job 3 Employment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="job3dates" id="job3dates" />
              <br><span class="current">Current Job 3 Employment Dates: <?php echo $info_decoded["job3dates"];?>
            </div>
            <br>

              <label class="field" for="job3description1">Job 3 Description 1</label>
              <div class="value"><textarea rows="3" cols="53" name="job3description1" id="job3description1"></textarea>
              <br><span class="current">Current Job 3 Description 1: <?php echo "\n" . $info_decoded["job3description1"];?>
            </div>
            <br>

              <label class="field" for="job3description2">Job 3 Description 2</label>
              <div class="value"><textarea rows="3" cols="53" name="job3description2" id="job3description2"></textarea>
              <br><span class="current">Current Job 3 Description 2: <?php echo "\n" .  $info_decoded["job3description2"];?>
            </div>
            <br>

              <label class="field" for="job3description3">Job 3 Description 3</label>
              <div class="value"><textarea rows="3" cols="53" name="job3description3" id="job3description3"></textarea>
              <br><span class="current">Current Job 3 Description 3: <?php echo (!empty($info_decoded["job3description3"])) ? "\n" . $info_decoded["job3description3"] : "{not set}";?>
            </div>
            <br>

              <br><br>

              <label class="field" for="project1name">Project 1 Name</label>
              <div class="value"><input type="text" size="60" value="" name="project1name" id="project1name" />
              <br><span class="current">Current Project 1 Name: <?php echo $info_decoded["project1name"];?>
            </div>
            <br>

              <label class="field" for="project1dates">Project 1 Dates</label>
              <div class="value"><input type="text" size="60" value="" name="project1dates" id="project1dates" />
              <br><span class="current">Current Project 1 Dates: <?php echo $info_decoded["project1dates"];?>
            </div>
            <br>

              <label class="field" for="project1description">Project 1 Description</label>
              <div class="value"><textarea rows="3" cols="53" name="project1description" id="project1description"></textarea>
              <br><span class="current">Current Project 1 Description: <?php echo "\n" . $info_decoded["project1description"];?>
            </div>
            <br>

              <label class="field" for="project2name">Project 2 Name</label>
              <div class="value"><input type="text" size="60" value="" name="project2name" id="project2name" />
              <br><span class="current">Current Project 2 Name: <?php echo $info_decoded["project2name"];?>
            </div>
            <br>

              <label class="field" for="project2dates">Project 2 Dates</label>
              <div class="value"><input type="text" size="60" value="" name="project2dates" id="project2dates" />
              <br><span class="current">Current Project 2 Dates: <?php echo $info_decoded["project2dates"];?>
            </div>
            <br>

              <label class="field" for="project2description">Project 2 Description</label>
              <div class="value"><textarea rows="3" cols="53" name="project2description" id="project2description"></textarea>
              <br><span class="current">Current Project 2 Description: <?php echo "\n" . $info_decoded["project2description"];?>
            </div>
            <br>

              <br><br>

              <label class="field" for="hardskill1">Hard Skill 1</label>
              <div class="value"><input type="text" size="60" value="" name="hardskill1" id="hardskill1" />
              <br><span class="current">Current Hard Skill 1: <?php echo $info_decoded["hardskill1"];?>
            </div>
            <br>

              <label class="field" for="hardskill2">Hard Skill 2</label>
              <div class="value"><input type="text" size="60" value="" name="hardskill2" id="hardskill2" />
              <br><span class="current">Current Hard Skill 2: <?php echo $info_decoded["hardskill2"];?>
            </div>
            <br>

              <label class="field" for="hardskill3">Hard Skill 3</label>
              <div class="value"><input type="text" size="60" value="" name="hardskill3" id="hardskill3" />
              <br><span class="current">Current Hard Skill 3: <?php echo (!empty($info_decoded["hardskill3"])) ? "\n" . $info_decoded["hardskill3"] : "{not set}";?>
            </div>
            <br>

              <label class="field" for="softskill1">Soft Skill 1</label>
              <div class="value"><input type="text" size="60" value="" name="softskill1" id="softskill1" />
              <br><span class="current">Current Soft Skill 1: <?php echo $info_decoded["softskill1"];?>
            </div>
            <br>

              <label class="field" for="softskill2">Soft Skill 2</label>
              <div class="value"><input type="text" size="60" value="" name="softskill2" id="softskill2" />
              <br><span class="current">Current Soft Skill 2: <?php echo $info_decoded["softskill2"];?>
            </div>
            <br>

              <label class="field" for="softskill3">Soft Skill 3</label>
              <div class="value"><input type="text" size="60" value="" name="softskill3" id="softskill3" />
              <br><span class="current">Current Soft Skill 3: <?php echo (!empty($info_decoded["softskill3"])) ? "\n" . $info_decoded["softskill3"] : "{not set}";?>
            </div>
            <br>

              <input type="submit" value="submit" id="submit" name="submit" />
           </div>
        </fieldset>
    </form>
    

    </body>
</html>