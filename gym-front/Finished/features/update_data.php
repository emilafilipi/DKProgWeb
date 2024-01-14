<?php
global $conn;
require_once "../connect.php";

session_start();
$userID = $_SESSION["userID"];
if (isset($_POST['action']) && $_POST['action'] == "data") {

    $steps = $_POST['steps'];
    $calories = $_POST['calories'];
    $sleep = $_POST['sleep'];
    $hydration = $_POST['Hydration'];
    $plank = $_POST['Plank'];
    $lunges = $_POST['Lunges'];
    $pushups = $_POST['Pushups'];
    $squats = $_POST['Squats'];
    $froggyJumps = $_POST['Froggy_Jumps'];
    $quadStretch = $_POST['Quad_Strech'];

    date_default_timezone_set("Europe/London");
    $currentDate = date('Y-m-d');

    $query = "SELECT COUNT(*) as count_records FROM `users`.`daily_goals` WHERE date = '$currentDate' AND userID= '$userID'";
    $result = mysqli_query($conn, $query);

    $date = '';

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $countRecords = $row['count_records'];

        if ($countRecords > 0) {
//            echo "The date exists in the database.";
            http_response_code(203);
            echo json_encode(
                array(
                    "message" => "Internal Server Error " . __LINE__,
                    "error" => mysqli_error($conn)
                ));
            exit;
        } else {

            $query_check = "SELECT date FROM `users`.`weeks` WHERE userID = $userID ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($conn, $query_check);

            if(mysqli_num_rows($result)==0){
                $query_insert = "INSERT INTO `users`.`weeks` (userID,date) VALUES ('$userID','$currentDate')";
                $result_insert = mysqli_query($conn, $query_insert);

                if (!$result_insert) {
                    http_response_code(203);
                    echo json_encode(
                        array(
                            "message" => "Internal Server Error " . __LINE__,
                            "error" => mysqli_error($conn)
                        ));
                    exit;
                }
            }else {


                if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        $date = $row["date"];
                    }
                    // Free the result set
                    mysqli_free_result($result);
                } else {
                    http_response_code(203);
                    echo json_encode(
                        array(
                            "message" => "Error executing query: " . mysqli_error($conn)
                        ));
                    exit;
                }

//    date_default_timezone_set("Europe/London");
//    $currentDate = date('Y-m-d');

                if (date_diff(new DateTime($currentDate), new DateTime($date))->format("%a") > 7) {
                    $query_insert = "INSERT INTO `users`.`weeks` (userID,date) VALUES ('$userID','$currentDate')";
                    $result_insert = mysqli_query($conn, $query_insert);

                    if (!$result_insert) {
                        http_response_code(203);
                        echo json_encode(
                            array(
                                "message" => "Internal Server Error " . __LINE__,
                                "error" => mysqli_error($conn)
                            ));
                        exit;
                    }
                }

            }

            $query_insert = "INSERT INTO `users`.`daily_goals`
                 (userID, steps, calories, sleep, Hydration, Plank, Lunges, Pushups, Squats, Froggy_Jumps, Quad_Strech)
                 VALUES
                 ($userID, $steps, $calories, $sleep, $hydration, $plank, $lunges, $pushups, $squats, $froggyJumps, $quadStretch)";


            $result_insert = mysqli_query($conn, $query_insert);
            if (!$result_insert) {
                http_response_code(203);
                echo json_encode(
                    array(
                        "message" => "Internal Server Error " . __LINE__,
                        "error" => mysqli_error($conn)
                    ));
                exit;
            } else {
                http_response_code(201);
                echo json_encode(
                    array(
                        "message" => "Progress submitted",
                    ));
                exit;
            }

        }
    } else {
        http_response_code(203);
        echo json_encode([
            "message" => "Today's progress has been submitted before",
//            "error" => mysqli_error($conn)
        ]);
        exit;
    }
}
?>

