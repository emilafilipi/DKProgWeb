<?php

global $conn;
require_once "../connect.php";
session_start();
$userID = $_SESSION["userID"];

$labelsToCheck = array("steps", "calories", "sleep", "Hydration", "Plank", "Lunges", "Pushups", "Squats", "Froggy_Jumps", "Quad_Strech");

$dataPoints = array();

$query_check_date = "SELECT date FROM `users`.`weeks` ORDER BY id DESC LIMIT 1";
$result_date = mysqli_query($conn, $query_check_date);

if ($result_date) {
    $row_date = mysqli_fetch_assoc($result_date);

    if ($row_date) {
        $date = $row_date["date"];
    }
}


foreach ($labelsToCheck as $label) {
    $query_check = "SELECT COUNT(*) AS count FROM `users`.`daily_goals` WHERE userID = '$userID' AND $label = 1 AND `date` >= '$date'";

    $result_check = mysqli_query($conn, $query_check);

    if ($result_check) {
        $row_check = mysqli_fetch_assoc($result_check);
        $numRows = $row_check['count'];
        // Add data to $dataPoints array
        $dataPoints[] = array("label" => $label, "y" => $numRows);
    } else {
        // Handle query error if needed
        echo "Error: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <script>

        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Weekly progress"
                },
                axisY: {
                    title: "Tasks"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>