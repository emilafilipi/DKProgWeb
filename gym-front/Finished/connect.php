<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($host, $username, $password, $database,3307);

//echo "heyy";

if (!$conn){
    echo "Error ne lidhjen e databazes";
    exit;
}

//$query_check = "SELECT userID, password,name,username
//                    FROM users
//                    WHERE email = 'klea.kalliri@fti.edu.al'";


//$query_check = "UPDATE `users`.`users` SET `name` = 'Klea' WHERE (`userID` = '1')";
//
//$result_check = mysqli_query($conn, $query_check);
//
//if($result_check){
//
//    $query_check = "SELECT userID, password,name,username
//                    FROM users
//                    WHERE email = 'klea.kalliri@fti.edu.al'";
//
//    $result_check = mysqli_query($conn, $query_check);
//
//    $row_data = mysqli_fetch_assoc($result_check);
//    echo "id: ".$row_data["userID"]." ";
//    echo "pass: ".$row_data["password"]." ";
//    echo "name: ".$row_data["name"]." ";
//    echo "username: ".$row_data["username"]." ";
//}

//$query_insert = "INSERT INTO daily_goals
//                 SET userID    = "1",
//                     date    = "2023-12-29",
//                     steps    = "1",
//                     calories    = "1",
//                     sleep   = "1",
//                     Hydration   = "1",
//                     Plank   = "0",
//                     Lunges   = "0",
//                     Pushups   = "0",
//                     Squats   = "0",
//                     Froggy_Jumps   = "0",
//                     Quad_Strech   = "0"";

//$query_insert = "INSERT INTO `users`.`daily_goals`
//                 (userID, date, steps, calories, sleep, Hydration, Plank, Lunges, Pushups, Squats, Froggy_Jumps, Quad_Strech)
//                 VALUES
//                 ('4', '2024-01-3', '0', '1', '1', '', '0', '0', '1', '0', '1', '0')";
//
//$result_check = mysqli_query($conn, $query_insert);
