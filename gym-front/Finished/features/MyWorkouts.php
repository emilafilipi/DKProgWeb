<?php
session_start();
if(!isset($_SESSION["userID"]) && !isset($_SESSION["email"])){
    header("location: ../login/login.html");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Workouts</title>
    <link rel = "stylesheet" type = "text/css" href = "MyWorkouts.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
    <style>
        .container img{
            width: 250px;
            height: 200px;
        }
        @media (max-width: 1000px) {
            .container img{
                zoom: 2.5;
            }
            .container p{
                font-size: 18px;
            }
        }

    </style>
</head>
<body>

<?php

$workout="";
//if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['Strength'])){
//    echo "<h1>jemi ok</h1>";
    $workout = "Strength";

}else if(isset($_POST['Cardio'])){
//    echo "<h1>jemi prp ok</h1>";
    $workout = "Cardio";

}else if(isset($_POST['LISS'])){
//    echo "<h1>jemi ok</h1>";
    $workout = "LISS";

}else if(isset($_POST['HIIT'])){
//    echo "<h1>jemi ok</h1>";
    $workout = "HIIT";
}else if(isset($_POST['Group'])){
//        echo "<h1>jemi ok</h1>";
    $workout = "Group";
}else if(isset($_POST['Flexibility/mobility'])){
//        echo "<h1>jemi ok</h1>";
    $workout = "Flexibility/mobility";

}else if(isset($_POST['Balance'])){
//        echo "<h1>jemi ok</h1>";
    $workout = "Balance";

}else if(isset($_POST['Stability'])){
//        echo "<h1>jemi ok</h1>";
    $workout = "Stability";
}
//}

$userID = $_SESSION["userID"];
//$userID = "1";
global $conn;
require_once "../connect.php";

$query_delete = "delete from usersworkouts where userID='".$userID."' and workout='".$workout."'";
$result_check = mysqli_query($conn,$query_delete);

?>

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

            <div class="navbar"><a style="text-decoration:none" href="MyWorkouts.php" class="about">My Workouts</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../contact/contact.php" class="contact">Contact</a></div>
        </div>

        <div class="navright">
            <div class="login"><a style="text-decoration:none" href="../login/login.html" class ="login">Login</a></div>
            <div class=navbar><a style="text-decoration:none" href="../login/signup.html" class="signup">Sign up</a></div>
        </div>
    </div>
</div>
<div class="container">
    <h1>My Workouts</h1>

    <form method="post" action="#" id="workouts">

        <?php
        $query_check = "select workout from usersworkouts where userID = '".$userID."'";
        $result_check = mysqli_query($conn, $query_check);

        while($row_data = mysqli_fetch_assoc($result_check)){

            $workoutName = $row_data["workout"];

            $query_check = "select photo,exercises,links from workouts where workout = '".$workoutName."'";
            $result_check1 = mysqli_query($conn, $query_check);
            $next_row_data = mysqli_fetch_assoc($result_check1);

            $photoURL = $next_row_data["photo"];

            $exercises = $next_row_data["exercises"];
            $array_exercises = explode(",","$exercises");

            $links = $next_row_data['links'];
            $array_links = explode(",","$links");
            ?>

            <div class = "row">
                <div class = "col1">
                    <img src = <?php echo("$photoURL") ?> >
                </div>
                <div class = "col2">
                    <br>
                    <h4><?php echo("$workoutName") ?></h4>
                    <p>
                        <br>
                    <p>
                        <a href=<?php echo("$array_links[0]") ?> target="_blank" ><?php echo("$array_exercises[0]") ?></a>
                    </p>
                    <br>
                    <p>
                        <a href=<?php echo("$array_links[1]") ?>  target="_blank" ><?php echo("$array_exercises[1]") ?></a>
                    </p>
                    <br>
                    <p>
                        <a href=<?php echo("$array_links[2]") ?> target="_blank" ><?php echo("$array_exercises[2]") ?></a>
                    </p>

                    <button class="button" name=<?php echo("$workoutName") ?> >X</button>
                    </p>
                </div>
            </div>

        <?php  }  ?>

    </form>
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
</body>
</html>
