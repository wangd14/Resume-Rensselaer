<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    

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

    

    if (!empty($_POST["name"])) $info_decoded["name"] = $_POST["name"];
    
    if (!empty($_POST["location"])) $info_decoded["location"] = $_POST["location"];
    
    if (!empty($_POST["email"])) $info_decoded["email"] = $_POST["email"];
    if (!empty($_POST["phone"])) $info_decoded["phone"] = $_POST["phone"];
    if (!empty($_POST["linkedin"])) $info_decoded["linkedin"] = $_POST["linkedin"];

    

    if (!empty($_POST["obj"])) $info_decoded["objective"] = $_POST["obj"];
    if (!empty($_POST["rpidates"])) $info_decoded["rpidates"] = $_POST["rpidates"];
    if (!empty($_POST["major"])) $info_decoded["major"] = $_POST["major"];
    if (!empty($_POST["gpa"])) $info_decoded["gpa"] = $_POST["gpa"];
    if (!empty($_POST["accomplishments"])) $info_decoded["rpiaccomplishments"] = $_POST["accomplishments"];

    

    if (!empty($_POST["hsname"])) $info_decoded["hsname"] = $_POST["hsname"];
    if (!empty($_POST["hsdates"])) $info_decoded["hsdates"] = $_POST["hsdates"];
    if (!empty($_POST["hsgpa"])) $info_decoded["hsgpa"] = $_POST["hsgpa"];
    if (!empty($_POST["hsactivities"])) $info_decoded["hsactivities"] = $_POST["hsactivities"];
    
    if (!empty($_POST["hsaccomplishments"])) $info_decoded["hsaccomplishments"] = $_POST["hsaccomplishments"];

    

    if (!empty($_POST["job1name"])) $info_decoded["job1name"] = $_POST["job1name"];
    if (!empty($_POST["job1title"])) $info_decoded["job1title"] = $_POST["job1title"];
    if (!empty($_POST["job1location"])) $info_decoded["job1location"] = $_POST["job1location"];
    if (!empty($_POST["job1dates"])) $info_decoded["job1dates"] = $_POST["job1dates"];
    if (!empty($_POST["job1description1"])) $info_decoded["job1description1"] = $_POST["job1description1"];
    if (!empty($_POST["job1description2"])) $info_decoded["job1description2"] = $_POST["job1description2"];
    if (!empty($_POST["job1description3"])) $info_decoded["job1description3"] = $_POST["job1description3"];
    

    

    if (!empty($_POST["job2name"])) $info_decoded["job2name"] = $_POST["job2name"];
    if (!empty($_POST["job2title"])) $info_decoded["job2title"] = $_POST["job2title"];
    if (!empty($_POST["job2title"])) $info_decoded["job2location"] = $_POST["job2location"];
    if (!empty($_POST["job2dates"])) $info_decoded["job2dates"] = $_POST["job2dates"];
    if (!empty($_POST["job2description1"])) $info_decoded["job2description1"] = $_POST["job2description1"];
    if (!empty($_POST["job2description2"])) $info_decoded["job2description2"] = $_POST["job2description2"];
    if (!empty($_POST["job2description3"])) $info_decoded["job2description3"] = $_POST["job2description3"];
    

    

    if (!empty($_POST["job3name"])) $info_decoded["job3name"] = $_POST["job3name"];
    if (!empty($_POST["job3title"])) $info_decoded["job3title"] = $_POST["job3title"];
    if (!empty($_POST["job3location"])) $info_decoded["job3location"] = $_POST["job3location"];
    if (!empty($_POST["job3dates"])) $info_decoded["job3dates"] = $_POST["job3dates"];
    if (!empty($_POST["job3description1"])) $info_decoded["job3description1"] = $_POST["job3description1"];
    if (!empty($_POST["job3description2"])) $info_decoded["job3description2"] = $_POST["job3description2"];
    if (!empty($_POST["job3description3"])) $info_decoded["job3description3"] = $_POST["job3description3"];
    

    

    if (!empty($_POST["project1name"])) $info_decoded["project1name"] = $_POST["project1name"];
    if (!empty($_POST["project1dates"])) $info_decoded["project1dates"] = $_POST["project1dates"];
    if (!empty($_POST["project1description"])) $info_decoded["project1description"] = $_POST["project1description"];

    

    if (!empty($_POST["project2name"])) $info_decoded["project2name"] = $_POST["project2name"];
    if (!empty($_POST["project2dates"])) $info_decoded["project2dates"] = $_POST["project2dates"];
    if (!empty($_POST["project2description"])) $info_decoded["project2description"] = $_POST["project2description"];

    

    if (!empty($_POST["hardskill1"])) $info_decoded["hardskill1"] = $_POST["hardskill1"];
    if (!empty($_POST["hardskill2"])) $info_decoded["hardskill2"] = $_POST["hardskill2"];
    if (!empty($_POST["hardskill3"])) $info_decoded["hardskill3"] = $_POST["hardskill3"];
    

    

    if (!empty($_POST["softskill1"])) $info_decoded["softskill1"] = $_POST["softskill1"];
    if (!empty($_POST["softskill2"])) $info_decoded["softskill2"] = $_POST["softskill2"];
    if (!empty($_POST["softskill3"])) $info_decoded["softskill3"] = $_POST["softskill3"];
    

    
    

    $info_encoded = json_encode($info_decoded);

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $stmt = $conn->prepare("UPDATE user_data SET resume_info = ? WHERE username = ?");
    $stmt->bind_param("ss", $info_encoded, $_SESSION['username']);
    $result = $stmt->execute();

    if (!$result) {
        die("Error updating database: " . $stmt->error);
    }

   
    $stmt->close();
    $conn->close();

    

    sleep(1);

    header("Location: ./userpage.php");

    

?>
