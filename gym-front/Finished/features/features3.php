<?php

global $conn;
require_once "../connect.php";
session_start();
$userID = $_SESSION["userID"];

$labelsToCheck = array("steps", "calories", "sleep", "Hydration", "Plank", "Lunges", "Pushups", "Squats", "Froggy_Jumps", "Quad_Strech");

$dataPoints = array();

foreach ($labelsToCheck as $label) {
    $query_check = "SELECT COUNT(*) AS count FROM `users`.`daily_goals` WHERE userID = '$userID' AND $label = 1 ";

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
<!DOCTYPE html>
<html>
<head>
    <title>Features3</title>
    <script src="https://kit.fontawesome.com/88a6f1c20d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "features.css" />
    <style>
        .container img{
            width: 250px;
            border-radius: 8px;
        }
        .container .row{
            margin-bottom: 80px;
        }

        .container .rowrev{
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 40px 0;
            margin-bottom: 80px;
        }

        .container .download{
            width: 120px;
            height: 40px;
        }

        @media (max-width: 1000px) {
            .container img{
                zoom: 1.5;
            }
            .container .row{
                display: flex;
                margin: 50px 0;
                flex-direction: column-reverse;
                justify-content: center;
                align-items: center;
            }
            .container .rowrev{
                display: flex;
                margin: 50px 0;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        }
    </style>
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
            <div class="navbar"><a style="text-decoration:none" href="../Services/services.html" class="services">Services</a></div>

            <div class="dropdown">
                <a style="text-decoration:none" href="../index.html#features" class="features-btn">Features &#709</a>
                <div class="dropdown-content">
                    <a style="text-decoration:none" href="features1.html">General Tips</a>
                    <a style="text-decoration:none" href="features2.html">Choose Workout</a>
                    <a style="text-decoration:none" href="features3.php">View Progress</a>
                </div>
            </div>

            <div class="navbar"><a style="text-decoration:none" href="MyWorkouts.php" class="myWorkouts">My workouts</a></div>

            <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../contact/contact.php" class="contact">Contact</a></div>
        </div>

        <div class="navright">
            <div class=navbar><a style="text-decoration:none" href="../login/logout.php" class="signup">Sign out</a></div>
        </div>
    </div>
</div>
<div class="container">
    <h1>View progress and reach new limits</h1>
    <br>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <br>
    <h2>We believe that by training smarter you can have consistent and productive workouts. This is why we created powerful features to keep you on track:</h2>
    <div class = "row">
        <div class = "col1">
            <img src = "record.png">
        </div>
        <div class = "col2">
            <h4><i class="fa-solid fa-circle-check" style="color: #000000;"></i>&nbsp; Record your sets</h4>
            <p>You can quickly log your sets during your workout and focus on your training. Enjoy a complete view of your training
                at all times. See your last few sets instant-ly and add useful notes to enhance your workouts!
            </p><br>
        </div>
    </div>
    <div class = "rowrev">
        <div class = "col1">
            <h4><i class="fa-solid fa-circle-check" style="color: #000000;"></i>&nbsp; Smart Plates</h4>
            <p>We help you focus on what matters. For any weight, Setgraph shows you what plates to use, so you spend less time adding
                up the weight and more time achieving your goals.
            </p><br>
        </div>
        <div class = "col2">
            <img src = "plates.png">
        </div>
    </div>
    <div class = "row">
        <div class = "col1">
            <img src = "tracking.png">
        </div>
        <div class = "col2">
            <h4><i class="fa-solid fa-circle-check" style="color: #000000;"></i>&nbsp; Detailed tracking</h4>
            <p>Setgraph puts you in charge. You decide what you want to track. You can record every set, your personal records (PR),
                your 1 Rep Max, and benchmark your per-formance periodically.
            </p><br>
        </div>
    </div>
    <div class = "rowrev">
        <div class = "col1">
            <h4><i class="fa-solid fa-circle-check" style="color: #000000;"></i>&nbsp; Powerful graphs</h4>
            <p>Now you can use historical data to track your gains over time and set achievable goals.
                If you want to zoom in even more, you can filter to see your performance at particular rep/weight levels
            </p><br>
        </div>
        <div class = "col2">
            <img src = "graphs.png">
        </div>
    </div>
    <div class = "row">
        <div class = "col1">
            <img src = "leaderboards.png">
        </div>
        <div class = "col2">
            <h4><i class="fa-solid fa-circle-check" style="color: #000000;"></i>&nbsp; Live Leaderboards</h4>
            <p>Give your workouts a competitive edge with the live leaderboards feature. You can compete with your friends in real
                time and see how you rank up from workout to workout.
            </p><br>
        </div>
    </div>
    <div class = "rowrev">
        <div class = "col1">
            <h4><i class="fa-solid fa-circle-check" style="color: #000000;"></i>&nbsp; Rest Timer</h4>
            <p>Get notified whenever you have to start your next set. The timer automatically starts after completing each set.
            </p><br>
        </div>
        <div class = "col2">
            <img src = "timer.png">
        </div>
    </div>

    <h2>Download the app to access these features<br></h2>
    <a href="https://www.apple.com/app-store/"> <img src="apple.png" class="download"></a>
    <a href="https://play.google.com/store/games"> <img src="google.png" class="download"></a>
</div>

<div class="footer">
    <footer>
        <div class="copyright">
            <span class="left">Copyright &copy; Polytechinc University of Tirana 2023. All rights reserved.</span>
            <span class="right">
                <a href="#">Terms &amp; Conditions</a>
                <a href="#">   Privacy Policy</a>
                </span>
        </div>
    </footer>
</div>
</body>
<script>

    // window.location.href = "./chartAll.php";
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Your progress"
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
</html>
