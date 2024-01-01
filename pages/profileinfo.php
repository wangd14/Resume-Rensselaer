<?php
    session_start();
?>

<!DOCTYPE html>
<html>
 <head>
     <title>Profile Information</title>
     <link href="../src/stylesheet/profileinfo.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="../src/javascript/profileinfo.js"></script>
 </head>
 <body>
     
     <form id="addForm" name="addForm" onsubmit="return validate(this);" method="POST" action="./fillinprofile.php">
        <fieldset>
           <legend>Profile Information</legend>
           <div class="formData">

              <label class="field" for="name">Name:</label>
              <div class="value"><input type="text" size="60" value="" name="name" id="name" /></div>

              <label class="field" for="location">Location:</label>
              <div class="value"><input type="text" size="60" value="" name="location" id="location" /></div>

              <label class="field" for="email">Email:</label>
              <div class="value"><input type="text" size="60" value="" name="email" id="email" /></div>

              <label class="field" for="phone">Phone Number:</label>
              <div class="value"><input type="text" size="60" value="" name="phone" id="phone" /></div>

              <label class="field" for="linkedin">LinkedIn URL (Optional):</label>
              <div class="value"><input type="text" size="60" value="" name="linkedin" id="linkedin" /></div>

              <label class="field" for="obj">Objective Statement:</label>
              <div class="value"><textarea rows="10" cols="53" name="obj" id="obj" ></textarea></div>

              <label class="field" for="rpidates">Dates Enrolled at RPI:</label>
              <div class="value"><input type="text" size="60" value="" name="rpidates" id="rpidates" /></div>

              <label class="field" for="major">Major:</label>
              <div class="value"><input type="text" size="60" value="" name="major" id="major" /></div>

              <label class="field" for="gpa">RPI GPA:</label>
              <div class="value"><input type="text" size="60" value="" name="gpa" id="gpa" /></div>

              <label class="field" for="accomplishments">RPI Accomplishments</label>
              <div class="value"><textarea rows="3" cols="53" name="accomplishments" id="accomplishments"></textarea></div>

               <br><br>

              <label class="field" for="hsname">High School Name</label>
              <div class="value"><input type="text" size="60" value="" name="hsname" id="hsname" /></div>

              <label class="field" for="hsdates">High School Enrollment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="hsdates" id="hsdates" /></div>

              <label class="field" for="hsgpa">High School GPA</label>
              <div class="value"><input type="text" size="60" value="" name="hsgpa" id="hsgpa" /></div>

              <label class="field" for="hsactivities">High School Activities (Optional)</label>
              <div class="value"><textarea rows="3" cols="53" name="hsactivities" id="hsactivities"></textarea></div>

              <label class="field" for="hsaccomplishments">High School Accomplishments</label>
              <div class="value"><textarea rows="3" cols="53" name="hsaccomplishments" id="hsaccomplishments"></textarea></div>

              <br><br>

              <label class="field" for="job1name">Job 1 Company Name</label>
              <div class="value"><input type="text" size="60" value="" name="job1name" id="job1name" /></div>

              <label class="field" for="job1title">Job 1 Position Title</label>
              <div class="value"><input type="text" size="60" value="" name="job1title" id="job1title" /></div>

              <label class="field" for="job1location">Job 1 Location</label>
              <div class="value"><input type="text" size="60" value="" name="job1location" id="job1location" /></div>

              <label class="field" for="job1dates">Job 1 Employment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="job1dates" id="job1dates" /></div>

              <label class="field" for="job1description1">Job 1 Description 1</label>
              <div class="value"><textarea rows="3" cols="53" name="job1description1" id="job1description1"></textarea></div>

              <label class="field" for="job1description2">Job 1 Description 2</label>
              <div class="value"><textarea rows="3" cols="53" name="job1description2" id="job1description2"></textarea></div>

              <label class="field" for="job1description3">Job 1 Description 3 (Optional)</label>
              <div class="value"><textarea rows="3" cols="53" name="job1description3" id="job1description3"></textarea></div>

              <br><br>

              <label class="field" for="job2name">Job 2 Company Name</label>
              <div class="value"><input type="text" size="60" value="" name="job2name" id="job2name" /></div>

              <label class="field" for="job2title">Job 2 Position Title</label>
              <div class="value"><input type="text" size="60" value="" name="job2title" id="job2title" /></div>

              <label class="field" for="job2location">Job 2 Location</label>
              <div class="value"><input type="text" size="60" value="" name="job2location" id="job2location" /></div>

              <label class="field" for="job2dates">Job 2 Employment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="job2dates" id="job2dates" /></div>

              <label class="field" for="job2description1">Job 2 Description 1</label>
              <div class="value"><textarea rows="3" cols="53" name="job2description1" id="job2description1"></textarea></div>

              <label class="field" for="job2description2">Job 2 Description 2</label>
              <div class="value"><textarea rows="3" cols="53" name="job2description2" id="job2description2"></textarea></div>

              <label class="field" for="job2description3">Job 2 Description 3 (Optional)</label>
              <div class="value"><textarea rows="3" cols="53" name="job2description3" id="job2description3"></textarea></div>

              <br><br>

              <label class="field" for="job3name">Job 3 Company Name</label>
              <div class="value"><input type="text" size="60" value="" name="job3name" id="job3name" /></div>

              <label class="field" for="job3title">Job 3 Position Title</label>
              <div class="value"><input type="text" size="60" value="" name="job3title" id="job3title" /></div>

              <label class="field" for="job3location">Job 3 Location</label>
              <div class="value"><input type="text" size="60" value="" name="job3location" id="job3location" /></div>

              <label class="field" for="job3dates">Job 3 Employment Dates</label>
              <div class="value"><input type="text" size="60" value="" name="job3dates" id="job3dates" /></div>

              <label class="field" for="job3description1">Job 3 Description 1</label>
              <div class="value"><textarea rows="3" cols="53" name="job3description1" id="job3description1"></textarea></div>

              <label class="field" for="job3description2">Job 3 Description 2</label>
              <div class="value"><textarea rows="3" cols="53" name="job3description2" id="job3description2"></textarea></div>

              <label class="field" for="job3description3">Job 3 Description 3 (Optional)</label>
              <div class="value"><textarea rows="3" cols="53" name="job3description3" id="job3description3"></textarea></div>

              <br><br>

              <label class="field" for="project1name">Project 1 Name</label>
              <div class="value"><input type="text" size="60" value="" name="project1name" id="project1name" /></div>

              <label class="field" for="project1dates">Project 1 Dates</label>
              <div class="value"><input type="text" size="60" value="" name="project1dates" id="project1dates" /></div>

              <label class="field" for="project1description">Project 1 Description</label>
              <div class="value"><textarea rows="3" cols="53" name="project1description" id="project1description"></textarea></div>

              <label class="field" for="project2name">Project 2 Name</label>
              <div class="value"><input type="text" size="60" value="" name="project2name" id="project2name" /></div>

              <label class="field" for="project2dates">Project 2 Dates</label>
              <div class="value"><input type="text" size="60" value="" name="project2dates" id="project2dates" /></div>

              <label class="field" for="project2description">Project 2 Description</label>
              <div class="value"><textarea rows="3" cols="53" name="project2description" id="project2description"></textarea></div>

              <br><br>

              <label class="field" for="hardskill1">Hard Skill 1</label>
              <div class="value"><input type="text" size="60" value="" name="hardskill1" id="hardskill1" /></div>

              <label class="field" for="hardskill2">Hard Skill 2</label>
              <div class="value"><input type="text" size="60" value="" name="hardskill2" id="hardskill2" /></div>

              <label class="field" for="hardskill3">Hard Skill 3 (Optional)</label>
              <div class="value"><input type="text" size="60" value="" name="hardskill3" id="hardskill3" /></div>

              <label class="field" for="softskill1">Soft Skill 1</label>
              <div class="value"><input type="text" size="60" value="" name="softskill1" id="softskill1" /></div>

              <label class="field" for="softskill2">Soft Skill 2</label>
              <div class="value"><input type="text" size="60" value="" name="softskill2" id="softskill2" /></div>

              <label class="field" for="softskill3">Soft Skill 3 (Optional)</label>
              <div class="value"><input type="text" size="60" value="" name="softskill3" id="softskill3" /></div>

              <input type="submit" value="submit" id="submit" name="submit" />
           </div>
        </fieldset>
    </form>
    

    </body>
</html>