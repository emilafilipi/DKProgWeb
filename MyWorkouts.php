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

//        session_start();
//        $userID = $_SESSION["userID"];
$userID = "1";
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
            <div class="navbar"><a style="text-decoration:none" href="../Services/services.html" class="services">Services</a></div>

            <div class="dropdown">
                <a style="text-decoration:none" href="../index.html#features" class="features-btn">Features &#709</a>
                <div class="dropdown-content">
                    <a style="text-decoration:none" href="features1.html">General Tips</a>
                    <a style="text-decoration:none" href="features2.html">Choose Workout</a>
                    <a style="text-decoration:none" href="features3.html">View Progress</a>
                </div>
            </div>


            <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../contact/contact.html" class="contact">Contact</a></div>
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
//        $notMyWorkouts = [];
//        $i=0;

        while($row_data = mysqli_fetch_assoc($result_check)){
//            $notMyWorkouts[$i++] = $row_data["workout"];
            $workoutName = $row_data["workout"];

            $query_check = "select photo from workouts where workout = '".$workoutName."'";
            $result_check1 = mysqli_query($conn, $query_check);
            $next_row_data = mysqli_fetch_assoc($result_check1);

            $photoURL = $next_row_data["photo"];

            $query_check = "select exercises from exercises where workout='".$workoutName."'" ;
            $result_check1 = mysqli_query($conn, $query_check);
            $next_row_data = mysqli_fetch_assoc($result_check1);

            $exercises = $next_row_data["exercises"];
            $array_exercises = explode(",","$exercises");


            echo "<script>
function printWorkouts(){
    var form = document.getElementById('workouts');
var row = document.createElement('div');
row.setAttribute('class','row');
var col1 = document.createElement('div');
col1.setAttribute('class','col1');
var img = document.createElement('img');
img.setAttribute('src','$photoURL');
col1.appendChild(img);
var col2= document.createElement('div');
col2.setAttribute('class','col2');
var br = document.createElement('br');
var h4 = document.createElement('h4');
h4.appendChild(document.createTextNode('$workoutName'));
var p = document.createElement('p');
var br1 = document.createElement('br');
var br2 = document.createElement('br');
var br3 = document.createElement('br');
var p1 = document.createElement('p');
p1.appendChild(document.createTextNode('$array_exercises[0]'));
var p2 = document.createElement('p');
p2.appendChild(document.createTextNode('$array_exercises[1]'));
var p3 = document.createElement('p');
p3.appendChild(document.createTextNode('$array_exercises[2]'));
var button = document.createElement('button');
button.appendChild(document.createTextNode('X'));
button.setAttribute('class','button');
button.setAttribute('name','$workoutName');

p.appendChild(br1);
p.appendChild(p1);
p.appendChild(br2);
p.appendChild(p2);
p.appendChild(br3);
p.appendChild(p3);
p.appendChild(button);

col2.appendChild(br);
col2.appendChild(h4);
col2.appendChild(p);

row.appendChild(col1);
row.appendChild(col2);

form.appendChild(row);
}

window.addEventListener('load',printWorkouts,false);
</script>";
        }

        ?>

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
