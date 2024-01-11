<?php
global $conn;
require_once "../connect.php";

session_start();

$userID = $_SESSION["userID"];
$strength = 'Muscle Surrender';
$lift = 'Lift & Lounge';
$yoga = 'Yoga & Unwind';
$cardio = 'Sweat It Off!';


$query_check_strength = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$strength'";
$result_check_strength = mysqli_query($conn, $query_check_strength);
$signed_up_strength = mysqli_num_rows($result_check_strength) > 0;


$query_check_lift = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$lift'";
$result_check_lift = mysqli_query($conn, $query_check_lift);
$signed_up_lift = mysqli_num_rows($result_check_lift) > 0;

$query_check_yoga = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$yoga'";
$result_check_yoga = mysqli_query($conn, $query_check_yoga);
$signed_up_yoga = mysqli_num_rows($result_check_yoga) > 0;

$query_check_cardio = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$cardio'";
$result_check_cardio = mysqli_query($conn, $query_check_cardio);
$signed_up_cardio = mysqli_num_rows($result_check_cardio) > 0;

if(isset($_POST['submitStrength'])  && !$signed_up_strength){
    $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$strength')";
    $result_insert = mysqli_query($conn, $query_insert);
}

if(isset($_POST['submitLift']) && !$signed_up_lift){
    $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$lift')";
    $result_insert = mysqli_query($conn, $query_insert);
}
if(isset($_POST['submitYoga']) && !$signed_up_yoga){
    $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$yoga')";
    $result_insert = mysqli_query($conn, $query_insert);
}
if(isset($_POST['submitCardio']) && !$signed_up_cardio){
    $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$cardio')";
    $result_insert = mysqli_query($conn, $query_insert);
}

//$query_delete = "DELETE FROM users.classes";
//$result_check_delete = mysqli_query($conn, $query_delete);
?>