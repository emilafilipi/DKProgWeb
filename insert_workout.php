<?php
global $conn;
require_once "../connect.php";
session_start();
$userID = $_SESSION["userID"];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buttonValue'])) {

    $buttonValue = $_POST['buttonValue'];

// Escape the user input to prevent SQL injection
    $buttonValue = mysqli_real_escape_string($conn, $buttonValue);

    $query_insert = "INSERT INTO `users`.`usersworkouts` (userID, workout) VALUES ($userID, '$buttonValue')";
    $result_insert = mysqli_query($conn, $query_insert);

    if (!$result_insert) {
        http_response_code(500); // Internal Server Error
        echo json_encode(
            array(
                "message" => "Internal Server Error",
                "error" => mysqli_error($conn)
            ));
        exit;
    }
    else {
        http_response_code(201);
        echo json_encode(
            array(
                "message" => "u rregjistrua",
            ));
        exit;
    }

}
else {
    http_response_code(400); // Bad Request
    echo json_encode(array(
        "status" => "error",
        "message" => "Invalid request"
    ));
    exit;
}
?>

