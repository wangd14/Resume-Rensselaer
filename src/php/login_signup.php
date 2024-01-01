<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function sendResponse($status, $message, $redirectURL = null) {
    // return array to JavaScript
    $response = array('status' => $status, 'message' => $message, 'redirectURL' => $redirectURL);

    // return response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

function loginSuccess ($user_input_username, $user_input_password, $conn) {

    $user_input_username = $conn->real_escape_string($user_input_username);


    // setting session variables
    $_SESSION["username"] = $user_input_username;
    
    // setting expireation for session, 30 minutes
    $_SESSION["expire_time"] = time() + (30 * 60);

    
    
    $query = "SELECT resume_info FROM user_data WHERE username = '{$_SESSION['username']}'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();


    $info_decoded = json_decode($row['resume_info'], true);

    if ($info_decoded['name'] == null) {
        sendResponse('success', "Please Fill In Profile Information", './profileinfo.php');
    }

    else {
        sendResponse('success', "Login Success", './userpage.php');
    }
    



    $conn->close();
    exit();
}

// sanitizer found online
function mysql_utf8_sanitizer(string $str) {
    return preg_replace('/[\x{10000}-\x{10FFFF}]/u', "\xEF\xBF\xBD", $str);
}

function password_verify_custom($user_input_username, $user_input_password, $conn) {
    // sanitize user inputs
    $user_input_username = $conn->real_escape_string($user_input_username);
    $user_input_password = $conn->real_escape_string($user_input_password);


    // query to get hashed password for the specified username
    $query = "SELECT hashed_password FROM user WHERE username = ?";
    
    // use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_input_username);
    $stmt->execute();

    $server_password = null;
    
    // bind the result variable
    $stmt->bind_result($server_password);
    
    // fetch the result
    $stmt->fetch();

    // check if password matches
    if ($server_password !== null) {

        if ( password_verify($user_input_password, $server_password) ){
            return "Verified";
        } else {
            return "false";
        }

    } else {
        return "Query Error";
    }
}

// this function verify that inputed username is unique
function username_verify($user_input_username, $conn) {
    $user_input_username = $conn->real_escape_string($user_input_username);

    $query = "SELECT username FROM user WHERE username = '$user_input_username'";
    $result = $conn->query($query);

    // check if username already exist
    if ($result) {
        // if number of rows with that username is greater then zero, return error message
        return ($result->num_rows > 0) ? "Username already exists" : true;
    } else {
        // some other error handeling
        return "Error: " . $conn->error;
    }
}

function user_signup($user_input_username, $user_input_confirm_password, $conn) {
    $user_input_username = $conn->real_escape_string($user_input_username);
    $user_input_confirm_password = $conn->real_escape_string($user_input_confirm_password);

    $hashed_password = password_hash($user_input_confirm_password, PASSWORD_BCRYPT);

    // verify username is unique
    $usernameCheck = username_verify($user_input_username, $conn);
    if ($usernameCheck !== true) {
        return $usernameCheck;
    }

    // adding user to user table
    $user_query = $conn->prepare("INSERT INTO user (username, hashed_password) VALUES (?, ?)");
    $user_query->bind_param("ss", $user_input_username, $hashed_password);

    if (!$user_query->execute()) {
        return "Error adding user to user table:" . $user_query->error;
    }

    // get user_id of newly inserted user
    $user_id = $user_query->insert_id;

    // adding user to user_data table
    $user_data_query = $conn->prepare("INSERT INTO user_data (user_id, resume_info, username) VALUES (?, ?, ?)");

    $insertinfo = array(
        "name" => null,
        "location" => null,
        "email" => null,
        "phone" => null,
        "linkedin" => null,
        "objective" => null,
        "rpidates" => null,
        "major" => null,
        "gpa" => null,
        "rpiaccomplishments" => null,
        "hsname" => null,
        "hsdates" => null,
        "hsgpa" => null,
        "hsactivities" => null,
        "hsaccomplishments" => null,
        "job1name" => null,
        "job1title" => null,
        "job1location" => null,
        "job1dates" => null,
        "job1description1" => null,
        "job1description2" => null,
        "job1description3" => null,
        "job2name" => null,
        "job2title" => null,
        "job2location" => null,
        "job2dates" => null,
        "job2description1" => null,
        "job2description2" => null,
        "job2description3" => null,
        "job3name" => null,
        "job3title" => null,
        "job3location" => null,
        "job3dates" => null,
        "job3description1" => null,
        "job3description2" => null,
        "job3description3" => null,
        "project1name" => null,
        "project1dates" => null,
        "project1description" => null,
        "project2name" => null,
        "project2dates" => null,
        "project2description" => null,
        "hardskill1" => null,
        "hardskill2" => null,
        "hardskill3" => null,
        "softskill1" => null,
        "softskill2" => null,
        "softskill3" => null
    );

    $resume_info = json_encode($insertinfo);


    $user_data_query->bind_param("iss", $user_id, $resume_info, $user_input_username);

    if ($user_data_query->execute()) {
        return "Successfully signed up";
    }   else {
        return "Error adding user to user data " . $user_data_query->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = 'localhost';
    $username = 'root';
    $password = 'Team12ontop';
    $dbname = 'ResumeRensselaer';

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // fail to connect
    if ($conn->connect_error) {
        sendResponse('error', 'Connection failed: ' . $conn->connect_error);
    }

    if (isset($_POST['action']) && ($_POST['action'] == 'login' || $_POST['action'] == 'signup')) {

        // for login
        if (strtolower($_POST["action"]) == "login") {
            $user_input_username = $_POST["loginuserID"];
            $user_input_password = $_POST["loginPassWD"];

            // double check inputs
            if (!empty($user_input_username) && !empty($user_input_password)) {
                if (password_verify_custom($user_input_username, $user_input_password, $conn) == "Verified") {
                    // after loggin in successfully
                    loginSuccess($user_input_username, $user_input_password, $conn);
                } else {
                    sendResponse('error', 'Invalid username or password');
                }
            } else {
                sendResponse('error', 'Please enter both username and password');
            }
        }

        // for sign up
        else if (strtolower($_POST["action"]) == "signup") {
            $user_input_username = $_POST["signupUsername"];
            $user_input_password = $_POST["signupPassWD1"];
            $user_input_confirm_password = $_POST["signupPassWD2"];
            
            // double check if inputs are not empty, even though validated
            if (!empty($user_input_username) && !empty($user_input_password) && !empty($user_input_confirm_password)) {
                // double check if input password and confirm password matches
                if ($user_input_password == $user_input_confirm_password) {
                    $signupResult = user_signup($user_input_username, $user_input_confirm_password, $conn);
                    if ($signupResult == "Successfully signed up") {
                        sendResponse('success', $signupResult, '#?signup=success');

                    } else {
                        sendResponse('error', $signupResult);
                    }
                } else {
                    sendResponse('error', 'Invalid: password not confirmed.');
                }
            } else {
                sendResponse('error', 'Please enter both username and password.');
            }
        }

    } else {
        sendResponse("error", "Invalid action");
    }

    $conn->close();
} else {
    sendResponse('error', 'Invalid action type');
}
exit();
?>
