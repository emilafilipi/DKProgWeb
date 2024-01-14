<?php

global $conn;
require_once "../connect.php";
session_start();
$userID = $_SESSION["userID"];
$date = '';
$labelsToCheck = array("steps", "calories", "sleep", "Hydration", "Plank", "Lunges", "Pushups", "Squats", "Froggy_Jumps", "Quad_Strech");

$dataPoints = array();

$query_check_date = "SELECT date FROM `users`.`weeks` WHERE userID = $userID ORDER BY id DESC LIMIT 1";
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

        echo "Error: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="features.css">
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
<div class="header" id="header">
    <div class="navbar">
        <div class="navleft">
            <div class="dumbbell">
                <div class="dumbell"><img src="../ikona, foto/dumbbell-solid.png"></div>
                <div class="gym"><a style="text-decoration:none" href="../index.html" class="home">GYM</a></div>
            </div>
            <div class="navbar"><a style="text-decoration:none" href="../index.html" class="home">Home</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../Services/services.php" class="services">Services</a></div>

            <div class="dropdown">
                <a style="text-decoration:none" href="../index.html#features" class="features-btn">Features &#709</a>
                <div class="dropdown-content">
                    <a style="text-decoration:none" href="features1.php">General Tips</a>
                    <a style="text-decoration:none" href="features2.php">Choose Workout</a>
                    <a style="text-decoration:none" href="features3.php">View Progress</a>
                </div>
            </div>

            <div class="navbar"><a style="text-decoration:none" href="MyWorkouts.php" class="myWorkouts">My Workouts</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../contact/contact.php" class="contact">Contact</a></div>
        </div>

        <div class="navright">
            <div class=navbar><a style="text-decoration:none" href="../login/logout.php" class="signup">Log out</a></div>
        </div>
    </div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>