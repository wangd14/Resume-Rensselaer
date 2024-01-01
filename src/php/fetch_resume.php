<?php
session_start();

function sendResponse($status, $message) {
    $response = array('status' => $status, 'message' => $message);

    // return response as JSON for easy access
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}


sendResponse("success", $_SESSION["resume_file"]);

exit();
?>