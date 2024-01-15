<?php
session_start();
if(!isset($_SESSION["userID"]) && !isset($_SESSION["email"])){
    header("location: ../login/login.html");
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Features2</title>
    <link rel = "stylesheet" type = "text/css" href = "features.css" />
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
$userID = $_SESSION["userID"];
//$userID = "1";
global $conn;
require_once "../connect.php";

$workout="";
//if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['Strength'])){

    $workout = "Strength";

}else if(isset($_POST['Cardio'])){

    $workout = "Cardio";

}else if(isset($_POST['LISS'])){

    $workout = "LISS";

}else if(isset($_POST['HIIT'])){

    $workout = "HIIT";
}else if(isset($_POST['Group'])){

    $workout = "Group";
}else if(isset($_POST['Flexibility/mobility'])){

    $workout = "Flexibility/mobility";

}else if(isset($_POST['Balance'])){

    $workout = "Balance";

}else if(isset($_POST['Stability'])){

    $workout = "Stability";
}
//}


if($workout!=""){
    $query_insert = "insert into usersworkouts(userID, workout) values('".$userID."','".$workout."')";
    $result_check = mysqli_query($conn, $query_insert);
}

$query_check = "select * from usersworkouts where userID = '".$userID."'";
$result_check = mysqli_query($conn, $query_check);
$MyWorkouts=[];
$i=0;
while($row_data = mysqli_fetch_assoc($result_check)){
    $MyWorkouts[$i++] = $row_data["workout"];

}?>


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
            <div class=navbar><a style="text-decoration:none" href="../login/logout.php" class="signup">Log out</a></div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Choose Workout</h1>
    <h2>Every workout session is provided by a highly skilled and experienced instructor. Choose the workout that fits you best.</h2>

    <form method="post" action="features2.php" >

        <?php
        function isMyWorkout($array,$workout){
            foreach($array as $name){
                if($name == $workout){
                    return 1;
                }
            }

            return 0;
        }


        $query_check = "select * from workouts";
        $result_check = mysqli_query($conn, $query_check);

        while($row_data = mysqli_fetch_assoc($result_check)) {
            $workoutName = $row_data["workout"];
            $photoURL = $row_data["photo"];
            $description = $row_data["description"];
            $isMyWorkout = isMyWorkout($MyWorkouts,$workoutName);

            ?>

            <div class = "row">
                <div class = "col1">
                    <img src = <?php echo("$photoURL") ?> >
                </div>
                <div class = "col2">
                    <br>
                    <h4><?php echo("$workoutName") ?></h4>
                    <p><?php echo("$description") ?>
                        <br><br>
                        <a>
                            <button class="button" name= <?php echo("$workoutName") ?> <?php if($isMyWorkout==1)echo("style='background-color:gray'; disabled") ?> >Choose workout</button>
                        </a>
                    </p>
                </div>
            </div>

        <?php } ?>
    </form>

</div>


<a href="MyWorkouts.php" style="text-decoration: none">
    <button id="lastButton">My Workouts</button>
</a>


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
</html>