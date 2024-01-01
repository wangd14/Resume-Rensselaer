<?php
session_start();

function sendResponse($status, $message) {
    $response = array('status' => $status, 'message' => $message);

    // return response as JSON for easy access
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}


// check query method
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // check if the user is logged in (adjust as needed)
    if ($_SESSION["username"] != null) {

        // retrieve JSON file from the database

        $servername = 'localhost';
        $serverusername = 'root';
        $password = 'Team12ontop';
        $dbname = 'ResumeRensselaer';

        $conn = new mysqli($servername, $serverusername, $password, $dbname);

        // fail to connect
        if ($conn->connect_error) {
            sendResponse('error', 'Connection failed: ' . $conn->connect_error);
        }

        $username = $_SESSION['username'];
        // sanitize username
        $username = $conn->real_escape_string($username);

        // query to fetch resume info from the server
        $resume_info_query = "SELECT user_data.resume_info FROM user_data
                            WHERE user_data.user_id = (SELECT user_id FROM user WHERE username = ?)";

        $stmt_resume_info = $conn->prepare($resume_info_query);

        // Check if the statement is prepared
        if (!$stmt_resume_info) {
        sendResponse('error', 'Prepare statement failed: ' . $conn->error);
        }

        $stmt_resume_info->bind_param("s", $username);
        $stmt_resume_info->execute();
        $stmt_resume_info->bind_result($resume_info);

        // fetch the result
        if ($stmt_resume_info->fetch()) {
            // the statement before sending the response
            $stmt_resume_info->close();
        
            // the JSON data
            $decoded_resume_info = json_decode($resume_info);
        
            // for JSON decoding errors
            if ($decoded_resume_info === null && json_last_error() !== JSON_ERROR_NONE) {
                sendResponse("error", "Error decoding JSON data: " . json_last_error_msg());
            } else {
                // return JSON file
                $_SESSION["resume_file"] = $decoded_resume_info;
                sendResponse("success", $decoded_resume_info);
            }
        } else {
        sendResponse("error", "No data found for username: $username");
        }
        // close statement and connection
        $stmt_resume_info->close();
        $conn->close();
    } else {
        // redirect to the login page if the user is not logged in
        sendResponse("error", "User not logged in: " . $_SESSION["username"]);
    }
} else {
    // invalid action, method not GET
    sendResponse("error", "Invalid request method: " . $_SERVER["REQUEST_METHOD"]);
}

exit();
?>
